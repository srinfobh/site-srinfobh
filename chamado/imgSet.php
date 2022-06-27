<?php

// Destruo o $carac, para n�o ficar sobrepondo varias vezes.
unset($carac);
	
	// Crio uma imagem com 6 caracteres   - ALTERADO PARA ATE 5 CARACTERES
	for ($i = 0; $i < 4 ;$i++) {
		// Seleciona de 0 � 2, onde 0 = letra mai�scula, 1 = min�scula e 2 = n�mero.
		$tipo = rand(2,2);
		switch($tipo) {
			// se pegou 0 ele cria uma letra mai�scula de A � Z.
			// com um por�m, o chr(rand(65,90)), a fun��o chr retorna um caractere espec�fico, e o rand seleciona aleat�rio.
			// o motivo de estar rand(56,90), pois temos que usar de acordo com a tabela ASCII e o A = 65 e o Z = 90.
			case 0 : $str = chr(rand(65,90)); break;
			// mesma coisa que antes, mais aqui � min�sculo.
			case 1 : $str = chr(rand(97,122)); break;
			// mesma coisa que antes s� que aqui s�o n�meros.
			case 2 : $str = chr(rand(48,57)); break;
			// caso ocorra algun erro no rand tipo ele para por aqui.
			default : break; break;
		}
		
		// Gera um tamanho para a fonte de 3 � 5.
		$tamanho = rand(5,5);
		
		// Seleciona as cor RGB, menos muito clara, pois o fundo � branco, por isso de 0 � 200.
		$sel_corR = rand(0,200);
		$sel_corG = rand(0,200);
		$sel_corB = rand(0,200);
		
		// Joga os caracteres em um determinado lugar da imagem, x e y, sendo x sempre ele mais ele, pra n�o perder a ordem.
		// Nome que come�a em 10 e termina em 30, pois temos 6 caracteres, e nossa imagem tem 180px,
		// por isso que vai ser de 30 em 30. e 10 para n�o ficar um caractere em cima do outro.
		$x += rand(10,30);
		// o Y vai de 0 a 30, n�o a 50, pois pode cortar pois nossa imagem � de 50 px de altura.
		$y = rand(0,30);
		
		// Gera um array carac, com os dados que � o caractere, a cor do caractere, a posi��o x e y.
		$carac[] = array("c" => $str, "tam" => $tamanho, "corR" => $sel_corR, "corG" => $sel_corG, "corB" => $sel_corB, "x" => $x, "y" => $y);
		
		// crio a variavel para usar e criar a sess�o logo abaixo com os caracteres que for�o criados.
		$auth .= $str;
	}

// Crio a sess�o carac, que � igual ao array dos caracteres, que utiliza para montar a imagem la na classe.
$_SESSION["carac"] = $carac;

// Crio a sess�o autenticaIMG com os caracteres que est�o na imagem, que utilizo para verificar se o cara digitou certo.
$_SESSION["autenticaIMG"] = $auth;

?>
