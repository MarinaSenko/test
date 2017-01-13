<?php

$data = [];

	if ( isset( $_POST['submit'] ) ) {

		$data['total_count'] = (int) $_POST['total_count'];
		$data['delivered']   = (int) $_POST['delivered'];
		$data['fail']        = (int) $_POST['fail'];
		$data['open']        = (int) $_POST['open'];
		$data['click']       = (int) $_POST['click'];


	}


function getData($data) {

	$array = $data;
	$array['progress']    = ($array['total_count'] - ( $array['delivered'] + $array['fail']));
	return $array;

}

$vars = extract(test($data));


function calcPercentage ($x, $y) {
	$res = ($x/$y)*100;
	return $res;
}

// Функция рандомно подбирает параметры (для теста)
// Для вызова $vars = extract(test($data));

function test() {

	$data['total_count'] = random_int(1, 100);
	$data['delivered']   = random_int(0, $data['total_count'] );
	$data['fail']        = random_int(0, ($data['total_count'] - $data['delivered']));
	$data['open']        = random_int(0, $data['delivered']);
	$data['click']       = random_int(0, $data['open']);

	$data['progress'] = ( $data['total_count'] - ( $data['delivered'] + $data['fail'] ) );

	return $data;
}





