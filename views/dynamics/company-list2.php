<?php foreach($arrResult["companyList"] as $companyItem) { ?>
<!-- Company List Start -->
                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                            <a href="<?= "?id=".$companyItem["id"]; ?>" class="company-list">
                                <span class="company-logo"><img src="../assets/images/companies/<?=$companyItem["logo"];?>" alt="logo"></span>
                                <h6 class="title"><?=$companyItem["name"];?></h6>
                                <span class="open-job"><?=$companyItem["quantity"];?> open positions</span>
                                <span class="location"><i class="fa fa-map-o"></i><?=$companyItem["location"];?></span>
                            </a>
                        </div>
                        <!-- Company List End -->
<? } ?>                    