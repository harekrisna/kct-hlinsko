<?php

namespace App\AdminModule\Presenters;
use Nette,
	App\Model;
use Tracy\Debugger;
use Nette\Application\UI\Form;
use Nette\Utils\Image;
use App\AdminModule\Forms\EventsScheduleFormFactory;

final class EventsSchedulePresenter extends BasePresenter {        
    /** @var object */
    private $record;
    /** @var EventsSchedule */
    private $model;
    /** @var EventsScheduleFormFactory @inject */
    public $factory;

    private $delete_success;

    protected function startup() {
        parent::startup();
        $this->model = $this->events_schedule;
    }
    
    public function renderAdd() {
        $this->setView("form");
        $this->template->form_title = "Přidat plán";
    }

    public function renderEdit($record_id) {
        $this->setView("form");
        $this->template->form_title = "Upravit plán";
    }

    public function actionEdit($record_id) {
        $this->record = $this->model->get($record_id);
        
        if (!$this->record)
            throw new Nette\Application\BadRequestException("Plán nenalezen.");
            
        $this->template->record = $this->record;
    }

    public function renderList() {
        $this->template->records = $this->model->findAll();

        if($this->isAjax()) {
            $this->payload->success = $this->delete_success;
        }
    }
					
    protected function createComponentForm() {
        $form = $this->factory->create($this->events_schedule, $this->record);
        
        $form->onSuccess[] = function ($form) {
            if($form->isSubmitted()->name == "add") {
                $this->flashMessage("Plán byl vytvořen", 'success');
                $form->getPresenter()->redirect('EventsSchedule:list');
            }
            else {
                $this->flashMessage("Plán byl upraven", 'success');
                $form->getPresenter()->redirect('EventsSchedule:list');
            }
        };
        
        return $form;
    }

    public function actionDelete($id) {
        $record = $this->model->get($id);
        $this->delete_success = $this->model->delete($id);
        $this->setView("list");
    }    
}

