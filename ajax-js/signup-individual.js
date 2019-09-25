var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

$.validator.addMethod("validemail", function(value, element) {
  return this.optional(element) || eregex.test(value);
});

// name validation
var nameregex = /^[a-zA-Z_']+$/;

$.validator.addMethod("validname", function(value, element) {
  return this.optional(element) || nameregex.test(value);
});

$("document").ready(function() {
  $("#form").validate({
    rules: {
      firstName: {
        required: true,
        minlength: 3
      },
      lastName: {
        required: true,
        minlength: 3
      },
      email: {
        required: true,
        validemail: true,
        remote: {
          url: "ajax/check-exists.php",
          type: "post",
          data: {
            email: function() {
              return $("#email").val();
            }
          }
        }
      },
      phoneNumber: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10,
        remote: {
          url: "ajax/check-exists.php",
          type: "post",
          data: {
            phoneNumber: function() {
              return $("#phoneNumber").val();
            }
          }
        }
      },
      idNumber: {
        required: true,
        number: true,
        minlength: 5,
        maxlength: 15,
        remote: {
          url: "ajax/check-exists.php",
          type: "post",
          data: {
            idNumber: function() {
              return $("#idNumber").val();
            }
          }
        }
      },
      password: {
        required: true,
        minlength: 6
      },
      confirmPassword: {
        required: true,
        equalTo: "#password"
      }
    },
    messages: {
      firstName: {
        required: "What is your first name?",
        minlength: "Name should be at least 3 characters"
      },
      lastName: {
        required: "What is your last name?",
        minlength: "Name should be at least 3 characters"
      },
      email: {
        required: "What is your email address?",
        validemail: "Please enter a valid email address.",
        remote: "Email exists, try another one"
      },
      phoneNumber: {
        required: "What is your phone number?",
        number: "Phone number is not valid",
        minlength: "Number seems short",
        maxlength: "Number seems long",
        remote: "Phone number already exists, try another one"
      },
      idNumber: {
        required: "What is your ID Number?",
        number: "ID Number is invalid",
        minlength: "ID Number is short",
        maxlength: "ID Number is too long",
        remote: "ID Number exists, try another one"
      },
      password: {
        required: "Password is required",
        minlength: "Password should be atleast 6 characters long"
      },
      confirmPassword: {
        required: "Retype your password",
        equalTo: "Password do not match"
      }
    },
    errorPlacement: function(error, element) {
      $(element)
        .closest(".form-group")
        .find(".help-block")
        .html(error.html());
    },
    highlight: function(element) {
      $(element)
        .closest(".form-group")
        .removeClass("has-success")
        .addClass("has-error");
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element)
        .closest(".form-group")
        .removeClass("has-error");
      $(element)
        .closest(".form-group")
        .find(".help-block")
        .html("");
    },
    submitHandler: submitForm
  });
  /* Create new user submit */
  function submitForm() {
    $.ajax({
      url: "ajax/consultancy-new-ajax.php",
      type: "POST",
      data: $("#form").serialize(),
      dataType: "json",
      beforeSend: function() {
        $("#btn-submit")
          .html(
            '<img src="ajax-loader.gif" style="margin: auto; width:30px;"> &nbsp; Working...'
          )
          .prop("disabled", true);
        $(
          "input[type=email],input[type=text],input[type=tel],input[type=number],input[type=password],input[type=checkbox],#gender"
        ).prop("disabled", true);
      }
    })
      .done(function(data) {
        $("#btn-submit")
          .html(
            '<img src="ajax-loader.gif" style="margin: auto; width:30px;"> &nbsp; Processing...'
          )
          .prop("disabled", true);
        // $('input[type=email],input[type=text],input[type=tel],input[type=number],input[type=password],input[type=checkbox],#gender').prop('disabled', true);

        setTimeout(function() {
          if (data.status === "success") {
            $("#errorDiv")
              .slideDown("fast", function() {
                $("#btn-submit").html(
                  '<img src="ajax-loader.gif" style="margin: auto; width:30px;">...'
                );
                $("#errorDiv").html(
                  '<div class="alert alert-success">' + data.message + "</div>"
                );
                $("#form").trigger("reset");
                $(
                  "input[type=email],input[type=text],input[type=tel],input[type=number],input[type=password],input[type=checkbox],#gender"
                ).prop("disabled", false);
                $("#btn-submit")
                  .html("Create New Admin")
                  .prop("disabled", false);
              })
              .delay(3000)
              .slideUp("fast");
          } else if (data.status === "error") {
            $("#errorDiv")
              .slideDown("fast", function() {
                $("#errorDiv").html(
                  '<div class="alert alert-danger">' + data.message + "</div>"
                );
                $("#form").trigger("reset");
                $(
                  "input[type=email],input[type=text],input[type=tel],input[type=number],input[type=password],input[type=checkbox],#gender"
                ).prop("disabled", false);
                $("#btn-submit")
                  .html("Create New Admin")
                  .prop("disabled", false);
              })
              .delay(3000)
              .slideUp("fast");
          }
        }, 3000);
      })
      .fail(function(err) {
        $("#form").trigger("reset");
        console.log("error is: ", err);
        alert("An unknown error occoured, Please try again Later...");
      });
  }
  /* Create new user */
});
