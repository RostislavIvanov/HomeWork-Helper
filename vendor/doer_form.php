<?php
session_start();
require_once('connect.php');
?>
<pre>
<?php print_r($_FILES);



echo $_POST['id_work'];
echo $_SESSION['user']['login'];
?>
</pre>

<?php 
$id_work = $_POST['id_work'];
$login_doer = $_SESSION['user']['login'];
$path = 'img/Homework_img/' . time() . $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path);
echo $path;

pg_query($connect, "UPDATE completed_work SET image = '$path' WHERE id_work = '$id_work';");

pg_query($connect, "UPDATE completed_work SET login_doer = '$login_doer' WHERE id_work = '$id_work';");
header('Location: ../profile_doer.php');
?>