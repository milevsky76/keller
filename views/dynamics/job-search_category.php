<?php foreach($arrResult["jobCategory"] as $jobCategory) { ?>
<option value="<?= $jobCategory["id"]; ?>"><?= $jobCategory["name"]; ?></option>
<? } ?>                        