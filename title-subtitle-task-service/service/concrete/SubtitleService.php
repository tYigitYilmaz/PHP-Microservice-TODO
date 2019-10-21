<?php
namespace Service\Concrete;


use Core\Model\Response;
use Data\Repository\Abst\ISubtitleRepo;
use Illuminate\Support\Carbon;
use Service\Abst\ISubtitleService;

class SubtitleService implements ISubtitleService
{
    private $iSubtitleRepo;

    public function __construct(ISubtitleRepo $iSubtitleRepo)
    {
        $this->iSubtitleRepo = $iSubtitleRepo;
    }

    public function listAllSubtitles(){
        $arr = $this->iSubtitleRepo->all();
        $result = json_encode($arr);

        $response = new Response( true,[],$result,200);
        $response->send();
    }

    public function selectSubtitle($id) {
        $subtitle = $this->iSubtitleRepo->where('subtitle_id', $id)->first();
        $result = json_decode($subtitle);
        $response = new Response(true, [], $result, 200);
        $response->send();
    }

    public function createSubtitle()
    {
        $data = json_decode(file_get_contents("php://input"));
        $subtitle = [
            'subtitle_name'  => $data->subtitle_name,
            'title_id'  => $data->title_id,
            'created_at' => Carbon::now(),
        ];
        $this->iSubtitleRepo->insert($subtitle);
        $response = new Response( true,["Subtitle was included.."],$subtitle,201);
        $response->send();
    }

    public function deleteSubtitle()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!is_null($this->iSubtitleRepo->where('subtitle_id', $data->subtitle_id)->get())) {
            $response = new Response(true, ['Subtitle was deleted'], [], 202);
            $response->send();
            $this->iSubtitleRepo->where('subtitle_id', $data->subtitle_id)->delete();
        }
    }
}