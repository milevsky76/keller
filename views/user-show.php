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
        <?php foreach($arrDataRow as $value){ ?>
        <td><?=$value;?></td>
        <? } ?>
        
        <td>
            <a href="?act=<?=$nameTable;?>&edit=<?=$key;?>">Редактировать</a>
        </td>
        
        <td>
        <?if($arrDataRow["role"] != 1){ ?>
            <a href="?act=<?=$nameTable;?>&delete=<?=$arrDataRow["id"];?>">Удалить</a>
        <? } ?>
        </td>
    </tr>
<? } ?>
</table>