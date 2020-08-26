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

        switch($status){
            case "WAITING_PAYMENT":
                echo "Aguardando P";
                return false;
            break;

            case "PAID":
                echo "P";
                return true;
            break;

            case "AVAILABLE":
                echo "A";
                return false;
            break;

            case "IN_DISPUTE":
                echo "em";
                return false;
            break;

            case "CANCELLED":
                echo "C";
                return false;
            break;

            case "REFUNDED":
                echo "R";
                return false;
            break;
        }
        
      } catch (PagSeguroServiceException $e) {  
        die($e->getMessage());  
      } 
?>
<script>create({$reference, $status, $notificationCode}, 'Clientes');</script>
<script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>
 