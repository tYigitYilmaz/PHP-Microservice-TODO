<?php
namespace App\Controller;

use Service\Abst\IReminderService;


class ReminderController
{
    private $iReminderService;

    public function __construct(IReminderService $iReminderService)
    {
        $this->iReminderService = $iReminderService;
    }

    public function createReminder() {
        $this->iReminderService->createCategory();
    }

    public function listAllCategories() {
        $this->iReminderService->listAllCategories();
    }

    public function selectReminder() {
        $this->iReminderService->selectCategory();
    }

}