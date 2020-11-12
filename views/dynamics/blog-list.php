<?php foreach($arrResult["blogList"] as $blogItem) { ?>
<!-- Blog Start -->
<div class="col">
    <div class="blog">
        <div class="media">
            <a href="<?= "blog/?id=".$blogItem["id"]; ?>"><img src="../assets/images/blog/<?= $blogItem["img"]; ?>" alt=""></a>
        </div>
        <div class="content">
            <h6 class="title"><a href="<?= "blog/?id=".$blogItem["id"]; ?>"><?= $blogItem["title"]; ?></a></h6>
            <ul class="meta">
                <li>Posted on <?= $blogItem["date"]; ?></li>
                <li><a href=""><?= $blogItem["quantity"]; ?> Comments</a></li>
            </ul>
            <div class="desc">
                <p><?= $blogItem["text"]; ?></p>
            </div>
            <a href="<?= "blog/?id=".$blogItem["id"]; ?>" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</div>
<!-- Blog End -->              
<? } ?>                        