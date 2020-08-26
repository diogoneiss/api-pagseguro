<?php
    include_once("PagSeguroLibrary/PagSeguroLibrary.php");
    $notificationCode = $_POST['notificationCode'];  
    
    try {  
  
      $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
      $response = PagSeguroNotificationService::checkTransaction(  
        $credentials,  
        $notificationCode  
      );

      $reference = $response->getReference();
      $status = $response->getStatus()->getTypeFromValue();
      //WAITING_PAYMENT-PAID-AVAILABLE-IN_DISPUTE-CANCELLED-REFUNDED
      switch($status){
        case "WAITING_PAYMENT":

        break;

        case "PAID":

        break;

        case "AVAILABLE":

        break;

        case "IN_DISPUTE":

        break;

        case "CANCELLED":

        break;

        case "REFUNDED":

        break;

      }
      
    } catch (PagSeguroServiceException $e) {  
      die($e->getMessage());  
    }  