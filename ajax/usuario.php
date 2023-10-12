<?php 
session_start();
require_once "../model/Usuario.php";
$usuario=new usuario();

require_once "seguridad.php";
$seguridad=new seguridad();

$id_usuario=isset($_POST["id_usuario"])? $_POST["id_usuario"]:"";
$nombre_usuario=isset($_POST["nombre_usuario"])? mb_strtoupper($_POST["nombre_usuario"]):"";
$apellidop_usuario=isset($_POST["apellidop_usuario"])? mb_strtoupper($_POST["apellidop_usuario"]):"";
$apellidom_usuario=isset($_POST["apellidom_usuario"])? mb_strtoupper($_POST["apellidom_usuario"]):"";
$rol_usuario=isset($_POST["rol_usuario"])? mb_strtoupper($_POST["rol_usuario"]):"";

$login=isset($_POST["login"])? $_POST["login"]:"";
$clave=isset($_POST["clave"])? $_POST["clave"]:"";

switch ($_GET["op"]){

case '5':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

	    //Hash SHA256 en la contraseña
		$clavehash=$seguridad->stringEncryption('encrypt', $clavea);

		$rspta=$usuario->verificar($logina, $clavea);
		$contador=0;
		while ($fetch= mysqli_fetch_assoc($rspta)){
			$contador+=1;
			//Declaramos las variables de sesión
	        $_SESSION['id_usuario']=$fetch['id_usuario'];
	        $_SESSION['nombre_persona']=$fetch['nombre_persona']." ".$fetch['apellidop_usuario']." ".$fetch['apellidom_usuario'];
	        //$_SESSION['personaimagen']=$fetch['imagen_persona'];
	        $_SESSION['nombre_usuario']=$fetch['login_usuario'];
			$_SESSION['rol_usuario']=$fetch['rol_usuario'];
			
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