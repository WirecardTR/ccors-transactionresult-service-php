<?php
//call library
require_once('nusoap.php');

$URL       = "www.wirecard.com.tr/CreditCardPaymentResultService";
$namespace = 'http://cservices.mikro-odeme.com.tr/mapping/generated';
//using soap_server to create server object
$server    = new soap_server;
$server->configureWSDL('Wirecard', $namespace);

$server->wsdl->addComplexType('input','complexType','struct','all','',
array(  
        'StatusCode' => array('name' => 'StatusCode','type' => 'xsd:int'),
        'ResultCode' => array('name' => 'ResultCode','type' => 'xsd:string'),
        'ResultMessage' => array('name' => 'ResultMessage','type' => 'xsd:string'),
        'OrderId' => array('name' => 'OrderId','type' => 'xsd:string'),
        'MPAY' => array('name' => 'MPAY','type' => 'xsd:string'),
        'Price' => array('name' => 'Price','type' => 'xsd:double'),
        'TransactionDate' => array('name' => 'TransactionDate','type' => 'xsd:dateTime'),
        'ServiceTypeCode' => array('name' => 'ServiceTypeCode','type' => 'xsd:string'),
        'TransactionTypeCode' => array('name' => 'TransactionTypeCode','type' => 'xsd:string'),
        'ExtraParam' => array('name' => 'ExtraParam','type' => 'xsd:string'),
        'Price' => array('name' => 'Price','type' => 'xsd:string')
        )
);
 
$server->wsdl->addComplexType('Response','complexType','struct','all','',
array(  
        'StatusCode' => array('name' => 'StatusCode','type' => 'xsd:int'),
        'ResultCode' => array('name' => 'ResultCode','type' => 'xsd:string'),
        'ResultMessage' => array('name' => 'ResultMessage','type' => 'xsd:string')
        )
);

//register a function that works on server
$server->register('ReceiveTransactionResult',
array('input'=>'tns:input'),
array('Response'=>'tns:Response')
);

// create the function
function ReceiveTransactionResult($input)
{
        return $Response;
}


// otherwise leave this data blank.
@$server->service(file_get_contents("php://input"));


exit();
?>