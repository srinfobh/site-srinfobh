<?php
/*****************************************
**	Classe		-	Imagem
**	Descri��o	-	Cria a imagem
******************************************/

// Inicio a sess�o, pois estamos trabalhando com sess�es.
session_start(); 

class Imagem{
	var $carac;
	
	function geraImagem(){
	
		// Seleciona uma imagem que est� na pasta bg/ com o nome 0.jpg � 9.jpg,
		// est� imagem que vai ser o fundo da nossa imagem de seguran�a.
		$fundo = "bg/";
		$fundo .= 8;
		$fundo .= ".jpg";
		
		// Cria a imagem.
		$imagem = imagecreatefromjpeg($fundo);

		// seta o $this->carac que � a sess�o carac.
		$this->carac = $_SESSION["carac"];
		
		// percorre o array carac, e traz os valores.
		foreach($this->carac as $linha) {
			// Aqui crio a cor de cada caractere, RGB.
			$cor = imagecolorallocate($imagem, $linha["corR"], $linha["corG"], $linha["corB"]);
			// desenho o lugar dos caracteres de acordo com as posi��es x e y.
			imagestring($imagem, $linha["tam"], $linha["x"], $linha["y"], $linha["c"], $cor);
		}
		
		// ele informa que isso � um arquivo PNG
		header("Content-type: image/png");
		
		// cria a imagem PNG
		imagepng($imagem);
		
	}

}

?>