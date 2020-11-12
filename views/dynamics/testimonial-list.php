<?php foreach($arrResult["testimonialList"] as $testimonialItem) { ?>
<!-- Testimonial Start -->
<div class="col">
    <div class="testimonial text-center text-white">
        <p><?= $testimonialItem["text"]; ?></p>
        <img src="../assets/images/authors/<?= $testimonialItem["logo"]; ?>" alt="">
        <h6 class="name"><?= $testimonialItem["name"]; ?></h6>
        <span class="title"><?= $testimonialItem["position"]; ?></span>
    </div>
</div>
<!-- Testimonial End -->
<? } ?>                        