<?php
//call library
require_once('nusoap.php');
$URL       = "www.wirecard.com.tr/CreditCardPaymentResultService";
$namespace = $URL . '?wsdl';
//using soap_server to create server object
$server    = new soap_server;
$server->configureWSDL('Wirecard', $namespace);

//register a function that works on server
$server->register('ReceiveTransactionResult');

// create the function
function subscriptionDeactivation($StatusCode, $ResultCode,$ResultMessage,$OrderId,$MPAY,$Price,$TransactionDate,$ServiceTypeCode,$TransactionTypeCode,$ExtraParam)
{
        return null;
}


// create HTTP listener
$server->service($HTTP_RAW_POST_DATA);
exit();
?>