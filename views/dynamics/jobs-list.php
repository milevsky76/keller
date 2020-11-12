<?php foreach($arrResult["jobList"] as $jobItem) { ?>
<!-- Job List Start -->
<a href="" class="job-list">
    <div class="company-logo col-auto">
        <img src="../assets/images/companies/<?= $jobItem["company_logo"]; ?>" alt="Company Logo">
    </div>
    <div class="salary-type col-auto order-sm-3">
        <span class="salary-range">$<?= $jobItem["salary-min"]; ?> - $<?= $jobItem["salary-max"]; ?></span>
        <span class="badge badge-<?php 
            if($jobItem["working_day"] == "Full Time"){
                echo "success";
            } elseif($jobItem["working_day"] == "Part Time"){
                echo "warning";
            } elseif($jobItem["working_day"] == "Freelance"){
                echo "danger";
            } ; 
        ?>"><?= $jobItem["working_day"]; ?></span>
    </div>
    <div class="content col">
        <h6 class="title"><?= $jobItem["position"]; ?></h6>
        <ul class="meta">
            <li><strong class="text-primary"><?= $jobItem["company_name"]; ?></strong></li>
            <li><i class="fa fa-map-marker"></i> <?= $jobItem["company_address"]; ?></li>
        </ul>
    </div>
</a>
<!-- Job List Start -->                
<? } ?>