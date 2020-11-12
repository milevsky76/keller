<?php

    session_start();
    
    if(isset($_SESSION["USER"]) && $_SESSION["USER"] != "" && $_SESSION["USER"]["ROLE"] != 0){
        require "../CController.php";
    
    	$controller = new CController();
        
        if(empty($_GET["act"])){
            $arrParams = [          
                "ACT" => "options",
            ];
        } else{
            if($_GET["act"] == "logout"){
                unset($_SESSION["USER"]);
                header('Location: /');
                exit();
            }
            $arrParams = [          
                "ACT" => $_GET["act"],
            ];
        }
        
        $controller->CollectorAction("admin", "Keller - Admin panel", $arrParams);
    } else{
        header("Location: /404");
        exit();
    }

    

?>