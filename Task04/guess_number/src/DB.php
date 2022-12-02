<?php

namespace fungvey\guess_number\DB;

<<<<<<< HEAD
use \RedBeanPHP\R as R;
=======
use SQLite3;
>>>>>>> student/Task04

use function fungvey\guess_number\View\showGamesInfo;
use function fungvey\guess_number\View\showTurnInfo;
use function fungvey\guess_number\View\showGamesTop;

function createDB()
{
<<<<<<< HEAD
    R::setup('sqlite:GN.db');

    $gamesTable = "CREATE TABLE gamesInfo(
=======
    $dataBase = new \SQLite3('GN.db');

    $gamesInfoTable = "CREATE TABLE gamesInfo(
>>>>>>> student/Task04
        idGame INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
        gameData DATE,
        gameTime TIME,
        playerName TEXT,
        maxNumber INTEGER,
		generatedNumber INTEGER,
		gameOutcome TEXT
	 )";
<<<<<<< HEAD
     R::exec($gamesTable);


    $attemptsInfo = "CREATE TABLE attempts(
=======
    $dataBase->exec($gamesInfoTable);


    $attemptsTable = "CREATE TABLE attempts(
>>>>>>> student/Task04
		 idGame INTEGER,
		 numberAttempts INTEGER,
		 proposedNumber INTEGER,
		 computerResponds TEXT
	 )";
<<<<<<< HEAD
     R::exec($attemptsInfo);
=======
    $dataBase->exec($attemptsTable);
>>>>>>> student/Task04
}

function openDatabase()
{
    if (!file_exists("GN.db")) {
        createDB();
    } else {
<<<<<<< HEAD
        R::setup('sqlite:GN.db');
=======
        $dataBase = new \SQLite3('GN.db');
>>>>>>> student/Task04
    }
}

function insertNewGame($userName, $hidden_num, $MAX_NUM)
{
<<<<<<< HEAD
    openDatabase();
=======
    $dataBase = new \SQLite3('GN.db');
>>>>>>> student/Task04

    date_default_timezone_set("Europe/Moscow");

    $gameData = date("d") . "." . date("m") . "." . date("Y");
    $gameTime = date("H") . ":" . date("i") . ":" . date("s");

<<<<<<< HEAD
    R::exec("INSERT INTO gamesInfo(
=======
    $query = "INSERT INTO gamesInfo(
>>>>>>> student/Task04
		gameData,
		gameTime,
		playerName,
		maxNumber,
		generatedNumber
   ) VALUES(
		'$gameData',
<<<<<<< HEAD
        '$gameTime',
		'$userName',
		'$MAX_NUM',
		'$hidden_num'
   )");

    return R::getRow("SELECT idGame FROM gamesInfo ORDER BY idGame DESC LIMIT 1");
=======
      '$gameTime',
		'$userName',
		'$MAX_NUM',
		'$hidden_num'
   )";

    $dataBase->exec($query);

    $query = "SELECT idGame FROM gamesInfo ORDER BY idGame DESC LIMIT 1";

    return $dataBase->querySingle($query);
>>>>>>> student/Task04
}

function addAttemptInDB($idGame, $proposedNumber, $computerResponds, $numberAttempts)
{
<<<<<<< HEAD
    openDatabase();

    R::exec("INSERT INTO attempts(
=======
    $dataBase = new \SQLite3('GN.db');

    $query = "INSERT INTO attempts(
>>>>>>> student/Task04
	    idGame,
	    numberAttempts,
		proposedNumber,
		computerResponds
    ) VALUES(
        '$idGame',
        '$numberAttempts',
        '$proposedNumber',
        '$computerResponds'
<<<<<<< HEAD
    )");
=======
    )";

    $dataBase->exec($query);
>>>>>>> student/Task04
}

function updateInfoGame($idGame, $gameOutcome)
{
<<<<<<< HEAD
    openDatabase();
    R::exec("UPDATE gamesInfo SET gameOutcome = '$gameOutcome' WHERE idGame = '$idGame'");
=======
    $dataBase = new \SQLite3('GN.db');

    $query = "UPDATE gamesInfo SET gameOutcome = '$gameOutcome' WHERE idGame = '$idGame'";

    $dataBase->exec($query);
>>>>>>> student/Task04
}

function outputListGame($gameOutcome = false)
{
<<<<<<< HEAD
    openDatabase();

    if ($gameOutcome === "win") {
        $result = R::getAll("SELECT * FROM gamesInfo WHERE gameOutcome = '$gameOutcome'");
    } elseif ($gameOutcome === "loss") {
        $result = R::getAll("SELECT * FROM gamesInfo WHERE gameOutcome = '$gameOutcome'");
    } else {
        $result = R::getAll("SELECT * FROM gamesInfo");
=======
    $dataBase = new \SQLite3('GN.db');

    if ($gameOutcome === "win") {
        $result = $dataBase->query("SELECT * FROM gamesInfo WHERE gameOutcome = '$gameOutcome'");
    } elseif ($gameOutcome === "loss") {
        $result = $dataBase->query("SELECT * FROM gamesInfo WHERE gameOutcome = '$gameOutcome'");
    } else {
        $result = $dataBase->query("SELECT * FROM gamesInfo");
>>>>>>> student/Task04
    }

    while ($row = $result->fetchArray()) {
        showGamesInfo($row);

<<<<<<< HEAD
        $gameTurns = R::getAll("SELECT numberAttempts,
            proposedNumber, 
            computerResponds
            FROM attempts 
            WHERE idGame='$row[0]'");
=======
        $query = "SELECT
            numberAttempts,
            proposedNumber, 
            computerResponds
            FROM attempts 
            WHERE idGame='$row[0]'
            ";

        $gameTurns = $dataBase->query($query);
>>>>>>> student/Task04
        while ($gameTurnsRow = $gameTurns->fetchArray()) {
            showTurnInfo($gameTurnsRow);
        }
    }
}

function showTopList()
{
<<<<<<< HEAD
    openDatabase();

    $result = R::getAll("SELECT playerName, 
=======
    $dataBase = new \SQLite3('GN.db');

    $result = $dataBase->query("SELECT playerName, 
>>>>>>> student/Task04
    (SELECT COUNT(*) FROM gamesInfo as b WHERE a.playerName = b.playerName AND gameOutcome = 'win') as countWin,
    (SELECT COUNT(*) FROM gamesInfo as c WHERE a.playerName = c.playerName AND gameOutcome = 'loss') 
    as countLoss FROM gamesInfo as a
    GROUP BY playerName ORDER BY countWin DESC, countLoss");

    while ($row = $result->fetchArray()) {
        showGamesTop($row);
    }
}

function checkGameId($id)
{
<<<<<<< HEAD
    openDatabase();
    $query = R::getCell("SELECT playerName FROM gamesInfo WHERE idGame=" . [$id]);

    if ($query) {
        return $query;
=======
    $dataBase = new \SQLite3('GN.db');

    $query = "SELECT playerName FROM gamesInfo WHERE idGame=" . $id;

    if ($dataBase->querySingle($query)) {
        return $dataBase->querySingle($query);
>>>>>>> student/Task04
    }

    return false;
}
