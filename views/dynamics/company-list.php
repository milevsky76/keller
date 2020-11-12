<?php foreach($arrResult["companyList"] as $companyItem) { ?>
<!-- Company List Start -->
<div class="col">
    <a href="<?= $companyItem["link"]; ?>" class="feature-company">
        <span class="company-logo"><img src="../assets/images/companies/<?= $companyItem["logo"]; ?>" alt="company-1"></span>
        <h6 class="title"><?= $companyItem["name"]; ?></h6>
        <span class="open-job"><?= $companyItem["quantity"]; ?> open positions</span>
    </a>
</div>
<!-- Company List End -->   
<? } ?>                    