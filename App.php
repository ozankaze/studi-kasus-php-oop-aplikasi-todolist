<?php

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

require __DIR__ . "/Entity/Todolist.php";
require __DIR__ . "/Helper/InputHelper.php";
require __DIR__ . "/Repository/TodolistRepository.php";
require __DIR__ . "/Service/TodolistService.php";
require __DIR__ . "/View/TodolistView.php";

echo "Aplikasi Todolist" . PHP_EOL;

$todolistRepository = new TodolistRepositoryImpl();
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolistView = new TodolistView($todolistService);

$todolistView->showTodolist();