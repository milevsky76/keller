<!-- Page Heading Section Start -->
    <div class="page-heading-section section bg-parallax" data-bg-image="../assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="page-heading-content text-center">
                <h3 class="title"><?=$arrResult["companySingle"][0]["name"];?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$arrResult["menu"][0]["link"];?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=$arrResult["menu"][1]["link"];?>">Companies</a></li>
                    <li class="breadcrumb-item active"><?=$arrResult["companySingle"][0]["name"];?></li>
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

                    <!-- Company Details Start -->
                    <div class="company-details">
                        <h5 class="mb-3">About <?=$arrResult["companySingle"][0]["name"];?></h5>
                        <p><?=$arrResult["companySingle"][0]["about"];?></p>
                    </div>
                    <!-- Company Details Start -->

                    <!-- Job List Wrap Start -->
                    <div class="job-list-wrap mt-5">
                        <?php include "dynamics/jobs-list2.php" ?>
                    </div>
                    <!-- Job List Wrap Start -->
                </div>

                <!-- Company Sidebar Wrap Start -->
                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        <!-- Sidebar (Company) Start -->
                        <div class="sidebar-widget">
                            <div class="inner">
                                <div class="sidebar-company">
                                    <span class="company-logo"><img src="../assets/images/companies/<?=$arrResult["companySingle"][0]["logo"];?>" alt="company-1"></span>
                                    <h6 class="title"><?=$arrResult["companySingle"][0]["name"];?></h6>
                                    <ul>
                                        <li><strong>Website:</strong> <a href="#"><?=$arrResult["companySingle"][0]["site"];?></a></li>
                                        <li><strong>Location:</strong> <?=$arrResult["companySingle"][0]["location"];?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar (Company) End -->

                        <!-- Sidebar (Company Location) Start -->
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Location on Map</h6>
                                <img src="../assets/images/others/maps2.png" />
                                <!-- <div class="company-location-map google-map" id="company-location-map" data-lat="-37.8172835" data-long="144.9560768" data-zoom="12">
                                    <span class="sr-only">Job Location Map</span>
                                </div> -->
                            </div>
                        </div>
                        <!-- Sidebar (Company Location) End -->
                    </div>
                </div>
                <!-- Company Sidebar Wrap End -->

            </div>
        </div>
    </div>
    <!-- Company List End -->