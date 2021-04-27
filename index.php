
<?php error_reporting(0);
define(SERVER_ROOT, __DIR__);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>        
<?php include "header.php"  ?>
<h1> Home page</h1>
<?php include "allscript.php" ?>
     
