<?php

namespace View
{

    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView
    {

        private TodolistService $todolistService;

        function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist(): void
        {            

            while (true) {
            
                $this->todolistService->showTodolist();
        
                echo "MENU" . PHP_EOL;
                echo "1. Tambah todo" . PHP_EOL;
                echo "2. Hapus todo" . PHP_EOL;
                echo "x. Keluar todo" . PHP_EOL;
        
                $pilihan = InputHelper::input("Pilihan: ");
        
                if ($pilihan == "1") {
                    $this->addTodolist();
                } elseif ($pilihan == "2") {
                    $this->removeTodolist();
                } elseif ($pilihan == "x") {
                    break;
                } else {
                    echo "Data tidak di temukan";
                }
            }

            echo "Sampai Jumpa Lagi" . PHP_EOL;

        }

        function addTodolist(): void
        {

            echo "MENAMBAH TODOLIST" . PHP_EOL;

            $todo = InputHelper::input("Todo (x untuk keluar) : ");
        
            if ($todo == "x"){
                echo "Batal menambah todo" . PHP_EOL;
            } else {
                $this->todolistService->addTodolist($todo);
            }

        }

        function removeTodolist(): void
        {

            echo "REMOVE TOTOLIST" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor (x untuk membatalkan)");
        
            if ($pilihan == "x") {
                echo "Batal menghapus";
            } else {
                $this->todolistService->removeTodolist($pilihan);
            }

        }

    }

}