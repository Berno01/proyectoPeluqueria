<?php 
require_once "../model/Cita.php";

$cita=new Cita();

$id_cita=isset($_POST["id"])? $_POST["id"]:"";
$titulo_cita=isset($_POST["title"])? ($_POST["title"]):"";

$fecha=isset($_POST["start"])? ($_POST["start"]):"";
$hora=isset($_POST["hora"])? ($_POST["hora"]):"";

$descripcion1=isset($_POST["descripcion1"])? ($_POST["descripcion1"]):"";
$imagen=isset($_POST["imagen"])? $_POST["imagen"]:"";

switch ($_GET["op"]){

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

			$rspta=$cita->insertar($titulo_cita, $fecha, $hora, $descripcion1, $imagen);
			echo $rspta ? "1_Se registró tu corte a la agenda de LeoBarber" : "0:a acción para la Hoja de Ruta no fué registrada";
		}
		else {
			$rspta=$cita->editar($id_cita, $titulo_cita, $fecha, $hora, $descripcion1, $imagen);
			echo $rspta ? "1_Se modificó el corte" : "0:a acción para la Hoja de Ruta no fué actualizada";
		}


	break;

	
	
	
}
?>