<?php

namespace Controller;

require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Controller\gradoController;


class PdfGradoController
{
    public function generate()
    {
        $grado = new gradoController();
        $listaGrado = $grado->mostrarGrado();
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
    
   
    <center>
    <h1>Listado de grados</h1>
    <table>
        <th>Grado</th>
        <th>Profesor</th>';

        $footerTable = '</table>';

        $bodyTable = "";
        foreach ($listaGrado as $grado) {
            $bodyTable = $bodyTable . "<tr><td>" . $grado['grado'] . "</td>" . "<td>" . $grado['nombreProfesor'] . "</td></tr>";
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
