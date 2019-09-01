$("document").ready(function() {
  $("#search-courses-form").validate({
    rules: {
      search: {
        required: true,
        maxlength: 20
      }
    },
    messages: {
      search: {
        required: "What do you want to find?",
        maxlength: "Length too long"
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
  function submitForm() {
    $.ajax({
      url: "ajax/search-courses-ajax.php",
      type: "POST",
      data: $("#search-courses-form").serialize(),
      dataType: "json",
      beforeSend: function() {
        $("#search-courses")
          .html(
            '<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>'
          )
          .prop("disabled", true);
        $("#search-results").prop("disabled", true);
        $("input, textarea").prop("disabled", true);
      }
    })
      .done(function(data) {
        $("#search-courses")
          .html(
            '<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>'
          )
          .prop("disabled", true);
        $("input, textarea").prop("disabled", true);
        $("#search-results").prop("disabled", true);
        setTimeout(function() {
          if (data.status === "success") {
            $("#errorDiv")
              .slideDown("fast", function() {
                $("#search-courses-form").trigger("reset");
                $("input, textarea").prop("disabled", false);
                $("#search-results").prop("disabled", false);
                $("#blogBodyWrapper").slideDown("fast");
              })
              .delay(3000)
              .slideUp("fast");
            $("#search-courses")
              .html("Search")
              .prop("disabled", false);
            $("#btn-delete-blog").prop("disabled", false);
            $("#search-results").html(data.output);
          } else {
            $("#errorDiv")
              .slideDown("fast", function() {
                $("#errorDiv").html(
                  '<div class="alert alert-danger">' + data.message + "</div>"
                );
                $("input, textarea").prop("disabled", false);
                $("#search-results").prop("disabled", false);
              })
              .delay(3000)
              .slideUp("fast");
            $("#search-courses")
              .html("Search")
              .prop("disabled", false);
            $("#btn-delete-blog").prop("disabled", false);
            $("#blogBodyWrapper").slideDown("fast");
            $("#search-results").html(data.message);
          }
        }, 3000);
      })
      .fail(function(err) {
        $("#search-courses-form").trigger("reset");
        alert("An unknown error occured, Please try again Later...");
        console.log(err);
      });
  }
});
