<?php

    class CModel{
        private $mysql;
        private $result;
    
        public function __construct() {
            $connectionData = [ "host" => "", "userName" => "", "password" => "", "dbName" => "" ];
            
            $mysql = mysqli_connect($connectionData["host"], $connectionData["userName"], $connectionData["password"], $connectionData["dbName"]);
            
            if(!$mysql){
                die("Connection error: " . mysql_error());
            }
            
            mysqli_query($mysql, "SET NAMES 'utf8_general_ci'");
            mysqli_query($mysql, "SET CHARACTER SET 'utf8_general_ci'");
            
            $this->mysql = $mysql;
        }
        
        //Выборка данных меню
        public function GetDataMenu($arrParams){
            $parentFields = $arrParams["PARENT"]["FIELDS"];
            $strParentFields = implode(",", $parentFields);
            $strParentChild = implode(",", $arrParams["CHILD"]["FIELDS"]);
            
            $resultDB = mysqli_query($this->mysql, "SELECT $strParentFields FROM `menu` WHERE parent_id = 0");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $idParentMenu[] = $row[$parentFields[0]];
                for($i = 1; $i < count($parentFields); $i++){
                    $temp[$parentFields[$i]] = $row[$parentFields[$i]];
                }
                $result[] = $temp;
                
            }                   
            
            for($i = 0; $i < count($idParentMenu); $i++){
                $resultDB = mysqli_query($this->mysql, "SELECT $strParentChild FROM `menu` WHERE parent_id = $idParentMenu[$i]");
            
                while($row = mysqli_fetch_assoc($resultDB)){                    
                    $resultPar[] = $row;
                }

                $result[$i]["child"] = $resultPar;
                $resultPar = [];
            }
            
    		return $result;           
        }
        
        public function GetAuth(){
            $result = [ "isAuth" => false ];

            return $result;
        }
        
        public function GetOptions($optionsName){
            $resultDB = mysqli_query($this->mysql, "SELECT value FROM `options` WHERE `options`.`name` = '$optionsName'");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result = $row["value"];
            }
            
    		return $result;
        }
        
        //Выборка категорий работы
        public function GetJobCategory($arrParams){
            $fields = $arrParams["FIELDS"];
            $strFields = implode(",", $fields);
            
            $resultDB = mysqli_query($this->mysql, "SELECT $strFields FROM `category` LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Выборка списка должностей
        public function GetJobList($arrParams){
            $resultDB = mysqli_query($this->mysql, "SELECT p.`id`, p.`name` as position, p.`salary-min`, p.`salary-max`, p.`working_day`, co.`name` , co.`logo`, co.`address` FROM `position` p INNER JOIN `companies` co ON p.companies_id = co.id ORDER BY `p`.`" . $arrParams["ORDER"]["FIELDS"] . "` " . $arrParams["ORDER"]["DIRECTION"] ." LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = [
                    "company_logo" => $row["logo"],
                    "company_name" => $row["name"],
                    "company_address" => $row["address"],
                    "position" => $row["position"],
                    "salary-min" => $row["salary-min"],
                    "salary-max" => $row["salary-max"],
                    "working_day" => $row["working_day"],
                ];
            }
            
    		return $result;           
        }
        
        //Выборка статистики
        public function GetStatistics($arrParams){
            $fields = $arrParams["FIELDS"];
            $strFields = implode(",", $fields);
            
            $resultDB = mysqli_query($this->mysql, "SELECT $strFields FROM `statistics` LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Выборка списка компаний и их должностей
        public function GetCompanyList($arrParams){
            $resultDB = mysqli_query($this->mysql, "SELECT companies.id, companies.name, companies.logo, companies.location, (SELECT COUNT(*) as count FROM position WHERE companies_id = companies.id) quantity FROM companies ORDER BY " . $arrParams["ORDER"]["FIELDS"] . " " . $arrParams["ORDER"]["DIRECTION"] . " LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Выборка списка отзывов
        public function GetTestimonialList($arrParams){
            $fields = $arrParams["FIELDS"];
            $strFields = implode(",", $fields);
            
            $resultDB = mysqli_query($this->mysql, "SELECT $strFields FROM `testimonial` LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Выборка списка записей блога
        public function GetBlogList($arrParams){
            $resultDB = mysqli_query($this->mysql, "SELECT * FROM `blog` ORDER BY " . $arrParams["ORDER"]["FIELDS"] . " " . $arrParams["ORDER"]["DIRECTION"] ." LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Выборка списка записей блога
        public function GetBlogSingle($arrParams){
            $resultDB = mysqli_query($this->mysql, "SELECT * FROM `blog` WHERE id = ".$arrParams["ID"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        public function GetCompanySingle($arrParams){
            $resultDB = mysqli_query($this->mysql, "SELECT * FROM `companies` WHERE id = ".$arrParams["ID"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        public function GetCompanyPosition($arrParams){
            $resultDB = mysqli_query($this->mysql, "SELECT * FROM `position` WHERE companies_id = ".$arrParams["ID"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Выборка списка Quick links по статусу
        public function GetQuickLinksList($arrParams){
            $fields = $arrParams["FIELDS"];
            $strFields = implode(",", $fields);
            
            $resultDB = mysqli_query($this->mysql, "SELECT $strFields FROM `menu` WHERE status = 1 ORDER BY " . $arrParams["ORDER"]["FIELDS"] . " " . $arrParams["ORDER"]["DIRECTION"] ." LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Выборка популярных категорий работы
        public function GetTrendingJobCategory($arrParams){            
            $fields = $arrParams["FIELDS"];
            $strFields = implode(",", $fields);
            
            $resultDB = mysqli_query($this->mysql, "SELECT $strFields FROM `category` WHERE status = 1 ORDER BY " . $arrParams["ORDER"]["FIELDS"] . " " . $arrParams["ORDER"]["DIRECTION"] ." LIMIT " . $arrParams["LIMIT"]["FROM"] . "," . $arrParams["LIMIT"]["TO"]);
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Регистрация
        public function GetRegistration($name, $email, $pass, $rol = 0){            
            $result = mysqli_query($this->mysql, "INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES (NULL, '$name', '$email', '$pass', '$rol')");
            
            return $result;
        }
        
        //Проверка на существования email
        public function IsEmail($email){            
            $resultDB = mysqli_query($this->mysql, "SELECT email FROM `users` WHERE email = '$email'");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                return true;
            }
            
            return false;          
        }
        
        //Авторизация
        public function GetAuthorization($email, $pass){
            $resultDB = mysqli_query($this->mysql, "SELECT id, username, role FROM `users` WHERE email = '$email' AND password = '$pass'");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                return $row;
            }
            return false;          
        }
        
        //Получение названия столбцов
        public function GetNameColumns($nameTable){
            $resultDB = mysqli_query($this->mysql, "SHOW COLUMNS FROM `$nameTable`");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row["Field"];
            }
            
    		return $result;           
        }
        
        //Получение данных таблицы
        public function GetAllData($nameTable){
            $resultDB = mysqli_query($this->mysql, "SELECT * FROM `$nameTable`");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = $row;
            }
            
    		return $result;           
        }
        
        //Получение данных строки
        public function GetRowData($nameTable, $id){
            $resultDB = mysqli_query($this->mysql, "SELECT * FROM `$nameTable` WHERE id = $id");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result = $row;
            }
            
    		return $result;           
        }
        
        //Удаление строки
        public function GetDeleteRow($nameTable, $id){
            $resultDB = mysqli_query($this->mysql, "DELETE FROM `$nameTable` WHERE `$nameTable`.`id` = $id");
            
    		return $resultDB;           
        }
        
        //Редактирование поля в таблице
        public function GetEditField($nameTable, $id, $field, $val){
            $resultDB = mysqli_query($this->mysql, "UPDATE `$nameTable` SET `$field` = '$val' WHERE `$nameTable`.`id` = $id");
            
    		return $resultDB;
        }
        
        //Jбнуление AUTO_INCREMENT
        public function GetAutoIncr($nameTable){
            $resultDB = mysqli_query($this->mysql, "ALTER TABLE $nameTable AUTO_INCREMENT = 0");
            
    		return $resultDB;           
        }
        
        //Добавление опции
        public function GetInsertOptions($name, $value){            
            $result = mysqli_query($this->mysql, "INSERT INTO `options` (`id`, `name`, `value`) VALUES (NULL, '$name', '$value')");
            
            return $result;
        }
        

        public function GetInsertBlog($title, $text, $img, $date){            
            $result = mysqli_query($this->mysql, "INSERT INTO `blog` (`id`, `title`, `text`, `img`, `date`, `quantity`) VALUES (NULL, '$title', '$text', '$img', '$date', '0')");
            
            return $result;
        }
    }

?>