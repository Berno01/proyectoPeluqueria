<?php 

/**En este ejemplo, se puede ver cómo el objeto User tiene responsabilidades bien definidas y cohesivas, siguiendo los patrones GRASP de Expert y Low Coupling. El objeto User es experto en la información personal de un usuario, y tiene métodos para permitir que un usuario inicie sesión, verifique su información y acceda a las funcionalidades disponibles, así como para permitir que un usuario edite su información personal. Además, el objeto User tiene bajo acoplamiento, ya que no depende de otros objetos para llevar a cabo sus responsabilidades. */
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM usuario";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre, $apellidop, 
	$usuariox, $clavehash, $rol, $telef)
	{
		$validacion=$this->comprueba_duplicados($usuariox, 0);
		if($validacion==0){

            $sql="INSERT INTO usuario (nombre_usuario, apellidop_usuario, 
            login_usuario, clave_usuario, telef_usuario, rol_usuario)
		    VALUES ('".$nombre."','".$apellidop."',
			'".$usuariox."', '".$clavehash."', '".$telef."', 0) ;";
            echo $sql; // Imprime la consulta
			
			return ejecutarConsulta($sql);

		}
		else{return 0;}
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$nombre, $apellidop, $apellidom, $tipo_documento,$num_documento,$direccion,$email, 
	$imagen, $usuariox, $clavehash, $rol)
	{
		$validacion=$this->comprueba_duplicados($num_documento,$idusuario);
		if($validacion==0){
            
            $idpersona=$this->idpersona_usuario($id_usuario);
            $sql="UPDATE persona1 SET nombre_persona='$nombre', 
			ap_persona='$apellidop', am_persona='$apellidom',tipo_documento_persona='$tipo_documento',num_documento_persona='$num_documento',
			direccion_persona='$direccion',email_persona='$email',imagen_persona='$imagen' WHERE id_persona='$idpersona'";
			ejecutarConsulta($sql);

            $sqlx="UPDATE usuario1 SET nombre_usuario='$usuariox', clave_usuario='$clavehash', id_rol='$rol'
            WHERE id_usuario = '$idusuario'";
			return ejecutarConsulta($sqlx);

        }
		else{return 0;}
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_usuario)
	{
		$sql="UPDATE usuario SET estado_usuario=FALSE WHERE id_usuario='$id_usuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario)
	{
		$sql="UPDATE usuario1 SET estado_usuario='1' WHERE id_usuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_usuario)
	{
		$sql="SELECT * FROM usuario WHERE id_usuario='$id_usuario';";
		return ejecutarConsultaSimpleFila($sql);
	}

	
	public function select()
	{
		$sql="SELECT p.id_persona, p.nombre_persona FROM persona1 p, usuario1 u WHERE (estado_usuario=TRUE) and (p.id_persona=u.id_persona) ORDER BY nombre_persona ASC;";
		return ejecutarConsulta($sql);		
	}

    //Implementar un método para mostrar los datos de un registro a modificar
	public function idpersona_usuario($idusuario)
	{
		$sql="SELECT p.id_persona FROM persona1 p, usuario1 c WHERE p.id_persona=c.id_persona AND c.id_usuario='$idusuario'";
		$idpersona = ejecutarConsultaSimpleFila($sql);
		return $idpersona["id_persona"];
	}

	//Implementar un método para listar los registros
	public function comprueba_duplicados($nombre,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(id_usuario) AS id_usuario FROM usuario WHERE (login_usuario='$nombre') AND (id_usuario=$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['id_usuario'];		
	}

	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT * FROM usuario 
		WHERE login_usuario ='".$login."' AND clave_usuario ='".$clave."' AND estado_usuario=TRUE"; 
    	return ejecutarConsulta($sql);  
    }

	//Implementar un método para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql="SELECT p.idpermiso FROM usuario1 u, rol r, rol_permiso p WHERE u.id_rol=r.idrol AND r.idrol=p.idrol AND u.id_usuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar_intentos($id_usuario,$intentos)
	{
		$sql="UPDATE usuario SET intentos_usuario='$intentos' WHERE id_usuario='$id_usuario'";
		return ejecutarConsulta($sql);
	}
	//Función para verificar el acceso al sistema
	public function verificar_intentos($login)
    {
		$sql="SELECT id_usuario, intentos_usuario FROM usuario WHERE login_usuario='$login'";
		$resultado = ejecutarConsulta($sql); 
		while ($reg = mysqli_fetch_assoc($resultado)){
			$id_usuario=$reg["id_usuario"];
			$num_intentos=(int)$reg["intentos_usuario"]+1;
			if($num_intentos>=5){
				$respuesta=$this->editar_intentos($id_usuario,$num_intentos);
				$respuesta=$this->desactivar($id_usuario);
			}
			else{$respuesta=$this->editar_intentos($id_usuario,$num_intentos);}
		}
	}
	

	

}

?>