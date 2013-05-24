<?php
	function generate_code($length)
	{

		if ($length <= 0)
		{
			return FALSE;
		}

		$code = "";
		$lower_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz0123456789";
		srand((double)microtime() * 1000000);
		for ($i = 0; $i < $length; $i++)
		{
			$code = $code . substr($lower_chars, rand() % strlen($lower_chars), 1);
		}
		return $code;

	}
?>