<?php
// php run-dev.php
// Set Site Directory to development
$siteDirectory = fopen("sys/core/site.directory.php", "w") or die("Unable to open site dir!");
$siteScript = "
<?php
\$siteDirectory = 'holby-frontend';
?>
";
fwrite($siteDirectory, $siteScript);
fclose($siteDirectory);

$envVariables = fopen("env-variables.php", "w") or die("Unable to open file!");
$envScript = "
<?php 
\$SUPER_USER_EMAIL = array('mcdalinoluoch@gmail.com', 'randomuser@gmail.com');
\$ADMIN_NOTIFICATIONS_EMAIL = 'mcdalinoluoch@gmail.com';

\$DB_HOST = 'localhost';
\$DB_USER = 'root';
\$DB_NAME = 'holby';
\$DB_PASS = '';

\$WEBSITE_URL = 'http://localhost/holby-frontend';

\$ADMIN_URL = 'http://localhost/holby-admin';

\$EMAIL_USERNAME = 'mcdalinoluoch@gmail.com';
\$EMAIL_PASSWORD = 'dalomallo401h8*';
?>
";
fwrite($envVariables, $envScript);
fclose($envVariables);
?>