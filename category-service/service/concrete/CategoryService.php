<?php
namespace Service\Concrete;


use Core\Model\Response;
use Data\Repository\Abst\ICategoryRepo;
use Illuminate\Support\Carbon;
use Service\Abst\ICategoryService;
use Service\Gateway\IReceiverService;

class CategoryService implements ICategoryService
{
    private $iCategoryRepo;
    private $iReceiverService;


    public function __construct(ICategoryRepo $iCategoryRepo, IReceiverService $iReceiverService)
    {
        $this->iCategoryRepo = $iCategoryRepo;
        $this->iReceiverService = $iReceiverService;
    }

    public function listAllCategories(){

        $list = $this->iCategoryRepo->all();
        $result = json_encode($list);
        $response = new Response( true,[],$result,200);
        $response->send();
    }

    public function selectCategory($id) {
        $category = $this->iCategoryRepo->where('category_id', $id)->get();
        $result = json_decode($category, true);

        $response = new Response( true,[],$result[0],200);
        $response->send();
    }

    public function createCategory()
    {
        $data = json_decode(file_get_contents("php://input"));
        $category = [
            'name'  => $data->name,
            'user_id'  =>  $data->user_id,
            'created_at' => Carbon::now(),
        ];

        $this->iReceiverService->receiver('reminder-service', 'listAllCategories');
        $this->iCategoryRepo->insert($category);
        $response = new Response( true,["Category is included in the category list.."],$category,201);
        $response->send();
    }

    public function deleteCategory()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!is_null($this->iCategoryRepo->where('category_id',$data->category_id)->get())){
            $response = new Response( true,["Category is deleted from the category list.."],[],202);
            $response->send();
            $this->iCategoryRepo->where('category_id',$data->category_id)->delete();
        }
    }
}