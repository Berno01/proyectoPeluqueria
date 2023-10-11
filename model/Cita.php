<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Cita
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT c.id_corte, c.fecha_corte, c.hora_corte, 
		u.id_usuario, u.nombre_usuario, 
		c.tipo_corte, c.referencia_corte 
		FROM corte c,usuario u
		WHERE c.id_usuario=u.id_usuario";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($titulo_cita, $fecha, $hora, $descripcion1, $descripcion2)
	{
        
		$sql="INSERT INTO corte 
        (fecha_corte, hora_corte, id_usuario, tipo_corte, costo_corte, referencia_corte)
		VALUES ('$fecha', '$hora', 1, '$descripcion1', 20, '$descripcion2')";
		return ejecutarConsulta($sql);
		
/*		return 1;*/
	}

	public function mostrar($id_corte)
	{
		$sql="SELECT c.id_corte, c.fecha_corte, c.hora_corte, 
		u.id_usuario, u.nombre_usuario, 
		c.tipo_corte, c.referencia_corte 
		FROM corte c,usuario u
		WHERE (c.id_usuario=u.id_usuario) and (c.id_corte='$id_corte');";
		return ejecutarConsultaSimpleFila($sql);		
	}
		
	}


	
	

	


?>