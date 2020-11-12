<?php foreach($arrResult["menu"] as $menuLvl1) { ?>
<li>
    <a href="<?= $menuLvl1["link"]; ?>"><?= $menuLvl1["text"]; ?></a>
    
    <?php if(!empty($menuLvl1["child"])){ ?>
    <ul class="sub-menu">
        <?php foreach($menuLvl1["child"] as $menuLvl2) { ?>
        <li><a href="<?= $menuLvl1["link"]."/".$menuLvl2["link"]; ?>"><?= $menuLvl2["text"]; ?></a></li>
        <?php } ?>
    </ul>
    <?php } ?>
</li>
<? } ?>                        