<?php
session_start();

unset($_SESSION['student_id']);
unset($_SESSION['student_name']);
header('Location: index.php');

?>
<?php session_destroy(); ?>