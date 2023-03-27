<?php
session_start();
require_once('connect.php');
?>
<pre>
<?php
echo $_POST['id_work'];
echo $_SESSION['user']['login'];
echo $_POST['mark'];
?>
</pre>

<?php 
$id_work = $_POST['id_work'];
$login_expert = $_SESSION['user']['login'];
$mark = $_POST['mark'];

pg_query($connect, "UPDATE completed_work SET experts_mark = '$mark' WHERE id_work = '$id_work';");
pg_query($connect, "UPDATE completed_work SET login_expert = '$login_expert' WHERE id_work = '$id_work';");
header('Location: ../profile_expert.php');

?>