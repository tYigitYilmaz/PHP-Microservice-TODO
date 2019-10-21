<?php

namespace Service\Abst;


interface ITaskService {

    public function listAllTasks();
    public function selectTask($id);
    public function createTask();
    public function deleteTask();

}