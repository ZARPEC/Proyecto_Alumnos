<?php
    use Controller\PdfGradoAlumnosController;
    $pdf = new PdfGradoAlumnosController();
    $pdf = $pdf->generate();
?>