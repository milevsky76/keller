<?php
	session_start();

    require "../CController.php";
    
	$controller = new CController();
    
    $arrParams = [
        "address" => $controller->SetOptions("contact_address"),
        "phone1" => $controller->SetOptions("contact_phone1"),
        "phone2" => $controller->SetOptions("contact_phone2"),
        "email" => $controller->SetOptions("contact_email"),
    ];
    
    $controller->CollectorAction("contact", "Contact", $arrParams);

?>