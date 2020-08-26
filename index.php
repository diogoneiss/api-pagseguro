<?php
//https://m.pagseguro.uol.com.br/v3/guia-de-integracao/tutorial-da-biblioteca-pagseguro-em-php.html?_rnt=dd#configuracao
//https://sandbox.pagseguro.uol.com.br/
include_once("PagSeguroLibrary/PagSeguroLibrary.php");

$paymentRequest = new PagSeguroPaymentRequest();  
$paymentRequest->addItem('0001', 'Notebook', 1, 2430.00);  
$paymentRequest->addItem('0002', 'Mochila',  1, 150.99);  

$paymentRequest->setCurrency("BRL");  

// Referenciando a transação do PagSeguro em seu sistema  
$paymentRequest->setReference("REF123");  
  
// URL para onde o comprador será redirecionado (GET) após o fluxo de pagamento  
$paymentRequest->setRedirectUrl("http://www.lojamodelo.com.br");  
  
// URL para onde serão enviadas notificações (POST) indicando alterações no status da transação  
$paymentRequest->addParameter('notificationURL', 'https://tutoriaiseinformatica.com/sdkpagseguro/response.php');  

$paymentRequest->addParameter('senderBornDate', '07/05/1981');  

try {  
  
    $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
    $checkoutUrl = $paymentRequest->register($credentials);  
    echo "<a href='{$checkoutUrl}'>Pagar Agora</a>";

  } catch (PagSeguroServiceException $e) {  
      die($e->getMessage());  
  }  
?>
