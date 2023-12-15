<?php
    use Controller\PdfGradoController;
    $pdf = new PdfGradoController();
    $pdf = $pdf->generate();
?>