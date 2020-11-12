<h2>Опции</h2>

<?php
    $nameTable = "options";
    $controller = new CController();
    
    //Удаление
    if(isset($_GET["delete"])){
        $controller->SetDeleteRow($nameTable, $_GET["delete"]);
        $msg = "Опция удалена!";
        $_SESSION["msg"] = $msg;
    }
    
    //Сохранение изменений
    if(isset($_POST["save-optc"])){
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
        if($_POST["name"] != "" && $_POST["value"] != ""){
            $result = $controller->SetInsertOptions($_POST["name"], $_POST["value"]);
        
            if($result){
                $msg = "Опция добавлена!";
                $_SESSION["msg"] = $msg;
            } else{
                $msg = "Ошибка, опция не добавлена!";
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
        require "../views/options-edit.php";
    } else if(isset($_GET["add"]) && $_GET["add"] == ""){
        require "../views/options-add.php";
    } else{ 
        if(isset($arrData)){
            require "../views/options-show.php";
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