<?php

namespace Repository
{

    use Entity\Todolist;

    interface TodolistReposiroty
    {

        function save(Todolist $todolist): void;
    
        function remove(int $number): bool;
    
        function findAll(): array;
    
    }

    class TodolistRepositoryImpl implements TodolistReposiroty
    {

        public array $todolist = array();

        function save(Todolist $todolist): void
        {
            $numbers = sizeof($this->todolist) + 1;
            $this->todolist[$numbers] = $todolist;
        }

        function remove(int $number): bool
        {
            if ($number > count($this->todolist)) {
                return false;
            }
        
            for ($i = $number; $i < count($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i+1];
            }
        
            unset($this->todolist[count($this->todolist)]);
        
            return true;
        }

        function findAll(): array
        {
            return $this->todolist;
        }

    }
    
}

// untuk mengolah data