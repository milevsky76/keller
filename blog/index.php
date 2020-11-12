<?php
    session_start();

    require "../CController.php";
    
	$controller = new CController();
    
    $arrParams = [
        "SetBlogList" => [
            "ORDER" => [
                "FIELDS" => $controller->SetOptions("blog_BlogList_order-fields"),
                "DIRECTION" => $controller->SetOptions("blog_BlogList_order-direction")
            ],
            "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("blog_BlogList_limit-to") ],
        ],
    ];
    
    if(isset($_GET["id"])){
        $arrParams = [
            "SetRecentPosts" => [
                "ORDER" => [
                    "FIELDS" => $controller->SetOptions("blogsingle_RecentPosts_order-fields"),
                    "DIRECTION" => $controller->SetOptions("blogsingle_RecentPosts_order-direction")
                ],
                "LIMIT" => [ "FROM" => "0", "TO" => $controller->SetOptions("blogsingle_RecentPosts_limit-to") ],
            ],
            "SetBlogSingle" => [ "ID" => $_GET["id"] ],
        ];
        $controller->CollectorAction("blogsingle", "Blog", $arrParams);
    } else{
        $controller->CollectorAction("blog", "Blog", $arrParams);
    }
    
    

?>