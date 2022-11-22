<?php
namespace fungvey\guess_number\Controller;
use function fungvey\guess_number\View\showGame;

function startGame(){
   echo "Game started" .PHP_EOL;
   showGame();
}
?>