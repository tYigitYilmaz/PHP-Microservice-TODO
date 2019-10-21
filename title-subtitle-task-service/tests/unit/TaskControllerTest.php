<?php

namespace Tests\Unit;


use App\Controller\ReminderController;

class TaskControllerTest extends \PHPUnit\Framework\TestCase
{

    public function testCreateTask()
    {
        $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/task/createTask';
        $task = [
            'task_name'  => 'dummy-task',
            'subtitle_id'=> 1
        ];

        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($task)));

        $ch = curl_init($url_invoke);

        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($task));
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $response = json_decode($response);

        curl_close($ch);

        $this->assertEquals(201, $response->statusCode);
        $this->assertEquals(true, $response->success);
        $this->assertEquals(addslashes('Task was included..'), addslashes($response->messages[0]));
        $this->assertArrayHasKey('task_name', json_decode(json_encode($response->data), true));
        $this->assertArrayHasKey('created_at', json_decode(json_encode($response->data), true));
    }

    public function testSelectTask()
    {
        $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/task/selectTask/1';

        $ch = curl_init($url_invoke);

        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true);

        $response = curl_exec($ch);
        $response = json_decode($response);

        curl_close($ch);

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals(true, $response->success);
        $this->assertArrayHasKey('task_id', json_decode(json_encode($response->data), true));
        $this->assertArrayHasKey('task_name', json_decode(json_encode($response->data), true));
        $this->assertArrayHasKey('note', json_decode(json_encode($response->data), true));
        $this->assertArrayHasKey('subtitle_id', json_decode(json_encode($response->data), true));
    }

    public function testListAllTasks()
    {
        $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/task/listAllTasks';

        $ch = curl_init($url_invoke);

        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true);

        $response = curl_exec($ch);
        $response = json_decode($response);

        curl_close($ch);

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals(true, $response->success);
    }

    public function testEditTaskNote()
    {
        $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/task/writeNote';

        $task = [
            'task_id'  => 1,
            'note'  => 'something'
        ];

        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($task)));

        $ch = curl_init($url_invoke);

        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($task));
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $response = json_decode($response);

        curl_close($ch);

        $this->assertEquals(202, $response->statusCode);
        $this->assertEquals(true, $response->success);
        $this->assertEquals(addslashes('Note was updated..'), addslashes($response->messages[0]));
    }

    public function testDeleteCategory()
    {
        $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/task/deleteTask';

        $task = [
            'task_id'  => 1,
        ];

        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($task)));

        $ch = curl_init($url_invoke);

        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($task));
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $response = json_decode($response);

        curl_close($ch);

        $this->assertEquals(202, $response->statusCode);
        $this->assertEquals(true, $response->success);
        $this->assertEquals(addslashes('Task was delete..'), addslashes($response->messages[0]));
    }
}