<?php

	class CView {
        
        public function __construct(){
            
        }
        
        public function RenderAction($page, $title, $arrResult = []){
            if($page != "admin"){
                include "views/header.php";
            
                switch ($page) {
                    case "main":
                        self::ViewMainPage($arrResult);
                        break;
                    case "contact":
                        self::ViewContactPage($arrResult);
                        break;
                    case "blog":
                        self::ViewBlogPage($arrResult);
                        break;
                    case "blogsingle":
                        self::ViewBlogSinglePage($arrResult);
                        break;
                    case "company":
                        self::ViewCompanyPage($arrResult);
                        break;
                    case "companysingle":
                        self::ViewCompanySinglePage($arrResult);
                        break;
                }
    
                include "views/footer.php";
            } else{
                include "views/admin.php";
            }
            
        }
        
		public function ViewMainPage($arrResult = []) {            
            include "views/offcanvas.php";
            
            include "views/loginSignupModal.php";
            
            include "views/slider-section.php";
            
            include "views/job-search-section.php";
            
            include "views/jobs.php";
            
            include "views/funfact.php";
            
            include "views/featured.php";
            
            include "views/testimonial.php";            
            
            include "views/blog-m.php";
		}
        
        public function ViewContactPage($arrResult = []){            
            include "views/contact.php";
        }
        
        public function ViewBlogPage($arrResult = []){
            include "views/blog.php";
            
        }
        
        public function ViewBlogSinglePage($arrResult = []){
            include "views/blog-single.php";
            
        }
        
        public function ViewCompanyPage($arrResult = []){
            include "views/company.php";
            
        }
        
        public function ViewCompanySinglePage($arrResult = []){
            include "views/company-single.php";
            
        }
	}

?>