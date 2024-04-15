<?php

namespace Repository {

    use Entity\TodoList;

    interface TodolistRepository {

        function save(TodoList $todoList): void;

        function remove(int $number): bool;

        function findAll(): array;
    }
    
    class TodolistRepositoryImpl implements TodolistRepository {

        public array $todoList = array();

        function save(Todolist $todoList): void
        {
            $number = sizeof($this->todoList) + 1;
        
            $this->todoList[$number] = $todoList;
        }

        function remove(int $number): bool
        {
            if ($number > sizeof($this->todoList)) {
                return false;
            }
        
            for ($i = $number; $i < sizeof($this->todoList); $i++) {
                $this->todoList[$i] = $this->todoList[$i + 1];
            }
        
            unset($this->todoList[sizeof($this->todoList)]);
        
            return true; 
        }

        function findAll(): array
        {
            return $this->todoList;
        }
    }
}