<?php

namespace Service\Concrete;


use Core\Model\Response;
use Data\Repository\Abst\ITaskRepo;
use Illuminate\Support\Carbon;
use Service\Abst\ITaskService;

class TaskService implements ITaskService
{
    private $iTaskRepo;

    public function __construct(ITaskRepo $iTaskRepo)
    {
        $this->iTaskRepo = $iTaskRepo;
    }

    public function listAllTasks()
    {
        $arr = $this->iTaskRepo->all();
        $result = json_encode($arr);

        $response = new Response(true, [], $result, 200);
        $response->send();
    }

    public function selectTask($id)
    {
        $task = $this->iTaskRepo->where('task_id', $id)->first();
        $result = $task->toJson(JSON_INVALID_UTF8_IGNORE | JSON_UNESCAPED_LINE_TERMINATORS);
        $response = new Response(true, [], $result, 200);
        $response->send();
    }

    public function createTask()
    {
        $data = json_decode(file_get_contents("php://input"));
        $task = [
            'task_name' => $data->task_name,
            'subtitle_id' => $data->subtitle_id,
            'created_at' => Carbon::now(),
        ];
        $this->iTaskRepo->insert($task);
        $response = new Response(true, ["Task was included.."], $task, 201);
        $response->send();
    }

    public function writeNote()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->iTaskRepo->where('task_id', $data->task_id)->update(['note' => $data->note]);

        $response = new Response(true, ["Note was updated.."], [], 202);
        $response->send();
    }

    public function deleteTask()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!is_null($this->iTaskRepo->where('task_id', $data->task_id)->get())) {
            $response = new Response(true, ['Task was delete..'], [], 202);
            $response->send();
            $this->iTaskRepo->where('task_id', $data->task_id)->delete();
        }
    }
}