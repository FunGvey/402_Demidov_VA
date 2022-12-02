<?php

namespace fungvey\guess_number\View;

<<<<<<< HEAD
use function cli\line;
use function cli\prompt;
=======
>>>>>>> student/Task04
use function fungvey\guess_number\Model\showGame;
use function fungvey\guess_number\Model\commandHandler;
use function fungvey\guess_number\Model\replayGame;

function MenuGame()
{
    echo PHP_EOL;
    echo "Menu:" . PHP_EOL;
    echo "--new" . PHP_EOL;
    echo "--list" . PHP_EOL;
    echo "--list winners" . PHP_EOL;
    echo "--list looser" . PHP_EOL;
    echo "--top" . PHP_EOL;
    echo "--replay id" . PHP_EOL;
    echo "--exit" . PHP_EOL;
    echo PHP_EOL;

<<<<<<< HEAD
    $getCommand = prompt("Enter key value: ");
=======
    $getCommand = \cli\prompt("Enter key value");
>>>>>>> student/Task04

    commandHandler($getCommand);
}

function saySalute()
{
    global $userName;

    echo "Enter your name, please" . PHP_EOL;

    $userName = readline();

    if (!empty($userName)) {
        echo 'Glad to see you, ' . $userName . '!' . PHP_EOL . 'Lets play the guess the number game'
            . ' I guess a number from 1 to ' . MAX_NUMBER .
            ' and you have to guess the number for ' . NUMBER_ATTEMPT . ' attempts' . PHP_EOL;

        showGame($userName);
    } else {
        saySalute();
    }
}

function endGame($hidden_num, $attempt = false)
{
    global $userName;

    if ($attempt) {
        echo 'Congratulations! You won the game for ' . $attempt . 'attempts' . PHP_EOL;
        replayGame($userName);
    } else {
        echo 'You lose. I thought of a number: ' . $hidden_num . PHP_EOL;
        replayGame($userName);
    }
}

function showGamesInfo($row)
{
    if (empty($row[6])) {
        $row[6] = "Not completed";
    }

<<<<<<< HEAD
    line(
=======
    \cli\line(
>>>>>>> student/Task04
        "ID: $row[0]| Date: $row[1] $row[2] | Name: $row[3] | Max number: "
        . "$row[4] | Generated number: $row[5] | Result: $row[6]"
    );
}

function showTurnInfo($row)
{
<<<<<<< HEAD
    line("----- Attempt number: $row[0] | Selected number: $row[1] |Computer response: $row[2]");
=======
    \cli\line("----- Attempt number: $row[0] | Selected number: $row[1] |Computer response: $row[2]");
>>>>>>> student/Task04
}

function showGamesTop($row)
{
<<<<<<< HEAD
    line(
=======
    \cli\line(
>>>>>>> student/Task04
        "Name: $row[0] | Number of wins: $row[1] | Number of losses: $row[2]"
    );
}

function exitElseMenu()
{
    echo PHP_EOL . "(--exit - Exit | --menu - Menu)" . PHP_EOL;

    $command = readline();

    if ($command === '--exit') {
        exit();
    } elseif ($command === '--menu') {
        MenuGame();
    } else {
        exitElseMenu();
    }
}
