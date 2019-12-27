<?php
session_start();
unset($_SESSION['UName']);
session_destroy();

header("Location:index.php");
exit;
?>
