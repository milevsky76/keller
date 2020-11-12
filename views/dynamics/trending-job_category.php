<?php foreach($arrResult["trendingJobCategory"] as $trendingJobCategory) { ?>
<li><a href="<?= $trendingJobCategory["link"]; ?>"><?= $trendingJobCategory["name"]; ?></a></li>            
<? } ?>                        