<?php

/**
 * @copyright GrayWolf [volkk@inbox.lv]
 */

/**
 * Prints the error.
 * 
 * @param1 string Message
 * @param2 constant Error Level(E_ERROR, E_WARNING)
 * 
 **/

function error($message, $level = E_ERROR)
{
	if ( !func_num_args())
	{
		trigger_error('Parameters count does not match for the <strong>function error()</strong> number of arguments! Required 2, got: ' . func_num_args(), E_USER_ERROR);
	}
	
	if (! is_string($message))
	{
		trigger_error('Expected <strong>string</strong> for parameter 1 in function error(), got: <strong>' .gettype($string) .'</strong>', E_USER_ERROR);
	}
	
	switch($level)
	{
		case E_ERROR:
		{
			die('<strong>Critical error!</strong> ' .$message);
			break;
		}
		case E_WARNING:
		{
			echo ('<strong>Warning!</strong> ' .$message);
		}
		default:
		{
			trigger_error('Unknown error level "' .$level . '"', E_USER_ERROR);
		}
	}
}

?>