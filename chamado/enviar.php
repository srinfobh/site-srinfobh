<?
$hoje_tmp = getdate();
$hoje = ($hoje_tmp[hours].":".$hoje_tmp[minutes].":".$hoje_tmp[seconds]);

$nome = $_POST["Nome"];
$email = $_POST["email"];
$fone = $_POST["fone"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];


global $email;

// FAÇA ESTAS CONFIGURAÇÕES

$enviou = mail("suporte@srinfobh.com.br", // COLOQUE SEU E-MAIL AQUI!
"ABERTURA DE CHAMADO!", // COLOQUE O ASSUNTO DO E-MAIL A SER RECEBIDO

// TERMINO DA CONFIGURAÇÃO

"Nome: $nome
 E-mail: $email
 Fone: $fone
 Assunto: $assunto
 Mensagem: $mensagem
======================"
,
"From: $email");

if ($enviou){
?> <script language="javascript"> alert ('<? echo "$nome, CHAMADO aberto com sucesso! Aguarde nosso retorno!."; ?>') </script> <?
}

else {
?> <script language="javascript"> alert ('<? echo "$nome, Não enviado<br>Tente novamente."; ?>') </script> <?

}
?>
