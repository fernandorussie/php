<?php 
include_once('protect.php');
// verificar validação
$validação = false;
	if ($validação) {
		solicitarServico();
	} else {
		echo "Conta ainda não ativada. Ative-a com o link enviado para seu email";
	}
?>