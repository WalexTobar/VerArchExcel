<?php
//USAR LIBRERIA PHPEXCEL
require_once '../PHPExcel/Classes/PHPExcel.php';
/*
 *U
*/
	//datos para extraer de libro.xml
	$archivo = "libro1.xlsx";
 	$inputFileType = PHPExcel_IOFactory::identify($archivo);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objPHPExcel = $objReader->load($archivo);
	//seleciono la hoja en este caso la primer hoja
	$sheet = $objPHPExcel->getSheet(0); 
	//contar cuantas filas contiene el documento
	$highestRow = $sheet->getHighestRow();
	//tamaño de los archivos 
	$highestColumn = $sheet->getHighestColumn(); 
    if($_GET["action"] == "list"){
    	/**probando datos del archivo XLS*/
		$n =1;
		$filaDina =$_GET["jtStartIndex"]+2;
		$filas1 =[];
		$hasta = $_GET["jtPageSize"]+$_GET["jtStartIndex"]+1;
		for ($row = $filaDina; $row <= $hasta; $row++){
			$nombre =$sheet->getCell("A".$row)->getValue();
			$edad = $sheet->getCell("B".$row)->getValue();
			$rDate = $sheet->getCell("C".$row)->getValue();
			 $filas1[]=[
				 "PersonId" => "$n",
				"Name" => $nombre,
				"Age" => $edad,
				"RecordDate" => "$rDate",
			 ];
			 $n++;
        }
        //Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $highestRow-1;
		$jTableResult['Records'] = $filas1;
		print json_encode($jTableResult);   
}
?>