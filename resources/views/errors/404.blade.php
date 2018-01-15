<?php 
// Redirect everything to the home page.
header("Location: http://{$_SERVER['SERVER_NAME']}/");
exit();
?>