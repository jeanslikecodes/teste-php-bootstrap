<?php

	try {
		$pdo=new PDO("mysql:host=localhost;dbname=teste","root","golions42");
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

?>
