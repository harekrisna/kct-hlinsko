<?php

namespace App\AdminModule\Presenters;
use Nette,
	App\Model;
use Tracy\Debugger;
use Nette\Application\UI\Form;
use Nette\Utils\Image;
use Nette\Utils\DateTime;
use App\AdminModule\Forms\NoticeboardFormFactory;

final class NoticeboardPresenter extends BasePresenter {        
    /** @var object */
    private $record;
    /** @var Noticeboard */
    private $model;
    /** @var NoticeboardFormFactory @inject */
    public $factory;

	protected function startup() {
		parent::startup();
		$this->model = $this->noticeboard;
	}
	
	public function renderAdd() {
		$this->setView("form");
		$this->template->form_title = "Přidat blok nástěnky";
	}

    public function actionEdit($record_id) {
        $this->record = $this->model->get($record_id);
        
        if (!$this->record)
            throw new Nette\Application\BadRequestException("Blok nástěnky nenalezen.");
            
        $this->template->record = $this->record;        

        $_SESSION['KCFINDER'] = array(
            'disabled' => false,
            'uploadURL' => "../../images/kcfinder/noticeboard",
        );
    }

	public function renderEdit($record_id) {
		$this->setView("form");
		$this->template->form_title = "Upravit blok nástěnky";
	}
	
    public function renderList() {
        $this->template->records = $this->model->findAll()
                                               ->order('block_date DESC');

        $today = new DateTime();
        $today->setTime(0, 0, 0);

        $this->template->today = $today;
    }
					
    protected function createComponentForm() {
        $form = $this->factory->create($this->record);
        
        $form->onSuccess[] = function ($form, $values) {
            if($form->isSubmitted() !== true && $form->isSubmitted()->name == "add") { 
                $this->flashMessage("Blok byl vytvořen", 'success');
                $form->getPresenter()->redirect('list');
            }
            else {
                $this->flashMessage("Blok byl upraven", 'success');
                $form->getPresenter()->redirect('list');
            }
        };
        
        return $form;
    }

    public function actionDelete($id) {
        $record = $this->model->get($id);
        $this->payload->success = $this->model->delete($id);
        $this->sendPayload();
    }    

    public function actionSetActivity($record_id, $active) {
        $this->model->findBy(['id' => $record_id])
                    ->update(['active' => $active == "true" ? 1 : 0]);

        $this->sendPayload();
    }    
}
