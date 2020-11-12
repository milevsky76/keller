<form method="POST">
    <input id="id" type="hidden" name="id" value="<?=$arrData[$_GET["edit"]]["id"];?>" />
    
    <label for="username">username</label> <br />
    <input id="username" name="username" value="<?=$arrData[$_GET["edit"]]["username"];?>" /><br />
    
    <label for="email">email</label> <br />
    <input id="email" name="email" value="<?=$arrData[$_GET["edit"]]["email"];?>" /><br />
    
    <label for="password">password</label> <br />
    <input id="password" name="password" value="<?=$arrData[$_GET["edit"]]["password"];?>" /><br />

    <label for="role">role</label> <br />
    <input id="role" name="role" value="<?=$arrData[$_GET["edit"]]["role"];?>" /><br />
    
    <input type="submit" name="save-user" value="Сохранить" />
</form> 