<?php
session_start();

unset($_SESSION['skill']);
header('Location: index.php');
session_unset();
?>
<?php session_destroy(); ?>