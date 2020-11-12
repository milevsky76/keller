<table>
    <tr>
    <?php foreach($nameColumns as $nameColumn){ ?>
        <th><?=$nameColumn;?></th>
    <? } ?>
        <th></th>
        <th></th>
    </tr>

<?php foreach($arrData as $key => $arrDataRow){ ?>
    <tr>
        <?php foreach($arrDataRow as $key2 => $value){ 
            if($key2 == "img"){ ?>
                <td><img style="width: 200; height: auto;" src="../assets/images/blog/<?=$value;?>" /></td>   
                <?php } else{ ?>
                <td><?=$value;?></td>
            <? }
        } ?>
        
        <td>
            <a href="?act=<?=$nameTable;?>&edit=<?=$key;?>">Редактировать</a>
        </td>
        
        <td><a href="?act=<?=$nameTable;?>&delete=<?=$arrDataRow["id"];?>">Удалить</a></td>
    </tr>
<? } ?>
</table>