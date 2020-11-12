<style>
    table {
        border-collapse: collapse;
    }
    th {
        padding: 10px; 
    }
    td {
        padding: 0px 10px;
        text-align: center;
    }
    table, th, td{
        border: 1px solid #000;
    }
</style>

<div id="main">
    <div id="menu">
        <a href="?act=options">Редактирование опций</a> /
        <a href="?act=blog">Редактирование блога</a> /
        <a href="?act=users">Редактирование пользователей</a> /
        <a href="?act=logout">Выход</a>
    </div>
    
    <div id="content">
        <?php include "admin-".$arrResult["ACT"].".php"; ?>
    </div>
</div>
