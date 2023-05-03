<?php

namespace Service
{

    use Entity\Todolist;
    use Repository\TodolistReposiroty;

    interface TodolistService
    {

        function showTodolist(): void;

        function addTodolist(string $todo): void;

        function removeTodolist(int $number): void;

    }

    class TodolistServiceImpl implements TodolistService
    {

        private TodolistReposiroty $todolistRepository;

        public function __construct(TodolistReposiroty $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        function showTodolist(): void
        {
            echo "TODOLIST" . PHP_EOL;
        
            $todolist = $this->todolistRepository->findAll();

            foreach( $todolist as $number => $value ) {
                echo "$number. " . $value->getTodo() . PHP_EOL;
            }
        }

        function addTodolist(string $todo): void
        {
            $results = new Todolist($todo);
            $this->todolistRepository->save($results);

            echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
        }

        function removeTodolist(int $number): void
        {
            // echo "masuk";
            if ($this->todolistRepository->remove($number)) {
                echo "SUKSES MENGHAPUS TODOLIST" . PHP_EOL;
            } else {
                echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
            }
        }

    }

}