	<div class="menu">
	<div id="pirumlogo"><img src="assets/img/logo.jpg"></div>
<?php

/*********** Site links ***********/
	
$textarray = array(	'Nyheter',
					'Semesterplan',
					'Piruloger',		// Denne kan fjernes
					'Sangarkiv',
					'Personlig konto',
					'Tentative oppdrag');
						
$linkarray = array(	'./?show=news',
					'./?show=events',
					'./?show=piruloger',	// Denne kan fjernes
					'./?show=songs',
					'./?show=personlig',
					'./?show=tentativ');
						
$autharray = array(	-10,
					-10,
					-10,			// Denne kan fjernes
					-10,
					-10,
					0);
						
for($i=0; $i<count($textarray); $i++){
	if($_SESSION['auth_code'] >= $autharray[$i]){
		echo "<a class='menu-elem' href='".$linkarray[$i]."'>".$textarray[$i]."</a>";
	}
}

echo "<br>";

// Log out
echo "<a class='menu-elem confirm' confirm-text='Er du sikker på at du vil logge ut?' href='./?action=logout'>Logg ut</a>";
	
/*********** User links ***********/
	
$textarray = array(	'Endre info',
					'Legg ut nyhet',
					'Legg ut hendelse',
					'Minusmeldinger',
					'Personlig',
					'Oppdrag'
					);
						
$linkarray = array(	'./?show=change-info',
					'./?show=add-news',
					'./?show=add-event',
					'./?show=minus',
					'./?show=admin-personlig',
					'./?show=oppdrag'
					);
						
$autharray = array(	-10,
					15,
					15,
					5,
					13,
					15
					);
						
for($i=0; $i<count($textarray); $i++){
	if($_SESSION['auth_code'] >= $autharray[$i]){
		echo "<a class='menu-elem' href='".$linkarray[$i]."'>".$textarray[$i]."</a>";
	}
}	
	
	
	
?>
	</div>
