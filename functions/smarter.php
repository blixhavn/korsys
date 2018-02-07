<?php
class Smarter {

	var $template_dir;
	var $data;

	function Smarter( $template_dir ) {
		$this->template_dir = $template_dir;
	}

	function assign( $index, $value ) {
		$this->data[ $index ] = $value;
	}

	function display( $template_file ) {
		$data = $this->data;

		include($this->template_dir .'/header.tpl.php');
		include($this->template_dir .'/menu.tpl.php');

		include( $this->template_dir .'/'. $template_file );

		include($this->template_dir .'/footer.tpl.php');
	}
}
?>
