<form method="POST">
    <input id="id" type="hidden" name="id" value="<?=$arrData[$_GET["edit"]]["id"];?>" />
    
    <label for="name">name</label> <br />
    <input id="name" name="name" value="<?=$arrData[$_GET["edit"]]["name"];?>" /><br />
    
    <label for="value">value</label> <br />
    <input id="value" name="value" value="<?=$arrData[$_GET["edit"]]["value"];?>" /><br />
    
    <input type="submit" name="save-optc" value="Сохранить" />
</form> 