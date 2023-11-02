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

	case '0':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = mysqli_fetch_assoc($rspta)){

			$data[]=array(
				"4"=>($reg['estado_usuario']=='1')?'<button class="btn btn-warning" onclick="mostrar('.$reg['id_usuario'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-danger" onclick="desactivar('.$reg['id_usuario'].')"><i class="bx bx-trash"></i></button>':
					'<button class="btn btn-warning" onclick="mostrar('.$reg['id_usuario'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-primary" onclick="activar('.$reg['id_usuario'].')"><i class="bx bx-check"></i></button>',
                "0"=>$reg['nombre_usuario']." ".$reg['apellidop_usuario'],
                "1"=>$reg['telef_usuario'],
                "2"=>$reg['login_usuario'],
                "3"=>$reg['fallos_usuario'],
                
				);
		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

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

	case '4':
		$rspta=$usuario->mostrar($id_usuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
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