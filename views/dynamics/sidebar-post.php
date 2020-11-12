<?php foreach($arrResult["recentPosts"] as $recentPosts) { ?>
<li>
                                        <a href="?id=<?=$recentPosts["id"];?>" class="image"><img src="../assets/images/blog/<?=$recentPosts["img"];?>" alt=""></a>
                                        <a href="?id=<?=$recentPosts["id"];?>" class="title"><?=$recentPosts["title"];?></a>
                                    </li>
<? } ?>   