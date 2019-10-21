<?php
namespace Service\Concrete;


use Core\Model\Response;
use Data\Repository\Abst\IReminderRepo;
use Illuminate\Support\Carbon;
use Service\Abst\IReminderService;

class ReminderService implements IReminderService
{
    private $IReminderRepo;

    public function __construct(IReminderRepo $IReminderRepo)
    {
        $this->IReminderRepo = $IReminderRepo;
    }

    public function listAllReminders()
    {
        $data = json_decode(file_get_contents("php://input"));
        $reminders = $this->IReminderRepo->where("relatedId", $data->relatedId)->get();

        $result = json_encode($reminders);
        $response = new Response( true,[],$result,200);
        $response->send();
    }

    public function selectReminder() {
        $data = json_decode(file_get_contents("php://input"));
        $category = $this->IReminderRepo->where('id', $data->id)->get();
        $result = $category->toJson(JSON_INVALID_UTF8_IGNORE |JSON_UNESCAPED_LINE_TERMINATORS);
        $response = new Response( true,[],$result,200);
        $response->send();
    }

    public function editReminder() {
        $data = json_decode(file_get_contents("php://input"));
        $reminder = $this->IReminderRepo->find($data->id);

        $reminder->deadlineDate = $data->deadlineDate;
        $reminder->reminderRepeat = $data->reminderRepeat;
        $reminder->reminderTime = $data->reminderTime;
        $reminder->save();

        $result = $reminder->toJson(JSON_INVALID_UTF8_IGNORE |JSON_UNESCAPED_LINE_TERMINATORS);
        $response = new Response( true,[],$result,200);
        $response->send();
    }

    public function createReminder()
    {
        $data = json_decode(file_get_contents("php://input"));
        $reminder = [
           "deadlineDate" => $data->deadlineDate,
            "reminderRepeat" => $data->reminderRepeat,
            "reminderTime" => $data->reminderTime,
            "created_at" => Carbon::now(),
        ];
        $this->IReminderRepo->insert($reminder);
        $response = new Response( true,["Reminder is created.."],$reminder,201);
        $response->send();
    }
}