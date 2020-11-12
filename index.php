<?php
    session_start();
    
    require "CController.php";
    
	$controller = new CController();
    
    $arrParams = [          
        "SetJobCategory" => [
            "FIELDS" => [ "id", "name" ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("main_JobCategory_limit-to") ],
        ],
        "SetJobList" => [
            "ORDER" => [
                "FIELDS" => $controller->SetOptions("main_JobList_order-fields"),
                "DIRECTION" => $controller->SetOptions("main_JobList_order-direction")
            ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("main_JobList_limit-to") ],
        ],
        "SetStatistics" => [
            "FIELDS" => [ "name", "value" ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("main_Statistics_limit-to") ],
        ],
        "SetCompanyList" => [
            "ORDER" => [
                "FIELDS" => $controller->SetOptions("main_CompanyList_order-fields"),
                "DIRECTION" => $controller->SetOptions("main_CompanyList_order-direction")
            ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("main_CompanyList_limit-to") ],
        ],
        "SetTestimonialList" => [
            "FIELDS" => [ "name", "position", "logo", "text" ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("main_TestimonialList_limit-to") ],
        ],
        "SetBlogList" => [
            "ORDER" => [
                "FIELDS" => $controller->SetOptions("main_BlogList_order-fields"),
                "DIRECTION" => $controller->SetOptions("main_BlogList_order-direction")
            ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("main_BlogList_limit-to") ],
        ],
    ];

    $controller->CollectorAction("main", "Keller - Job Board HTML Template", $arrParams);

?>