<?php
session_start();
require_once('vendor/connect.php');
$result = pg_query($connect, "SELECT * FROM output_all();");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/icons/favicon.png" type="image/png">
	<title>HomeWork Helper/Doer</title>
	<link rel="stylesheet" href="css/style-doer.css" />
</head>
<body>
	<div class="wrapper">
		<h1 class="header">
			Task list
		</h1>

		<div class="uncompleted-tasks">
			<div class="uncompleted-tasks__row">
				<?php
				while ($uncompl_task = pg_fetch_assoc($result)) { ?>
					<?php if ($uncompl_task['image'] == NULL && $uncompl_task['login_doer'] == NULL) { ?>
						<div class="uncompleted-task">
							<div class="uncompleted-task__subject">
								Subject: <?= $uncompl_task['name_of_subject']; ?>
							</div>
							<div class="uncompleted-task__theme">
								Theme: <?= $uncompl_task['theme']; ?>
							</div>
							<div class="uncompleted-task__task">
								<span>Task</span>: <?= $uncompl_task['task']; ?>
							</div>
							<div class="uncompleted-task__date">
								<span>Date of ordering:</span> <?= $uncompl_task['_date']; ?>
							</div>
							<div class="uncompleted-task__student">
								<span>Student</span>: <?= $uncompl_task['login_student']; ?>
							</div>
							<div class="uncompleted-task__button">
								<form action="vendor/doer_form.php" method="post" enctype="multipart/form-data">
									<label>Download solution<input type="file" name="image"></label>
									<input style="display: none;" name="id_work" value="<?php echo $uncompl_task['id_work']?>" type="text" >
									<button type="submit">Send</button>
								</form>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="footer__row">
			<div class="footer__logo">
				<img src="img/icons/icon-black.png" alt="">
			</div>
			<div class="footer__rights">
				All rights reserved
			</div>
			<div class="footer__info">
				<ul>
					<li>Public offer</li>
					<li>©HomeWork Helper</li>
					<li>Design by <span>Rosya_Ivanov</span></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
