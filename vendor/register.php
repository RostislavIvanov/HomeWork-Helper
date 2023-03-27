<?php  
session_start();
require_once('connect.php');
$login_reg = $_POST['login_reg'];
$education = $_POST['education'];
$userpass_reg = $_POST['userpass_reg'];
$userpass_confirm = $_POST['userpass_confirm'];
$role = $_POST['role'];
$subject = $_POST['subject'];
$service = $_POST['service'];

//проверка на совпадение пароля
if ($userpass_reg != $userpass_confirm) {
	$_SESSION['passUnconf'] = 'Passwords do not match';
	header('Location: ../index.php#popup_reg');

} else {
	//радиобаттон = студент
	if ($role == 'student') {
		pg_query($connect, "INSERT INTO student (login_student, password, education) VALUES ('$login_reg', '$userpass_reg', '$education')");
	}
	//радиобаттон = дуэр
	if ($role == 'doer') {
		//вставка в главные таблицы названия предмета/услуги
		pg_query($connect, "INSERT INTO service (name_of_service) VALUES ('$service')");
		pg_query($connect, "INSERT INTO subject (name_of_subject) VALUES ('$subject')");
		//получение даннных с помощью sql запроса
		$id_subject = pg_query($connect, "SELECT id_subject FROM subject ORDER BY id_subject DESC LIMIT 1");
		$id_service = pg_query($connect, "SELECT id_service FROM service ORDER BY id_service DESC LIMIT 1");
		//преобразование в нормальный массив из "запросного" типа данных
		$id_subject_row = pg_fetch_row($id_subject);
		$id_service_row = pg_fetch_row($id_service);
		//преобразование в инт
		$id_subject_int=(int)$id_subject_row[0];
		$id_service_int=(int)$id_service_row[0];
		//окончательная вставка в нужную таблицу
		pg_query($connect, "INSERT INTO doer (login_doer, password, education, id_subject, id_service) VALUES ('$login_reg', '$userpass_reg', '$education', $id_subject_int, $id_service_int)");
	}
	if ($role == 'expert') {
		//вставка в главные таблицы названия предмета/услуги
		pg_query($connect, "INSERT INTO subject (name_of_subject) VALUES ('$subject')");
		//получение даннных с помощью sql запроса
		$id_subject = pg_query($connect, "SELECT id_subject FROM subject ORDER BY id_subject DESC LIMIT 1");
		//преобразование в нормальный массив из "запросного" типа данных
		$id_subject_row = pg_fetch_row($id_subject);
		//преобразование в инт
		$id_subject_int=(int)$id_subject_row[0];
		//окончательная вставка в нужную таблицу
		pg_query($connect, "INSERT INTO expert (login_expert, password, education, id_subject) VALUES ('$login_reg', '$userpass_reg', '$education', '$id_subject_int')");
	}
	$_SESSION['sucess-reg'] = 'Registration completed';
	header('Location: ../index.php#popup');

}





?>






<!-- CREATE FUNCTION trigger_studentpass_before_lns () RETURNS trigger AS '
BEGIN
NEW.password=nvl(NEW.password,"Password_"||trim(to_char(currval(s_seq),99999)));
return NEW;
END;
' LANGUAGE  plpgsql;


CREATE TRIGGER student_pass
BEFORE INSERT ON student FOR EACH ROW
EXECUTE PROCEDURE trigger_studentpass_before_lns (); -->