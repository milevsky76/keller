<?php
    session_start();

    require "../CController.php";
    
	$controller = new CController();
    
    $arrParams = [
        "SetJobCategory" => [
            "FIELDS" => [ "id", "name" ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("main_JobCategory_limit-to") ],
        ],
        "SetCompanyList" => [
            "ORDER" => [
                "FIELDS" => $controller->SetOptions("company_CompanyList_order-fields"),
                "DIRECTION" => $controller->SetOptions("company_CompanyList_order-direction")
            ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("company_CompanyList_limit-to") ],
        ],
    ];
    
    if(isset($_GET["id"])){
        $arrParams["SetCompanySingle"] = ["ID" => $_GET["id"]];
        $controller->CollectorAction("companysingle", "Company", $arrParams);
    } else{
        $controller->CollectorAction("company", "Company", $arrParams);
    }

?>