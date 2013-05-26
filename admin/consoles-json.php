<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/gamers_paradise/'.'dal/ConsoleDAL.php';

if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $contents = $_POST['json_contents'];

    $cDal = new ConsoleDAL();

    $result = $cDal->importJson($contents);

    if ($result == 0) {
        $cDal->truncateConsoles();
        $res = $cDal->importJson($contents);
        if ($res == 1) {
            //HANDLE ERROR
        }
        else{
            header('Location: consoles.php');
        }
    } else {
        //HANDLE ERROR
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Importar Consolas</title>
    </head>

    <body>
        <h2>Importar Consolas desde JSON</h2>
        <form id="form1" name="form1" method="post" action="#">
            <label>Contenido
                <textarea name="json_contents" id="json_contents" cols="45" rows="5"></textarea>
            </label>
            <input type="submit" name="btn_importar" id="btn_importar" value="Importar" />
        </form>
    </body>
</html>