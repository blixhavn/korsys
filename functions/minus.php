<?php

function is_minus_valid($submitted, $start) {
	$start_date_in_epoch = strtotime(date("Y:m:d", $start)." 00:00:00");

	if(date("G", $start) < 16){
		if($submitted < ($start_date_in_epoch - 43200)) {
			return true;
		} else {
			return false;
		}
	} else {
		if($submitted < ($start_date_in_epoch + 43200)) {
			return true;
		} else {
			return false;
		}
	}
}

function belop($float) {
	return number_format($float, 2, ',', ' ');
}
