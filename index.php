<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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

	<?php if ( isset( $_POST['submit'] ) ): ?>
	<?php require_once( 'function.php' ); ?>


	<!-- Прогресс бар -->
	<?php if ( $total_count > 0 ): ?>
	<div class="progress">

		<?php if ( round( calcPercentage($delivered, $total_count), 1 ) >= 0.1 ): ?>
			<!-- Секция доставленных писем -->
			<div class="progress-bar progress-bar-success" data-toggle="tooltip"
			     title="<?php echo 'Количество доставленных писем:' . $delivered ?>" style="width:
			<?php echo calcPercentage($delivered, $total_count); ?>%; min-width:<?php echo $delivered > 0 ? '90px' : ''?>">


				<?php if ( round( calcPercentage($open, $total_count), 1) >= 0.1): ?>
				<!-- Подсекция открытых писем -->
				<div class="progress-bar progress-bar-warning" data-toggle="tooltip"
				     title="<?php echo 'Количество открытых писем:' . $open ?>"
				     style="width:<?php echo calcPercentage($open, $delivered) == calcPercentage($delivered, $total_count) ? 'calc('. calcPercentage($open, $delivered) .'% - 30px)' : calcPercentage($open, $delivered); ?>%; min-width:60px">



					<?php if ( round( calcPercentage($click, $delivered), 1 ) >= 0.1 ): ?>
						<!-- Подсекция писем с переходом по ссылке  -->
						<div class="progress-bar " data-toggle="tooltip"
						     title="<?php echo 'Количество писем по перейденным ссылкам:' . $click?>"
						     style="width:<?php echo calcPercentage($click, $delivered) == calcPercentage($open, $delivered) ? 'calc('. calcPercentage($click, $delivered) .'% - 30px)' : calcPercentage($click, $delivered); ?>%; min-width:30px">

							<!-- Отображение процентной доли писем с переходами -->
							<?php echo  round( calcPercentage($click, $delivered), 1 ); ?>
						</div>
					<?php endif; ?>


					<!-- Отображение процентной доли открытых писем -->
					<?php echo  round( calcPercentage($open, $delivered), 1 ); ?>
				</div>
				<?php endif; ?>

				<!-- Отображение процентной доли доставленных писем -->
				<?php echo  round( calcPercentage($delivered, $total_count), 1 ); ?>
			</div>
		<?php endif; ?>


		<?php if ( round( calcPercentage($progress, $total_count), 1 ) >= 0.1) : ?>
			<!-- Секция писем в процессе отправки -->
			<div class="progress-bar " data-toggle="tooltip"
			     title="<?php echo 'Количество писем в процессе отправки:' . $progress ?>"
			     style="background-color:grey; width:
			     <?php echo calcPercentage($progress, $total_count) > 95 ? 'calc('. calcPercentage($progress, $total_count) .'% - 120px)' : calcPercentage($progress, $total_count).'%' ; ?>;min-width:30px">
				<!-- Отображение процентной писем в процессе отправки -->
				<?php echo  round( calcPercentage($progress, $total_count), 1 ); ?>
			</div>
		<?php endif; ?>


		<?php if ( round( calcPercentage($fail, $total_count), 1 )  >= 0.1 ) : ?>
			<!-- Секция недоставленных писем -->
			<div class="progress-bar progress-bar-danger" data-toggle="tooltip"
			     title="<?php echo 'Количество недоставленных писем:' . $fail ?>"
			     style="width:
			     <?php echo calcPercentage($fail, $total_count) > 90 ? 'calc('. calcPercentage($fail, $total_count) .'% - 180px)' : calcPercentage($fail, $total_count).'%' ; ?>;30px">

				<!-- Отображение процентной доли недоставленных писем -->
				<?php echo  round( calcPercentage($fail, $total_count), 1 ); ?>
			</div>
		<?php endif; ?>


		<?php endif; ?>
		<?php endif; ?>

	</div>


</div>

<!-- Скрипт для отображения тултипов -->
<script>
	$(document).ready(function () {
		var bIsShown = true;
//		Блокируем показ тултипа на стадии всплывания и перехвата
		$("#tool-open").on('mouseenter', function () {
			bIsShown = true;

		}, false).on('mouseleave', function () {
			bIsShown = false;
		})


		$("#tool-click").on('mouseenter', function () {
			bIsShown = true;

		}, false).on('mouseleave', function () {
			bIsShown = false;
		})


		$("#tool-delivered").on('mouseenter', function () {
			bIsShown = true;

		}).on('mouseleave', function () {
			bIsShown = false;
		})

		$('[data-toggle="tooltip"]').tooltip({
			placement: 'top',
			container: 'body'
		});
	});
</script>

</body>
</html>

