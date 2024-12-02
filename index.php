<?php
// Configurações principais
$to = "suaimpressora@example.com"; // Substitua pelo endereço do destinatário
$from = "meuemail@example.com"; // Substitua pelo endereço do remetente
$replyTo = "meuemail@example.com"; // Substitua pelo endereço para respostas
$subject = "Documento para Impressão";
$message = "Segue em anexo o documento para impressão.";
$filePath = "/var/www/html/uploads/relatorio.pdf"; // Caminho do arquivo a ser anexado

// Verificação do arquivo
if (!file_exists($filePath)) {
    die("Erro: O arquivo '$filePath' não foi encontrado.");
}

// Lendo e codificando o arquivo
$filename = basename($filePath);
$fileData = file_get_contents($filePath);
$fileEncoded = chunk_split(base64_encode($fileData));

// Cabeçalhos do e-mail
$boundary = uniqid("boundary");
$headers = "From: $from\r\n";
$headers .= "Reply-To: $replyTo\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";

// Corpo do e-mail
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=UTF-8\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= "$message\r\n\r\n";
$body .= "--$boundary\r\n";
$body .= "Content-Type: application/pdf; name=\"$filename\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n\r\n";
$body .= "$fileEncoded\r\n";
$body .= "--$boundary--";

// Enviar o e-mail
if (mail($to, $subject, $body, $headers)) {
    echo "Documento enviado com sucesso!";
} else {
    echo "Erro ao enviar o documento.";
}
?>
