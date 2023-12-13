<?php

namespace Controller;

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Controller\gradoController;

class pdfGradoAlumnosController{

    
    public function generate()
    {
        $alumno = new gradoController();
        $listaAlumnos = $alumno->mostrarAlumnosGrado();
        $profesor=$_SESSION['usuario'];
        $dompdf = new Dompdf();
        $headerTable = '
        <style>
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }
        
        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        
        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }
        
        table th,
        table td {
            border: 1px solid #ddd;
            padding: .625em;
            text-align: center;
        }
        
        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
        
        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }
        
            table caption {
                font-size: 1.3em;
            }
        
            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
        
            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }
        
            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }
        
            table td::before {
                content: attr(aria-label);
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
        
            table td:last-child {
                border-bottom: 0;
            }
        }
        </style>
    
    <h1>Listado Alumnos de '.$profesor.'</h1>
    <center><table>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>curso</th>
        <th>Fecha</th>';

        $footerTable = '</table>';

        $bodyTable = "";
        foreach ($listaAlumnos as $alumno) {
            $bodyTable = $bodyTable . "<tr><td>" . $alumno['id'] . "</td>"."<td>" . $alumno['nombreAlumno'] . "</td>"."<td>" . $alumno['apellido'] . "</td>" . "<td>" . $alumno['curso'] . "</td><td>" . $alumno['fecha'] . "</td></tr>";
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