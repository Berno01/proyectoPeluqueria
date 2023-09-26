<?php 

require_once "global.php";
$conexion = mysqli_connect("localhost", "root", "", "peluqueria");

if (!$conexion)
{
	printf("Error : Unable to open database\n");
	exit();
}
    
if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = mysqli_query($conexion, $sql);
		return $query;
	}

	function ejecutarConsultaSimpleFila($sql)
	{
		global $conexion;
		$query = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
		global $conexion;
		$query = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array($query);
		$new_id = $row['0'];
		return $new_id;
	}
	
	function cerrar_conexion($sql)
	{
		global $conexion;
		mysqli_close($conexion);
		return true;
	}
	
}

?>