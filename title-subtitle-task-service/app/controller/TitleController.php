<?php
namespace App\Controller;

use Service\Abst\ITitleService;


class TitleController
{
    private $iTitleService;

    public function __construct(ITitleService $iTitleService)
    {
        $this->iTitleService = $iTitleService;
    }

    public function createTitle() {
        $this->iTitleService->createTitle();
    }

    public function listAllTitles() {
        $this->iTitleService->listAllTitles();
    }

    public function selectTitle($id) {
        $this->iTitleService->selectTitle($id);
    }

    public function deleteTitle() {
        $this->iTitleService->deleteTitle();
    }

}