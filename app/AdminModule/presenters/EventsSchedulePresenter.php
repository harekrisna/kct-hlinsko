<?php

namespace App\AdminModule\Presenters;
use Nette,
	App\Model;
use Tracy\Debugger;
use Nette\Application\UI\Form;
use Nette\Utils\Image;
use App\AdminModule\Forms\EventsScheduleFormFactory;

final class EventsSchedulePresenter extends BasePresenter {        
    /** @persistent */
    public $schedule_type;
    /** @var object */
    private $record;
    /** @var EventsSchedule */
    private $model;
    /** @var EventsScheduleFormFactory @inject */
    public $factory;

    protected function startup() {
        parent::startup();
        if($this->schedule_type == "history") {
            $this->model = $this->events_schedule_history;
        }
        elseif($this->schedule_type == "actual") {
            $this->model = $this->events_schedule;
        }
    }

    public function actionEdit($record_id) {
        $this->record = $this->model->get($record_id);
        
        if (!$this->record)
            throw new Nette\Application\BadRequestException("Plán nenalezen.");
            
        $this->template->record = $this->record;
        $this['form']['data']['year']->setAttribute('readonly', 'readonly');
        $this['form']['schedule_type']->setDisabled();
        

        $_SESSION['KCFINDER'] = array(
            'disabled' => false,
            'uploadURL' => "../../images/kcfinder/events_schedule",
        );
    }

    public function renderList($schedule_type) {
        $this->schedule_type = $schedule_type;
        $this->template->records = $this->model->findAll()
                                               ->order('year DESC');
    }
					
    protected function createComponentForm() {
        $form = $this->factory->create($this->schedule_type, $this->record);
        
        $form->onSuccess[] = function ($form, $values) {
            if($form->isSubmitted() !== true && $form->isSubmitted()->name == "add") { 
                $this->flashMessage("Plán byl vytvořen", 'success');
                $form->getPresenter()->redirect('EventsSchedule:list', $values->schedule_type);
            }
            else {
                $this->flashMessage("Plán byl upraven", 'success');
                $form->getPresenter()->redirect('EventsSchedule:list', $this->schedule_type);
            }
        };
        
        return $form;
    }

    public function actionDelete($id) {
        $record = $this->model->get($id);
        $this->payload->success = $this->model->delete($id);
        $this->sendPayload();
    }    
}
