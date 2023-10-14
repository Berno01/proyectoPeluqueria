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
$telef_usuario=isset($_POST["telef_usuario"])? mb_strtoupper($_POST["telef_usuario"]):"";

$login=isset($_POST["login_usuario"])? $_POST["login_usuario"]:"";
$clave=isset($_POST["clave_usuario"])? $_POST["clave_usuario"]:"";

switch ($_GET["op"]){
    case '1':
        
        //Hash SHA256 en la contraseña
		$clavehash=$seguridad->stringEncryption('encrypt', $clave);
		if (empty($id_usuario)){
			$rspta=$usuario->insertar($nombre_usuario, $apellidop_usuario,$login,$clavehash,$rol_usuario, $telef_usuario);
			echo $rspta ? "1:El usuario fué registrado" : "0:El usuario no fué registrado";
		}
		else {
			$rspta=$usuario->editar($id_usuario, $nombre_usuario, $apellidop_usuario,$login,$clavehash,$rol_usuario, $telef_usuario);
			echo $rspta ? "1:El usuario fué actualizado" : "0:El usuario no fué actualizado";
		}
	break;


case '5':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

	    //Hash SHA256 en la contraseña
		$clavehash=$seguridad->stringEncryption('encrypt', $clavea);

		$rspta=$usuario->verificar($logina, $clavehash);
		$contador=0;
		while ($fetch= mysqli_fetch_assoc($rspta)){
			$contador+=1;
			//Declaramos las variables de sesión
	        $_SESSION['id_usuario']=$fetch['id_usuario'];
	        $_SESSION['nombre_usuario']=$fetch['nombre_usuario']." ".$fetch['apellidop_usuario'];
	        
	        $_SESSION['login_usuario']=$fetch['login_usuario'];
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

	case '6':
		session_unset();
		header('Location: ../index.php');
	break;
		

}
?>