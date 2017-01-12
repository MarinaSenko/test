<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
	<br><br>
	<h4 class="text-center">Введите значения</h4>
	<br><br>


	<!--Форма для ввода параметров с валидацией при помощи HTML5-->


	<form class="form-inline" method="post" action="index.php">
		<label class="sr-only" for="total_count">Всего</label>
		<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="total_count" id="total_count"
		       placeholder="Всего" required="required" pattern="[0-9]+">

		<label class="sr-only" for="delivered">Отправлено</label>
		<input type="text" class="form-control" name="delivered" id="delivered" placeholder="Отправлено"
		       required="required" pattern="[0-9]+">

		<label class="sr-only" for="fail">Неудачно</label>
		<input type="text" class="form-control" name="fail" id="fail" placeholder="Неудачно" required="required"
		       pattern="[0-9]+">

		<label class="sr-only" for="open">Открыто</label>
		<input type="text" class="form-control" name="open" id="open" placeholder="Открыто" required="required"
		       pattern="[0-9]+">

		<label class="sr-only" for="click">Переходы</label>
		<input type="text" class="form-control" name="click" id="click" placeholder="Переходы"
		       required="required" pattern="[0-9]+">


		<button type="submit" name="submit" class="btn btn-primary">Отправить</button>
	</form>


	<br><br>

	<!-- Прогресс бар -->


	<div class="progress">

		<!-- Секция доставленных писем -->

		<div class="progress-bar progress-bar-success" style="width: ">


			<!-- Подсекция открытых писем -->
			<div class="progress-bar progress-bar-warning" style="width: ">

				<!-- Подсекция писем с переходом по ссылке  -->

				<div class="progress-bar " style="width: ">

				</div>

			</div>

		</div>

		<!-- Секция писем в процессе отправки -->

		<div class="progress-bar" style="width: ; background-color: grey">

		</div>

		<!-- Секция недоставленных писем -->

		<div class="progress-bar progress-bar-danger" style="width: ">

		</div>

	</div>


</div>

</body>
</html>

