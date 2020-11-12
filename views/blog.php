<!-- Page Heading Section Start -->
    <div class="page-heading-section section bg-parallax" data-bg-image="../assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="page-heading-content text-center">
                <h3 class="title">Blog</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$arrResult["menu"][0]["link"];?>">Home</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Page Heading Section End -->

    <!-- Blog Section Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Blog Wrapper Start -->
            <div class="blog-wrap row">
                <?php include "../views/dynamics/blog-list2.php" ?>
            </div>
            <!-- Blog Wrapper End -->

            <!-- Pagination Start -->
            <ul class="pagination pagination-center mt-5">
                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
            <!-- Pagination End -->

        </div>
    </div>
    <!-- Blog Section End -->