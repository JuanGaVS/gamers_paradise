<?php

require_once('dal/GameContestantDAL.php');
require_once('dal/ConsoleDAL.php');



switch ($_POST['method']) {
    case 'saveContestantGame':
        saveContestantGame();
        break;
    case 'reloadConsoles':
        reloadConsoles();
        break;
}//Fin de switch.

function saveContestantGame() {
    $gameContestantDAL = new GameContestantDAL();
    $gameContestantDAL->saveContestantGame($_POST['uid'], $_POST['game'], $_POST['console']);
}

function reloadConsoles() {
    $consoleDAL = new ConsoleDAL();

    
    
    $data = $consoleDAL->getConsolesForGame($_POST['gid']);
    
    
    echo $data;
}

?>