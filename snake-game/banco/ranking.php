<?php
	require_once("config.php");

	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
	$sql = "SELECT * FROM snake WHERE dificuldade = 'facil' ORDER BY pontos DESC LIMIT 7";
	echo "<h3>Dificuldade: Facil</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<td><center>Nome</center></td>";
	echo "<td><center>Pontos</center></td>";
	echo "</tr>";
	foreach($pdo->query($sql) as $row)
	{
		echo "<tr>";
		echo "<td><center>".$row["nome"]."</center></td>";
		echo "<td><center>".$row["pontos"]."</center></td>";
		echo "</tr>";

	}
	echo "</table>";
	$sql = "SELECT * FROM snake WHERE dificuldade = 'medio' ORDER BY pontos DESC LIMIT 7";
	echo "<h3>Dificuldade: Medio</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<td><center>Nome</center></td>";
	echo "<td><center>Pontos</center></td>";
	echo "</tr>";
	foreach($pdo->query($sql) as $row)
	{

		echo "<tr>";
		echo "<td><center>".$row["nome"]."</center></td>";
		echo "<td><center>".$row["pontos"]."</center></td>";
		echo "</tr>";

	}
	echo "</table>";
	$sql = "SELECT * FROM snake WHERE dificuldade = 'dificil' ORDER BY pontos DESC LIMIT 7";
	echo "<h3>Dificuldade: Dificil</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<td><center>Nome</center></td>";
	echo "<td><center>Pontos</center></td>";
	echo "</tr>";
	foreach($pdo->query($sql) as $row)
	{
		echo "<tr>";
		echo "<td><center>".$row["nome"]."</center></td>";
		echo "<td><center>".$row["pontos"]."</center></td>";
		echo "</tr>";

	}
	echo "</table>";
	Database::disconnect();

?>