<?php
session_start();
require_once('connect.php');
$login = $_POST['login'];
$password = $_POST['userpass'];

$check_user_student = pg_query($connect, "SELECT * FROM student WHERE login_student = '$login' AND password = '$password'");

$check_user_doer = pg_query($connect, "SELECT * FROM doer WHERE login_doer = '$login' AND password = '$password'");

$check_user_expert = pg_query($connect, "SELECT * FROM expert WHERE login_expert = '$login' AND password = '$password'");

if (pg_num_rows($check_user_student)>0 || pg_num_rows($check_user_doer)>0 || pg_num_rows($check_user_expert)>0) {

	if (pg_num_rows($check_user_student)) {
		$user = pg_fetch_assoc($check_user_student);
		$_SESSION['user'] = [
			"login" => $user['login_student'],
			"password" => $user['password'],
			"education" => $user['education']
		];
		header('Location: ../profile_student.php');
	};

	if (pg_num_rows($check_user_doer)) {
		$user = pg_fetch_assoc($check_user_doer);
		$_SESSION['user'] = [
			"login" => $user['login_doer'],
			"password" => $user['password'],
			"education" => $user['education'],
			"id_subject" => $user['id_subject'],
			"id_service" => $user['id_service']
		];
		header('Location: ../profile_doer.php');
	};

	if (pg_num_rows($check_user_expert)) {
		$user = pg_fetch_assoc($check_user_expert);
		$_SESSION['user'] = [
			"login" => $user['login_expert'],
			"password" => $user['password'],
			"education" => $user['education'],
			"id_subject" => $user['id_subject']
		];
		header('Location: ../profile_expert.php');
	};
}
else {
	$_SESSION['message'] = 'Invalid login or password';
	header('Location: ../index.php#popup');
}

?>