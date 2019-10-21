<?php
namespace App\Controller;

use Service\Abst\ICategoryService;
use Service\Gateway\IReceiverService;


class CategoryController
{
    private $iCategoryService;
    private $iReceiverService;

    public function __construct(ICategoryService $iCategoryService, IReceiverService $iReceiverService)
    {
        $this->iCategoryService = $iCategoryService;
        $this->iReceiverService = $iReceiverService;
    }

    public function createCategory()
    {
        $this->iCategoryService->createCategory();
    }

    public function listAllCategories()
    {
        $this->iCategoryService->listAllCategories();
    }

    public function selectCategory($id)
    {
        $this->iCategoryService->selectCategory($id);
    }

    public function index()
    {
       return $this->iReceiverService->receiver('reminder-service', 'listAllCategories');
    }

    public function deleteCategory()
    {
        $this->iCategoryService->deleteCategory();
    }
}