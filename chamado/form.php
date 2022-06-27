<?php
session_start();

error_reporting(0);
ini_set(�display_errors�, 0 );

// Inicio a sess�o, pois estamos trabalhando com sess�es.

// Aqui � a a��o do formul�rio, se clicar em enviar ele chama isto.
if(isset($_GET["validar"]) && $_GET["validar"] == "form" ){

	// Texto digitado no campo imagem, e transformando tudo em m�n�sculo, caso queria que haja distin��o de mai�sculas e min�sculas, s� retire o strtoupper().
 	$txtImagem = strtoupper($_POST["txtImagem"]);
	
	// Caracteres que est�o na imagem, tamb�m deixando tudo em min�sulo.
	$valorImagem = strtoupper($_SESSION["autenticaIMG"]);
	
	// Verificando se o texto digitado, for igual aos caracteres que est�o na imagem
	if( $txtImagem == $valorImagem ){
		//echo "Mensagem enviada...";

        include ("enviar.php"); /* Se os dados est�o corretos ent�o enviar� o e-mail com os formul�rio abaixo
                                   N�o esque�a de Configurar o Enviar.php */


    } else {
		?> <script language="javascript"> alert ('<? echo "Desculpe ". $_POST["Nome"] .", os n�meros digitados est�o incorretos!"; ?>') </script> <?
	}

}

// Incluindo o imgSet.php que seta os valores da sess�o.
require_once ("imgSet.php");	

?>
<!--
Notem que ali no <img src="imgGera.php">, eu chamo o arquivo imgGera.php...
estou adicionando ele, pois nele que est� inst�nciada a classe imagem
-->



<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12; }
.Estilo4 {font-size: 12}
.Estilo5 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo10 {
	font-size: 9px;
	color: #333333;
}
.Estilo14 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 10px; }
-->
</style>
</head>
<body>
<p><b> Informe seus dados que entraremos em contato!</b></p>


<form id="form1" name="frmImgValida" method="post" action="form.php?validar=form">
  <table width="30%" border="0" cellspacing="2">
    <tr>
      <td width="88%"><span class="Estilo4">
        <label>
        <input name="Nome" type="text" id="Nome" size="40" placeholder="Nome ou Empresa" />
        </label>
      </span></td>
    </tr>
    <tr>
      <td><span class="Estilo4">
        <input name="email" type="text" id="email" size="40" placeholder="E-mail ou Contato"/>
      </span></td>
    </tr>
    <tr>
      <td><span class="Estilo4">
        <input name="ddd" type="text" id="ddd" size="7" placeholder="DDD" />
        <input name="fone" type="text" id="fone" size="20" placeholder="Telefone" />
      </span></td>
    </tr>
    <tr>
      <td><label><span class="Estilo4">
      <input name="assunto" type="text" id="assunto" size="28" placeholder="Assunto" />
      </span></label></td>
    </tr>
    <tr>
      <td><span class="Estilo4">
        <textarea name="mensagem" cols="55" rows="5" id="mensagem" placeholder="Breve relato do problema"></textarea>
      </span></td>
    </tr>
    <tr>
      <td><span class="Estilo4">
        <label>
        <input name="txtImagem" type="text" id="txtImagem" size="20" placeholder="Quais n�meros v� ao lado?" />
        </label>
      </span>
	  <img src="imgGera.php">	  </td>
    </tr>
    <tr>
      <td><div align="right"><span class="Estilo10">
      <input type="submit" name="Submit" value="Enviar" />
      </span></div>        
	  </td>
    </tr>
  </table>
</form>


</body>
</html>