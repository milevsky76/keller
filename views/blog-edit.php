<form method="POST" autocomplete="on" enctype="multipart/form-data">
    <input id="id" type="hidden" name="id" value="<?=$arrData[$_GET["edit"]]["id"];?>" />
    
    <label for="title">Заголовок</label> <br />
    <textarea cols="50" rows="4" id="title" name="title"><?=$arrData[$_GET["edit"]]["title"];?></textarea><br />
    
    <label for="text">Текст</label> <br />
    <textarea cols="50" rows="8" id="text" name="text"><?=$arrData[$_GET["edit"]]["text"];?></textarea><br />
    
    <label for="file">Картинка</label> <br />
    <input id="file" name="file" type="file" accept=".png, .jpg, .jpeg" /> <br />
    <img style="width: 200; height: auto;" src="../assets/images/blog/<?=$arrData[$_GET["edit"]]["img"];?>" /><br />
    
    <input type="submit" name="save-blog" value="Сохранить" />
</form> 