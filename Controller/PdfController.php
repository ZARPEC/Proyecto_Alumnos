<?php

namespace Controller;

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Controller\profesorController;

class PdfController
{

    public function generate()
    {
        $profesor = new profesorController();
        $listaProfesores = $profesor->MostrarProfesores();
        $dompdf = new Dompdf();
        $headerTable = '<style>
        body { background-color: white; }
        p { background-color: white; }
        table, th, td {
            border: 1px solid;
        }
    </style>
    
    <h1>Listado de profesores</h1>
    <center><table style="border: 1px solid black;">
        <tr>Nombres</tr>
        <tr>Apellidos</tr>
        <tr>';

        $footerTable = '</table>';

        $bodyTable = "";
        foreach ($listaProfesores as $profesor) {
            $bodyTable = $bodyTable . "<tr><td>" . $profesor['nombre'] . "</td>" . "<td>" . $profesor['apellido'] . "</td></tr>";
        }

        $completeTable = $headerTable . $bodyTable . $footerTable;

        $dompdf->loadHtml($completeTable);
        ob_clean();
        header("Content-type: application/pdf");
        $dompdf->render();
        $dompdf->stream("documento.pdf", ['Attachment' => false]);
        exit(0);
    }
}
