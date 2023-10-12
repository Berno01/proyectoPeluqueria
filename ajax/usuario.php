<?php 
session_start();
require_once "../model/Usuario.php";
$usuario=new usuario();

require_once "seguridad.php";
$seguridad=new seguridad();

$idusuario=isset($_POST["idusuario"])? $_POST["idusuario"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";
$apellidop=isset($_POST["apellidop"])? mb_strtoupper($_POST["apellidop"]):"";
$apellidom=isset($_POST["apellidom"])? mb_strtoupper($_POST["apellidom"]):"";
$rol=isset($_POST["rol"])? mb_strtoupper($_POST["rol"]):"";
$login=isset($_POST["login"])? $_POST["login"]:"";
$clave=isset($_POST["clave"])? $_POST["clave"]:"";

switch ($_GET["op"]){

case '5':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

	    //Hash SHA256 en la contraseña
		$clavehash=$seguridad->stringEncryption('encrypt', $clavea);

		$rspta=$usuario->verificar($logina, $clavehash);
		$contador=0;
		while ($fetch= pg_fetch_assoc($rspta)){
			$contador+=1;
			//Declaramos las variables de sesión
	        $_SESSION['idusuario']=$fetch['id_usuario'];
	        $_SESSION['personanombre']=$fetch['nombre_persona']." ".$fetch['ap_persona']." ".$fetch['am_persona'];
	        $_SESSION['personaimagen']=$fetch['imagen_persona'];
			$_SESSION['personaemail']=$fetch['email_persona'];
	        $_SESSION['usuarionombre']=$fetch['nombre_usuario'];
			$_SESSION['idrol']=$fetch['idrol'];
			$_SESSION['rolnombre']=$fetch['rolnombre'];
	        $_SESSION['nombre_oficina']=$fetch['nombre_oficina'];
			//Obtenemos los permisos del usuario
	    	$marcados = $usuario->listarmarcados($fetch['id_usuario']);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = pg_fetch_assoc($marcados))
				{
					array_push($valores, $per['idpermiso']);
				}

			//Determinamos los accesos del usuario
			in_array(1,$valores)?$_SESSION['admin']=1:$_SESSION['admin']=0;
			in_array(2,$valores)?$_SESSION['personal']=1:$_SESSION['personal']=0;
			in_array(3,$valores)?$_SESSION['visitante']=1:$_SESSION['visitante']=0;
			$reseteo = $usuario->editar_intentos($fetch['id_usuario'],0);

		}
		if ($contador>0)
	    {
	        
	    }
		else{
			$rspta=$usuario->verificar_intentos($logina);
		}
	    echo $contador;
	break;

}
?>