<?php

use Dompdf\Dompdf;

// include autoloader
require_once("dompdf/autoload.inc.php");
// Obtendo os dados por meio de um loop while
function generate_pdf($html)
{
	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carregando o HTML
	$dompdf->load_html($html);

	//Renderizar o html
	$dompdf->render();
	$random =  date('m-d-Y h:i:s a', time()) . rand(0, 150);
	//Exibindo a página
	$dompdf->stream(
		"relatorio_pdf-$random.pdf",
		array(
			"Attachment" => False //Para realizar o download somente alterar para true
		)
	);
}