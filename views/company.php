    <!-- Page Heading Section Start -->
    <div class="page-heading-section section bg-parallax" data-bg-image="../assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="page-heading-content text-center">
                <h3 class="title">Browse Companies</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$arrResult["menu"][0]["link"];?>">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Page Heading Section End -->

    <!-- Company List Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n5">

                <div class="col-lg-8 col-12 mb-5 pr-lg-5">

                    <!-- Company List Wrap Start -->
                    <div class="company-list-wrap row">
                        <?php include "../views/dynamics/company-list2.php" ?>
                    </div>
                    <!-- Company List Wrap Start -->

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

                <!-- Company Sidebar Wrap Start -->
                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        <!-- Sidebar (Search) Start -->
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Search Company</h6>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12 mb-3"><input type="text" placeholder="Keyword"></div>
                                        <div class="col-12 mb-3">
                                            <label>Category</label>
                                            <select>
                                                <?php include "dynamics/job-search_category.php" ?>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label>Location</label>
                                            <input type="text" placeholder="Location">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label>Company Sizes</label>
                                            <select>
                                                <option>All Company Size</option>
                                                <option>&lt; 10 employees</option>
                                                <option>10 ~ 50 employees</option>
                                                <option>50 ~ 200 employees</option>
                                                <option>200 ~ 500 employees</option>
                                                <option>500 ~ 2000 employees</option>
                                                <option>&gt; 2000 employees</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input class="btn btn-primary w-100" type="submit" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Sidebar (Search) End -->

                        <!-- Sidebar (Search) Start -->
                        <div class="sidebar-widget">
                            <div class="inner">
                                <?php include "statics/sidebar-widget.php" ?>
                            </div>
                        </div>
                        <!-- Sidebar (Search) End -->
                    </div>
                </div>
                <!-- Company Sidebar Wrap End -->

            </div>
        </div>
    </div>
    <!-- Company List End -->