<?php 
require_once "../model/Cita.php";

$cita=new Cita();

$id_usuario=isset($_POST["id_usuario"])? $_POST["id_usuario"]:"";
$id_cita=isset($_POST["id"])? $_POST["id"]:"";
$id_corte=isset($_POST["id_corte"])? $_POST["id_corte"]:"";
$titulo_cita=isset($_POST["title"])? ($_POST["title"]):"";

$fecha=isset($_POST["start"])? ($_POST["start"]):"";
$hora=isset($_POST["hora"])? ($_POST["hora"]):"";

$descripcion1=isset($_POST["descripcion1"])? ($_POST["descripcion1"]):"";
$imagen=isset($_POST["imagen"])? $_POST["imagen"]:"";

switch ($_GET["op"]){

	case '0':

		$rspta=$cita->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = mysqli_fetch_assoc($rspta)){			
			$data[]=array(
				//tipo_corte, costo_corte, referencia_corte
				
				"id"=>$reg['id_corte'],
				"title"=>$reg['nombre_usuario'],
				"start"=>$reg['fecha_corte'].' '. $reg['hora_corte'],
				"end"=>$reg['fecha_corte'].' '. $reg['hora_corte'],
				"classname"=>'Disponible',
                "editable"=>"true"
			);
		}
 		
 		echo json_encode($data);

	break;


	case '1':
		
		if (empty($id_cita))
		{
			if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
			{
				$imagen=$_POST["imagenactual"];
			}
			else 
			{
				$ext = explode(".", $_FILES["imagen"]["name"]);
				if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
				{
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "../file/cortes/" . $imagen);
				}
			}

			$rspta=$cita->insertar($titulo_cita, $fecha, $hora, $descripcion1, $imagen, $id_usuario);
			echo $rspta ? "1_Se registró tu corte a la agenda de LeoBarber" : "0_La acción para la Hoja de Ruta no fué registrada";
		}
		else {
			$rspta=$cita->editar($id_cita, $titulo_cita, $fecha, $hora, $descripcion1, $imagen);
			echo $rspta ? "1_Se modificó el corte" : "0:a acción para la Hoja de Ruta no fué actualizada";
		}

	break;

	case '4':
		$rspta=$cita->mostrar($id_corte);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	
	
	
}
?>