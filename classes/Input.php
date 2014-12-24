<?php

class Input
{
	public static function exists($source = 'POST')
	{
		switch ($source) {
			case 'POST':
				return (!empty($_POST) ? TRUE : FALSE);
				break;
			case 'GET':
				return (!empty($_GET) ? TRUE : FALSE);
				break;
			default:
				return FALSE;
				break;
		}
	}
}