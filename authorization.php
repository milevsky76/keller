<?php
    
    $controller = new CController();
    
    //Регистрация
	if(isset($_POST["rusername"], $_POST["remail"], $_POST["rpassword"]) && ($_POST["rusername"] && $_POST["remail"] && $_POST["rpassword"]) != ""){
        $resultReg = $controller->SetRegistration($_POST["rusername"], $_POST["remail"], $_POST["rpassword"]);

        if($resultReg){
            $resultAut = $controller->SetAuthorization($_POST["remail"], $_POST["rpassword"]);
            
            $_SESSION["USER"] = [
                "ID" => $resultAut["id"],
                "NAME" => $resultAut["username"],
                "ROLE" => $resultAut["role"],
            ];
            
            $msg = "Регистрация прошла успешно!";
        } else{
            $msg = "Регистрация прервана!";
        }
        $_SESSION["msg"] = $msg;
	} else if(isset($_POST["rusername"], $_POST["remail"], $_POST["rpassword"]) && ($_POST["rusername"] && $_POST["remail"] && $_POST["rpassword"]) == ""){
        $msg = "Введены некорректные данные!";
        $_SESSION["msg"] = $msg;
    }
    
    //Авторизация
    if(isset($_POST["lemail"], $_POST["lpassword"]) && ($_POST["lemail"] && $_POST["lpassword"]) != ""){
        $res = $controller->SetAuthorization($_POST["lemail"], $_POST["lpassword"]);
        
        if(isset($res) && $res != false){
            $_SESSION["USER"] = [
                "ID" => $res["id"],
                "NAME" => $res["username"],
                "ROLE" => $res["role"],
            ];            
            $msg = "Вы вошли!";
        } else{
            $msg = "Неверный логин или пароль!";
        }
        $_SESSION["msg"] = $msg;
	} else if(isset($_POST["lemail"], $_POST["lpassword"]) && ($_POST["lemail"] && $_POST["lpassword"]) == ""){
        $msg = "Введены некорректные данные!";
        $_SESSION["msg"] = $msg;
    }
    
    if($_SESSION["USER"]){
        $arrResult["auth"]["isAuth"] = true;
        $arrResult["auth"]["name"] = $_SESSION["USER"]["NAME"];
    } else{
        $arrResult["auth"]["isAuth"] = false;
    }   

?>
