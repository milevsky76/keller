<h2>Блог</h2>

<?php
    $nameTable = "blog";
    $controller = new CController();
    
    //Удаление
    if(isset($_GET["delete"])){
        $controller->SetDeleteRow($nameTable, $_GET["delete"]);
        $msg = "Блог удалён!";
        $_SESSION["msg"] = $msg;
    }
    
    //Сохранение изменений
    if(isset($_POST["save-blog"])){
        $arrDataRow = $controller->SetRowData($nameTable, $_POST["id"]);
        
        foreach($arrDataRow as $key => $value){
            if(isset($_POST[$key])){
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
            }else if($key == "img" && $_FILES["file"]["name"] != ""){
                if($value != $_FILES["file"]["name"]){
                    $nameFile = $controller->ValidationDataFile();
                    $result = $controller->SetEditField($nameTable, $_POST["id"], $key, $nameFile);
                    
                    if($result){
                        $msg .= "Поле - <b>$key</b>, успешно изменено! <br>";
                        $_SESSION["msg"] = $msg;
                    }else{
                        $msg .= "Ошибка, поле - <b>$key</b>, не изменено! <br>";
                        $_SESSION["msg"] = $msg;
                    }
                }
            }
        }
        
        unset($_GET);
        unset($_POST);
    }
    
    if(isset($_POST["add"])){
        if($_POST["title"] != "" && $_POST["text"] != "" && $_FILES["file"]["error"] != 4 && $_FILES["file"]["name"] != ""){
            $result = $controller->SetInsertBlog($_POST["title"], $_POST["text"], $_POST["date"]);
            
            if($result){
                $msg = "Блог добавлен!";
                $_SESSION["msg"] = $msg;
            } else{
                $msg = "Ошибка, блог не добавлен!";
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
        require "../views/blog-edit.php";
    } else if(isset($_GET["add"]) && $_GET["add"] == ""){
        require "../views/blog-add.php";
    } else{ 
        if(isset($arrData)){
            require "../views/blog-show.php";
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