<?php require_once('../Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

mysql_select_db($database_localhost, $localhost);
$query_rs_juegos = "SELECT game_id, name, trailer_url, `description` FROM tb_game";
$rs_juegos = mysql_query($query_rs_juegos, $localhost) or die(mysql_error());
$row_rs_juegos = mysql_fetch_assoc($rs_juegos);
$totalRows_rs_juegos = mysql_num_rows($rs_juegos);

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>



        <table border="1">
            <tr>
                <td width="107">Nombre</td>
                <td width="252">Trailer</td>
                <td width="198">Imágenes</td>
                <td width="50">Acciones</td>
            </tr>
<?php do { ?>
                <tr>
                    <td><a href="game-detail.php?game_id=<?php echo $row_rs_juegos['game_id']; ?></a>"><?php echo $row_rs_juegos['name']; ?></a></td>
                    <td><iframe type="text/html" width="250px" height="100px" src="<?php echo $row_rs_juegos['trailer_url']; ?>" frameborder="0"></iframe> </td>
                    <?php
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' . 'dal/GameDAL.php';
                    $gDAL = new GameDAL();
                    $game = $gDAL->getGame($row_rs_juegos['game_id']);
                    if ($game != null) {
                        $pictures = $game->getPictures();
                        
                    }
                    ?>
                    <td>   
                        <table width="200px">
                            <tbody>
                                <?php
                                foreach ($pictures as $picture) {
                                    ?>
                                    <tr>
                                        <th>
                                            <img src="<?php echo '../' . $picture ?>" width="100px" height="50px"></img>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                    <td>
                    <a href="game-edit.php?game_id=<?php echo $row_rs_juegos['game_id']; ?></a>">Editar</a></td>
                </tr>
<?php } while ($row_rs_juegos = mysql_fetch_assoc($rs_juegos)); ?>
        </table>
        <p><a href="#">Agregar Juego</a></p>
        <p><a href="#">Borrar todo y cargar JSON</a></p>
    </body>
</html>
<?php
mysql_free_result($rs_juegos);
?>
