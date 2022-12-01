<?php

namespace fungvey\guess_number\Controller;

use function fungvey\guess_number\Model\setting;
use function fungvey\guess_number\View\MenuGame;
use function fungvey\guess_number\DB\openDatabase;

function startGame()
{
    setting();
    openDatabase();
    MenuGame();
}
