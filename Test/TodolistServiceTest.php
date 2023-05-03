<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void
{

    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[] = new Todolist("Belajar PHP");
    $todolistRepository->todolist[] = new Todolist("Belajar PHP Todolist");
    $todolistRepository->todolist[] = new Todolist("Belajar PHP Database");

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->showTodolist();
    
}

function testAddTodolist(): void
{

    $todolistRepository = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Belajar PHP");
    $todolistService->addTodolist("Belajar Database");
    $todolistService->addTodolist("Belajar MySQL");

    $todolistService->showTodolist();
    
}

function testRemoveTodoList(): void
{

    $todolistRepository = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Belajar PHP");
    $todolistService->addTodolist("Belajar Database");
    $todolistService->addTodolist("Belajar MySQL");
    $todolistService->addTodolist("Belajar Javascript");

    $todolistService->showTodolist();

    $todolistService->removeTodolist(5);
    $todolistService->showTodolist();

}

// testShowTodolist();
// testAddTodolist();
testRemoveTodoList();