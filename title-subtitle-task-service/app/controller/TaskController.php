<?php
namespace App\Controller;

use Service\Abst\ITaskService;


class TaskController
{
    private $iTaskService;

    public function __construct(ITaskService $iTaskService)
    {
        $this->iTaskService = $iTaskService;
    }

    public function createTask() {
        $this->iTaskService->createTask();
    }

    public function listAllTasks() {
        $this->iTaskService->listAllTasks();
    }

    public function selectTask($id) {
        $this->iTaskService->selectTask($id);
    }

    public function writeNote() {
        $this->iTaskService->writeNote();
    }

    public function deleteTask() {
        $this->iTaskService->deleteTask();
    }
}