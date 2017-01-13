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


$array = getData($data);




