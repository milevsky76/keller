<form method="POST" autocomplete="on" enctype="multipart/form-data">
    <label for="title">Заголовок</label> <br />
    <input id="title" type="text" name="title" value="" /><br />
    
    <label for="text">Текст</label> <br />
    <input id="text" type="text" name="text" value="" /><br />
    
    <label for="file">Картинка</label> <br />
    <input id="file" name="file" type="file" accept=".png, .jpg, .jpeg" /> <br />
    
    <input id="date" type="hidden" name="date" value="<?= date("Y-m-d"); ?>" />
    
    <input type="submit" name="add" value="Добавить" />
</form>