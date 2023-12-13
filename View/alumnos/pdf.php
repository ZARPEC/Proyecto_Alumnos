<?php
    use Controller\pdfAlumnosController;
    $pdf = new PdfAlumnosController();
    $pdf = $pdf->generate();
?>