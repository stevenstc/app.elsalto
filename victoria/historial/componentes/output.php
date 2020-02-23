<?php
require '../../librerias/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml( file_get_contents( 'https://app.dogelino.com/elsalto_v1/victoria/historial/componentes/lista-niños.php') );

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
// obtiene los datos de hoy para la descarga
$hoy = getdate();
// Output the generated PDF to Browser
$dompdf->stream("Historial_".$hoy[mday]."_".$hoy[month]."_".$hoy[year].".pdf");
