<h2>Пользователи</h2>

<?php
    $nameTable = "users";
    $controller = new CController();
    
    //Удаление
    if(isset($_GET["delete"])){
        $controller->SetDeleteRow($nameTable, $_GET["delete"]);
        $msg = "Пользователь удален!";
        $_SESSION["msg"] = $msg;
    }
    
    //Сохранение изменений
    if(isset($_POST["save-user"])){
        $arrDataRow = $controller->SetRowData($nameTable, $_POST["id"]);
        
        foreach($arrDataRow as $key => $value){
            if($value != $_POST[$key]){
                if($_POST[$key] != ""){
                    $result = $controller->SetEditField($nameTable, $_POST["id"], $key, $_POST[$key]);
                }else{
                    $result = false;
                }
                
                if($result){
                    $msg .= "Поле - <b>$key</b>, успешно изменено! <br>";
                    $_SESSION["msg"] = $msg;
                }else{
                    $msg .= "Ошибка, поле - <b>$key</b>, не изменено! <br>";
                    $_SESSION["msg"] = $msg;
                }
            }
        }
        
        unset($_GET);
        unset($_POST);
    }

    if(isset($_POST["add"])){
        if($_POST["username"] != "" && $_POST["email"] != "" && $_POST["password"] != ""){
            $result = $controller->SetRegistration($_POST["username"], $_POST["email"], $_POST["password"]);
            
            if($result){
                $msg = "Пользователь добавлен!";
                $_SESSION["msg"] = $msg;
            } else{
                $msg = "Ошибка, пользователь не добавлен!";
                $_SESSION["msg"] = $msg;
            }
        }else{
            $msg = "Ошибка, введите корректные данные!";
            $_SESSION["msg"] = $msg;
        }
        
        unset($_GET);
        unset($_POST);
    }

    $nameColumns = $controller->SetNameColumns($nameTable);
    $arrData = $controller->SetAllData($nameTable);

    if(isset($_GET["edit"]) && $_GET["edit"] != ""){
        require "../views/user-edit.php";
    } else if(isset($_GET["add"]) && $_GET["add"] == ""){
        require "../views/user-add.php";
    } else{ 
        if(isset($arrData)){
            require "../views/user-show.php";
        } else{
            $msg = "Список пуст! <br>";
            $_SESSION["msg"] = $msg;
        } ?>
        
        <a href="?act=<?=$nameTable;?>&add">Добавить</a> <br />
        
        <?php
    
        if($_SESSION["msg"]){
            echo $_SESSION["msg"]; 
            unset($_SESSION["msg"]);
        }
        
    }
?>