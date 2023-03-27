<?php
session_start();
require_once('vendor/connect.php');
$result = pg_query($connect, "SELECT * FROM output_all();");
$subject_result = pg_query($connect, "SELECT * FROM output_subject")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/icons/favicon.png" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HomeWork Helper/Student</title>
	<link rel="stylesheet" href="css/style-student.css" />
</head>
<body>
	<div class="wrapper">
		<h1 class="header">
			Completed tasks
		</h1>
		<div class="completed-tasks">
			<div class="completed-tasks__row">
				<?php
				while ($compl_task = pg_fetch_assoc($result)) { ?>
					<?php if ($compl_task['image'] != 'NULL' && $compl_task['experts_mark'] != '-1' && $compl_task['login_doer'] != 'NULL' && $compl_task['login_expert'] != 'NULL') { ?>
					<div class="completed-task__item">
						<div class="item-task">
							<div class="item-task__image">
								<?= '<img src="' . $compl_task['image'] . '" alt="">' ?>
							</div>
							<div class="item-task__info">
								<div class="item-task__row">
									<div class="item-task__theme">
										Theme: <?= $compl_task['theme']; ?>
									</div>
									<div class="item-task__subject">
										Subject: <?= $compl_task['name_of_subject']; ?>
									</div>
								</div>
								<div class="item-task__date">
									<span>Date of ordering:</span> <?= $compl_task['_date']; ?>
								</div>
								<div class="item-task__comment">
									<span>Task</span>: <?= $compl_task['task']; ?>
								</div>
								<div class="item-task__student">
									<span>Student</span>: <?= $compl_task['login_student']; ?>
								</div>
								<div class="item-task__doer">
									<span>Doer</span>: <?= $compl_task['login_doer']; ?>
								</div>
								<div class="item-task__expert">
									<span>Expert:</span> <?= $compl_task['login_expert']; ?>
								</div>
								<div class="item-task__mark">
									<?= $compl_task['experts_mark']; ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>

		<h1 class="header">
			Need help?
		</h1>
		<div class="ordering-form">
			<form action="vendor/order.php" method="POST" enctype="multipart/form-data">
				<div class="ordering-form__subject">
					<p>Choose the subject you need:</p>
					<select name="subject">
						<?php while ($mas_subject = pg_fetch_assoc($subject_result)) { ?>
							<?= '<option value="' . $mas_subject['id_subject'] . '">' . $mas_subject['name_of_subject'] . '</option>'?>
						<?php } ?>
					</select>
				</div>
				<div class="ordering-form__theme">
					<input placeholder="Write the theme" type="text" name="theme">
				</div>
				<div class="ordering-form__task">
					<textarea placeholder = "Type you task..."type="text" name="task" cols="55" rows="10"></textarea>
				</div>
				<div class="ordering-form__button">
					<button type="submit">Send</button>
				</div>
			</form>
			<div class="ordering-form__image">
				<img src="img/icons/5.png" alt="">
			</div>
		</div>
	</div>
	<?php echo $_SESSION['user']['login'];
	echo $_SESSION['user']['password'];


	?>
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
	<script src="js/script_student.js"></script>
</body>
</html>