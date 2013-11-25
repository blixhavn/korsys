<?php

	function datetime_to_norstring($datetime){

		$week = array('søndag', 'mandag', 'tirsdag', 'onsdag', 'torsdag', 'fredag', 'lørdag');
		$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

		$time = getdate(strtotime($datetime));
		return $week[$time['wday']]." "
			.$time['mday'].". ".$mon[$time['mon']-1]." kl. ".$time['hours'].":"
			.str_pad($time['minutes']."", 2, "0",STR_PAD_LEFT);
	}

	function datetime_to_norstring_stor($datetime){

			$week = array('Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag');
			$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

			$time = getdate(strtotime($datetime));
			return $week[$time['wday']]." "
				.$time['mday'].". ".$mon[$time['mon']-1]." kl. ".$time['hours'].":"
				.str_pad($time['minutes']."", 2, "0",STR_PAD_LEFT);
	}
	
	function datetime_to_date($datetime){

		$week = array('søndag', 'mandag', 'tirsdag', 'onsdag', 'torsdag', 'fredag', 'lørdag');
		$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

		$time = getdate(strtotime($datetime));
		return $week[$time['wday']]." "
			.$time['mday'].". ".$mon[$time['mon']-1];
	}

	function datetime_to_date_stor($datetime){

			$week = array('Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag');
			$mon = array('januar','februar','mars','april','mai','juni','juli','august','september','oktober','november','desember');

			$time = getdate(strtotime($datetime));
			return $week[$time['wday']]." "
				.$time['mday'].". ".$mon[$time['mon']-1];
	}
	
	function datetime_to_time($datetime) {
		$time = strtotime($datetime);
		return date("H:i", $time);
	}
?>
