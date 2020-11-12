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
            <div class="row mb-n5">

                <div class="col-lg-8 col-12 mb-5 pr-lg-5">

                    <!-- Blog Wrapper Start -->
                    <div class="blog-wrap row">
                    
                        <!-- Blog Single Start -->
                        <div class="col-12">
                            <div class="blog blog-single">
                                <div class="media">
                                    <img src="../assets/images/blog/<?=$arrResult["blogSingle"][0]["img"]; ?>" alt="">
                                </div>
                                <div class="content">
                                    <h6 class="title"><?= $arrResult["blogSingle"][0]["title"]; ?></h6>
                                    <ul class="meta">
                                        <li>Posted on <?= $arrResult["blogSingle"][0]["date"]; ?></li>
                                        <li><a href="#"><?= $arrResult["blogSingle"][0]["quantity"]; ?> Comments</a></li>
                                    </ul>
                                    <div class="desc">
                                        <p><?= $arrResult["blogSingle"][0]["text"]; ?></p>
                                    </div>
                                    <div class="foot row justify-content-between align-items-start mb-n2">
                                        <div class="blog-tags col-auto mb-2">
                                            <ul>
                                                <li><strong>Tags:</strong></li>
                                                <li><a href="#">tips</a></li>
                                                <li><a href="#">job</a></li>
                                                <li><a href="#">questions</a></li>
                                                <li><a href="#">interview</a></li>
                                            </ul>
                                        </div>
                                        <div class="blog-share col-auto mb-2">
                                            <ul>
                                                <li><strong>Share:</strong></li>
                                                <?php include "statics/social_li.php" ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Single End -->
                    </div>
                    <!-- Blog Wrapper End -->

                </div>

                <!-- Blog Sidebar Wrap Start -->
                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        <!-- Sidebar (Search) Start -->
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Search Keywords</h6>
                                <form action="#">
                                    <input type="text" placeholder="Search">
                                </form>
                            </div>
                        </div>
                        <!-- Sidebar (Search) End -->

                        <!-- Sidebar (Recent Posts) Start -->
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Recent Posts</h6>
                                <ul class="sidebar-post">
                                    <?php include "dynamics/sidebar-post.php" ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar (Recent Posts) End -->
                    </div>
                </div>
                <!-- Blog Sidebar Wrap End -->

            </div>

        </div>
    </div>
    <!-- Blog Section End -->