<?php
class Hello extends CI_Controller{
	function index()
	{
	echo 'Hello World';
	}
 
	function test()
	{
	echo 'Hello Test';
	}
 
	function test2($param1, $param2)
	{
	echo "$param1<br>";
	echo "$param2<br>";
	}
}
?>
