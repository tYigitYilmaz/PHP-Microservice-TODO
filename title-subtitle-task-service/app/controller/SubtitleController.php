<?php
namespace App\Controller;

use Service\Abst\ISubtitleService;


class SubtitleController
{
    private $iSubtitleService;

    public function __construct(ISubtitleService $iSubtitleService)
    {
        $this->iSubtitleService = $iSubtitleService;
    }

    public function createSubtitle() {
        $this->iSubtitleService->createSubtitle();
    }

    public function listAllSubtitles() {
        $this->iSubtitleService->listAllSubtitles();
    }

    public function selectSubtitle($id) {
        $this->iSubtitleService->selectSubtitle($id);
    }

    public function deleteSubtitle()
    {
        $this->iSubtitleService->deleteSubtitle();
    }

}