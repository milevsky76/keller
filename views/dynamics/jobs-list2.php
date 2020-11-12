<?php foreach($arrResult["companyPosition"] as $companyPositionItem) { ?>
<!-- Job List Start -->
<a href="" class="job-list">
    <div class="company-logo col-auto">
        <img src="../assets/images/companies/<?=$arrResult["companySingle"][0]["logo"];?>" alt="Company Logo">
    </div>
    <div class="salary-type col-auto order-sm-3">
        <span class="salary-range">$<?= $companyPositionItem["salary-min"]; ?> - $<?= $companyPositionItem["salary-max"]; ?></span>
        <span class="badge badge-<?php 
            if($companyPositionItem["working_day"] == "Full Time"){
                echo "success";
            } elseif($companyPositionItem["working_day"] == "Part Time"){
                echo "warning";
            } elseif($companyPositionItem["working_day"] == "Freelance"){
                echo "danger";
            } ; 
        ?>"><?= $companyPositionItem["working_day"]; ?></span>
    </div>
    <div class="content col">
        <h6 class="title"><?= $companyPositionItem["name"]; ?></h6>
        <ul class="meta">
            <li><strong class="text-primary"><?=$arrResult["companySingle"][0]["name"];?></strong></li>
            <li><i class="fa fa-map-marker"></i><?=$arrResult["companySingle"][0]["address"];?></li>
        </ul>
    </div>
</a>
<!-- Job List Start -->                
<? } ?>