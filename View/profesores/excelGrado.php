<?php
require 'vendor/autoload.php'; //Composer
//require 'vendor/phpoffice/phpspreadsheet/Spreadsheet.php';

use Controller\gradoController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

//use phpoffice\phpspreadsheet\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// Crear instancia, clase controller
$gradoController = new gradoController();
$listado = $gradoController->mostrarAlumnosGrado();

// Crear instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agregar encabezados
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Carnet');
$sheet->setCellValue('C1', 'Nombre');
$sheet->setCellValue('D1', 'Apellido');
$sheet->setCellValue('E1', 'curso');

// Agregar datos desde la base de datos
//print_r ($listado);
$row = 2;
foreach ($listado as $item) {
    $sheet->setCellValue('A' . $row, $item['id']);
    $sheet->setCellValue('B' . $row, $item['carnet']);
    $sheet->setCellValue('C' . $row, $item['nombreAlumno']);
    $sheet->setCellValue('D' . $row, $item['apellido']);
    $sheet->setCellValue('E' . $row, $item['curso']);
    $row++;
}

// Crea objeto de escritura para exportar a formato Excel (xlsx)
$writer = new Xlsx($spreadsheet);
// Establecer las cabeceras para forzar la descarga
ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadoAlumnos.xlsx"');


// Enviar la salida del escritor al navegador
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
header("Location: listadoAlumnos.xlsx");
/*$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('output.xlsx'); */
