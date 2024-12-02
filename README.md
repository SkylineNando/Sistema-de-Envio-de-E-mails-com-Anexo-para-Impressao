# Sistema de Envio de E-mails com Anexo para Impressão

Este documento detalha como configurar, cadastrar e utilizar o código PHP para enviar e-mails com anexos destinados a um endereço de e-mail específico, como uma impressora compatível com o serviço **Epson Connect**.

---

## **1. Como Funciona**

O script PHP é projetado para:
1. Enviar um e-mail para um endereço especificado.
2. Incluir um arquivo PDF como anexo no e-mail.
3. Garantir que o e-mail esteja formatado corretamente para compatibilidade com serviços de impressão remota, como o Epson Connect.

---

## **2. Configuração Inicial**

### **Pré-requisitos**
1. Um servidor com suporte a PHP e configuração para envio de e-mails (ex.: `sendmail` habilitado).
2. Uma impressora compatível com o serviço Epson Connect, com um endereço de e-mail configurado para receber documentos.

---

### **2.1. Configurar o Destinatário**

Localize a linha no código:

```php
$to = "suaimpressora@example.com";
```

Substitua `suaimpressora@example.com` pelo endereço de e-mail gerado pelo serviço Epson Connect para sua impressora.

**Exemplo:**
```php
$to = "suaimpressora@example.com";
```

---

### **2.2. Configurar o Remetente**

O remetente é definido nos cabeçalhos. Localize:

```php
$headers = "From: meuemail@exemplo.com" . "\r\n" .
           "Reply-To: meuemail@exemplo.pro" . "\r\n";
```

Substitua `hi@ubity.pro` pelo e-mail que deseja configurar como remetente. Este endereço pode ser um e-mail próprio ou genérico configurado no servidor.

**Exemplo:**
```php
$headers = "From: meuemail@example.com" . "\r\n" .
           "Reply-To: meuemail@example.com" . "\r\n";
```

---

### **2.3. Especificar o Arquivo a Ser Anexado**

Localize a linha no código:

```php
$file = "documento.pdf";
```

Substitua `"documento.pdf"` pelo caminho completo do arquivo que deseja anexar. O arquivo deve estar presente no servidor e ser acessível.

**Exemplo:**
```php
$file = "/var/www/html/uploads/relatorio.pdf";
```

---

## **3. Como Utilizar o Script**

1. **Prepare o Arquivo**  
   Certifique-se de que o arquivo especificado na variável `$file` esteja presente no caminho configurado.

2. **Suba o Código no Servidor**  
   Faça o upload do arquivo PHP para o servidor.

3. **Execute o Script**  
   Execute o script via navegador ou linha de comando.  
   **Exemplo via navegador:**  
   - Acesse `http://seusite.com/enviar-documento.php`.

4. **Receba a Confirmação**  
   O script exibirá uma das mensagens abaixo:
   - Sucesso: `Documento enviado com sucesso!`
   - Erro: `Erro ao enviar o documento.`

---

## **4. Como Obter um Endereço de E-mail para Impressão no Epson Connect**

O serviço Epson Connect permite que impressoras compatíveis recebam documentos via e-mail. Siga os passos abaixo para configurar:

1. **Registre-se no Epson Connect**  
   Acesse o site oficial [Epson Connect](https://www.epsonconnect.com/) e crie uma conta, caso ainda não tenha.

2. **Conecte sua Impressora**  
   - Instale o driver e o software Epson em seu computador.
   - Durante o processo de instalação, selecione **"Epson Connect Printer Setup"**.

3. **Configure a Impressora no Serviço**  
   - Siga as instruções para vincular sua impressora à conta Epson Connect.
   - Após a conclusão, será gerado um endereço de e-mail exclusivo para a impressora.

4. **Teste o E-mail**  
   Envie um e-mail simples para o endereço fornecido para verificar a funcionalidade.

5. **Insira o E-mail no Código**  
   Utilize o endereço gerado no campo `$to` do código PHP.

---

## **5. Solução de Problemas**

### **Erro: "Erro ao enviar o documento."**
- Verifique se o servidor de e-mail está configurado corretamente no PHP (ex.: `sendmail` habilitado).
- Certifique-se de que o arquivo especificado em `$file` existe.

### **O e-mail não chega ao destinatário**
- Verifique o endereço de e-mail configurado em `$to`.
- Confira a pasta de spam do destinatário.
- Use um endereço de e-mail alternativo como remetente (ex.: um e-mail confiável, como Gmail).

### **Arquivo corrompido ou ausente no e-mail recebido**
- Certifique-se de que o arquivo PDF esteja acessível e correto no caminho configurado.

---

## **6. Personalização**

### Alterar o Assunto do E-mail
Modifique o campo:
```php
$subject = "Documento para Impressão";
```

**Exemplo:**
```php
$subject = "Relatório Financeiro";
```

---

### Alterar a Mensagem do E-mail
Edite o conteúdo da variável `$message`:
```php
$message = "Segue em anexo o documento para impressão.";
```

**Exemplo:**
```php
$message = "Este é o relatório solicitado.";
```

---

Com este guia, você pode configurar o sistema de envio de e-mails com anexo para impressoras compatíveis com o Epson Connect ou outros serviços similares.
