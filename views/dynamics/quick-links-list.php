<?php foreach($arrResult["quickLinksList"] as $quickLinksItem) { ?>
<li><a href="<?= $quickLinksItem["link"]; ?>"><?= $quickLinksItem["text"]; ?></a></li>            
<? } ?>                        