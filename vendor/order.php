<?php
session_start();
require_once('connect.php');

$login_st = $_SESSION['user']['login'];
$password_st = $_SESSION['user']['password'];
$education_st = $_SESSION['user']['education'];
$subject_st = $_POST['subject'];
$theme_st = $_POST['theme'];
$task_st = $_POST['task'];

pg_query($connect, "INSERT INTO completed_work (login_student, theme, id_subject, task) VALUES ('$login_st', '$theme_st', '$subject_st', '$task_st')");
header('Location: ../profile_student.php');

?>