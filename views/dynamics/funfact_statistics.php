<?php foreach($arrResult["statistics"] as $statistics) { ?>
<!-- Funfact Start -->
<div class="funfact col-md-3 col-sm-6 col-12">
    <span class="counter"><?= $statistics["value"]; ?></span>
    <span class="title"><?= $statistics["name"]; ?></span>
</div>
<!-- Funfact Start -->            
<? } ?>                        