<?php

namespace Service\Concrete;


use Core\Model\Response;
use Data\Repository\Abst\ITitleRepo;
use Illuminate\Support\Carbon;
use Service\Abst\ITitleService;

class TitleService implements ITitleService
{
    private $iTitleRepo;


    public function __construct(ITitleRepo $iTitleRepo)
    {
        $this->iTitleRepo = $iTitleRepo;
    }

    public function listAllTitles()
    {
        $arr = $this->iTitleRepo->all();
        $result = json_encode($arr);

        $response = new Response(true, [], $result, 200);
        $response->send();
    }

    public function selectTitle($id)
    {
        $title = $this->iTitleRepo->where('title_id', $id)->first();
        $result = json_decode($title);
        $response = new Response(true, [], $result, 200);
        $response->send();
    }

    public function createTitle()
    {
        $data = json_decode(file_get_contents("php://input"));
        $title = [
            'title_name' => $data->title_name,
            'category_id' => $data->category_id,
            'created_at' => Carbon::now(),
        ];
        $this->iTitleRepo->insert($title);
        $response = new Response(true, ["Title was included.."], $title, 201);
        $response->send();
    }

    public function deleteTitle()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!is_null($this->iTitleRepo->where('title_id', $data->title_id)->get())) {
            $response = new Response(true, ['Title was deleted'], [], 202);
            $response->send();
            $this->iTitleRepo->where('title_id', $data->title_id)->delete();
        }
    }
}