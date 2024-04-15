<?php

require_once __DIR__ ."\..\Service\TodolistService.php";
require_once __DIR__ ."\..\Repository\TodolistRepository.php";
require_once __DIR__ ."\..\Entity\Todolist.php";

use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;
use Entity\TodoList;

function testShowTodolist(): void {

    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository -> todoList[1] = new TodoList("Belajar PHP");
    $todolistRepository -> todoList[2] = new TodoList("Belajar PHP OOP");
    $todolistRepository -> todoList[3] = new TodoList("Belajar PHP Database");

    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
}

// testShowTodolist();
function testAddTodolist(): void {

    $todolistRepository = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->addTodolist("Belajar PHP");
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->addTodolist("Belajar PHP Database");

    $todolistService->showTodolist();
}

// testAddTodolist();

function testRemoveTodolist(): void {

    $todolistRepository = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Belajar PHP");
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->addTodolist("Belajar PHP Database");

    $todolistService->removeTodolist(3);
    $todolistService->showTodolist();

    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();

    $todolistService->removeTodolist(4);
    $todolistService->showTodolist();
}

testRemoveTodolist();