<?php

	require_once "CModel.php";
    require_once "CView.php";

	class CController {
		private $model;
        private $view;
        
        public function __construct(){
            $this->model = new CModel();
            $this->view = new CView();
        }
        
        public function CollectorAction($page, $title, $arrParams = []){
            if($page != "admin"){
                $arrResultLayout = self::SetLayout();                
            } else{
                $arrResultLayout = [];
                
            }
            
            $arrResultPage = self::SetPage($page, $arrParams);
            
            $arrResult = array_merge($arrResultLayout, $arrResultPage);
                        
            $this->view->RenderAction($page, $title, $arrResult);
        }
        
        //Сбор данных для макета
        public function SetLayout(){
            $arrParams = [
                "SetDataMenu" => [
                    "PARENT" => [ 
                        "FIELDS" => [ "id", "text", "link" ],
                    ],
                    "CHILD" => [ 
                        "FIELDS" => [ "text", "link" ],
                    ],
                ],
                "SetQuickLinksList" => [
                    "FIELDS" => [ "id", "text", "link" ],
                    "ORDER" => [ "FIELDS" => "id", "DIRECTION" => "ASC" ],
                    "LIMIT" => [ "FROM" => "0", "TO" => "5" ],
                ],
                "SetTrendingJobCategory" => [
                    "FIELDS" => [ "id", "name", "link" ],
                    "ORDER" => [ "FIELDS" => "id", "DIRECTION" => "ASC" ],
                    "LIMIT" => [ "FROM" => "0", "TO" => "5" ],
                ],
            ];
            
            extract($arrParams);
            
            $result = [
                "auth" => self::SetAuth(),
                "menu" => self::SetDataMenu($SetDataMenu),
                "quickLinksList" => self::SetQuickLinksList($SetQuickLinksList),
                "trendingJobCategory" => self::SetTrendingJobCategory($SetTrendingJobCategory),
            ];
            
            return $result;
        }
		
		//Сбор данных для страницы
        public function SetPage($page, $arrParams) {
            $result = [];
            
            extract($arrParams);
            
            if($page == "main"){
                $result = [
                    "jobCategory" => self::SetJobCategory($SetJobCategory),
                    "jobList" => self::SetJobList($SetJobList),
                    "statistics" => self::SetStatistics($SetStatistics),
                    "companyList" => self::SetCompanyList($SetCompanyList),
                    "testimonialList" => self::SetTestimonialList($SetTestimonialList),
                    "blogList" => self::SetBlogList($SetBlogList),
                ];
            }
            if($page == "contact"){
                $result = $arrParams;
            }
            if($page == "blog"){
                $result = [
                    "blogList" => self::SetBlogList($SetBlogList),
                ];
            }
            if($page == "blogsingle"){
                $result = [
                    "blogSingle" => self::SetBlogSingle($SetBlogSingle),
                    "recentPosts" => self::SetBlogList($SetRecentPosts),
                ];
            }
            if($page == "company"){
                $result = [
                    "companyList" => self::SetCompanyList($SetCompanyList),
                    "jobCategory" => self::SetJobCategory($SetJobCategory),
                ]; 
            }
            if($page == "companysingle"){
                $result = [
                    "companySingle" => self::SetCompanySingle($SetCompanySingle),
                    "companyPosition" => self::SetCompanyPosition($SetCompanySingle),
                ];
            }
            if($page == "admin"){
                $result = $arrParams;
            }
            
    		return $result;
		}
        
        //Получение данных меню
        public function SetAuth(){
            $result = $this->model->GetAuth();

            return $result;
        }
        
        //Получение опций
        public function SetOptions($optionsName){
            $result = $this->model->GetOptions($optionsName);

            return $result;
        }
        
        //Получение данных меню
        public function SetDataMenu($arrParams){            
            $result = $this->model->GetDataMenu($arrParams);
            
    		return $result;           
        }
        
        //Получение категорий работы
        public function SetJobCategory($arrParams){
            $result = $this->model->GetJobCategory($arrParams);
            
    		return $result;           
        }
        
        //Получение списка должностей
        public function SetJobList($arrParams){            
            $result = $this->model->GetJobList($arrParams);
            
    		return $result;               
        }
        
        //Получение статистики
        public function SetStatistics($arrParams){            
            $result = $this->model->GetStatistics($arrParams);
            
    		return $result;           
        }
        
        //Получение списка компаний и их должностей
        public function SetCompanyList($arrParams){            
            $result = $this->model->GetCompanyList($arrParams);
            
    		return $result;           
        }
        
        //Получение списка отзывов
        public function SetTestimonialList($arrParams){
            $result = $this->model->GetTestimonialList($arrParams);
            
    		return $result;           
        }
        
        //Получение списка записей блога
        public function SetBlogList($arrParams){            
            $result = $this->model->GetBlogList($arrParams);
            
            //Формат даты для блога
            foreach($result as $key => $blogList){
                $result[$key]["date"] = date("d M, Y", strtotime($blogList["date"]));
            }
            
    		return $result;           
        }
        
        
        public function SetBlogSingle($arrParams){            
            $result = $this->model->GetBlogSingle($arrParams);
            
            $result[0]["date"] = date("d M, Y", strtotime($result[0]["date"]));
            
    		return $result;           
        }
        
        public function SetCompanySingle($arrParams){            
            $result = $this->model->GetCompanySingle($arrParams);
            
            $result[0]["site"] = mb_strtolower($result[0]["name"].".com");
            
    		return $result;           
        }
        
        public function SetCompanyPosition($arrParams){            
            $result = $this->model->GetCompanyPosition($arrParams);
            
    		return $result;           
        }
        
        //Получение списка Quick links по статусу
        public function SetQuickLinksList($arrParams){
            $result = $this->model->GetQuickLinksList($arrParams);
            
    		return $result;           
        }
        
        //Получение популярных категорий работы
        public function SetTrendingJobCategory($arrParams){            
            $result = $this->model->GetTrendingJobCategory($arrParams);
            
    		return $result;           
        }
        
        public function SetRegistration($name, $email, $pass, $rol = 0){
            $email = self::ValidationDataEmail($email);
            $isEmail = $this->model->IsEmail($email);
            
            if(!$isEmail){
                $name = self::ValidationDataName($name);
                $pass = self::ValidationDataPass($pass);
                
                $result = $this->model->GetRegistration($name, $email, $pass);
                
                return $result;
            }
            return false;
        }
        
        public function SetAuthorization($email, $pass){
            $email = self::ValidationDataEmail($email);
            $isEmail = $this->model->IsEmail($email);
            
            if($isEmail){
                $pass = self::ValidationDataPass($pass);
                
                $result = $this->model->GetAuthorization($email, $pass);
                
                return $result;
            }
            return false; 
        }
        
        //Валидация имени
        public function ValidationDataName($name){
            $name = htmlspecialchars($name);
            $name = urldecode($name);
            $name = trim($name);
            
            return $name;
        }
        
        //Валидация пароля
        public function ValidationDataPass($pass){
            $pass = trim($pass);
            $pass = md5($pass);
            
            return $pass;
        }
        
        //Валидация email
        public function ValidationDataEmail($email){
            $email = htmlspecialchars($email);
            $email = urldecode($email);
            $email = trim($email);
            
            return $email;
        }
        
        //Валидация файла с записью
        public function ValidationDataFile(){            
            //$ran = rand(0, 9999);
            $put = "../assets/images/blog/";
            if(isset($_FILES["file"]["name"]) && ($_FILES["file"]["name"] != "")){
                //$name = $_FILES["file"]["name"];
                //$namefile = $ran.$name;
                //$path = $put.$namefile;
                $namefile = $_FILES["file"]["name"];
                $path = $put.$namefile;
                move_uploaded_file($_FILES["file"]["tmp_name"], $path);
                
                return $namefile;
            }
            return false;
        }
        
        public function SetNameColumns($nameTable){
            $result = $this->model->GetNameColumns($nameTable);
            
            return $result; 
        }
        
        public function SetAllData($nameTable){
            $result = $this->model->GetAllData($nameTable);
            
            return $result; 
        }
        
        public function SetRowData($nameTable, $id){
            $result = $this->model->GetRowData($nameTable, $id);
            
            return $result; 
        }
        
        public function SetDeleteRow($nameTable, $id){
            $result = $this->model->GetDeleteRow($nameTable, $id);
            $this->model->GetAutoIncr($nameTable);
            
    		return $result;           
        }
        
        public function SetEditField($nameTable, $id, $field, $val){
            if($field == "password"){
                $val = self::ValidationDataPass($val);
            }
            $result = $this->model->GetEditField($nameTable, $id, $field, $val);
            
            if($result){
                return true;
            }
    		return false;           
        }
        
        //Добавление опции
        public function SetInsertOptions($name, $value){
            $result = $this->model->GetInsertOptions($name, $value);
            
            return $result;
        }
        

        public function SetInsertBlog($title, $text, $date){
            $img = self::ValidationDataFile();
            
            $result = $this->model->GetInsertBlog($title, $text, $img, $date);
            
            return $result;
        }
	}

?>