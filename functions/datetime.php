<?php

	function datetime_to_norstring($datetime){

		$week = array('mandag', 'tirsdag', 'onsdag', 'torsdag', 'fredag', 'lørdag', 'søndag');
		$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

		$time = getdate(strtotime($datetime));
		return $week[$time[wday]-1]." "
			.$time[mday].". ".$mon[$time[mon]-1]." kl. ".$time[hours].":"
			.str_pad($time[minutes]."", 2, "0",STR_PAD_LEFT);
	}

	function datetime_to_norstring_stor($datetime){

			$week = array('Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag', 'Søndag');
			$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

			$time = getdate(strtotime($datetime));
			return $week[$time[wday]-1]." "
				.$time[mday].". ".$mon[$time[mon]-1]." kl. ".$time[hours].":"
				.str_pad($time[minutes]."", 2, "0",STR_PAD_LEFT);
	}
	
	function datetime_to_date($datetime){

		$week = array('mandag', 'tirsdag', 'onsdag', 'torsdag', 'fredag', 'lørdag', 'søndag');
		$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

		$time = getdate(strtotime($datetime));
		return $week[$time[wday]-1]." "
			.$time[mday].". ".$mon[$time[mon]-1];
	}

	function datetime_to_date_stor($datetime){

			$week = array('Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag', 'Søndag');
			$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

			$time = getdate(strtotime($datetime));
			return $week[$time[wday]-1]." "
				.$time[mday].". ".$mon[$time[mon]-1];
	}
	
	function datetime_to_time($datetime) {
		$time = strtotime($datetime);
		return date("H:i", $time);
	}
?>
