<?php

setcookie("name", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
setcookie("gender", "", time() - 3600, "/");
setcookie("email", "", time() - 3600, "/");
setcookie("phone", "", time() - 3600, "/");
setcookie("reference", "", time() - 3600, "/");
setcookie("places", "", time() - 3600, "/");
setcookie("budget", "", time() - 3600, "/");
setcookie("preference", "", time() - 3600, "/");


header("Location: view_cookies.php");
exit();
?>