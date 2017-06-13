<?php

namespace App\AdminModule\Presenters;
use Nette,
	App\Model;
use Tracy\Debugger;
use Nette\Application\UI\Form;
use Nette\Utils\Image;
use App\AdminModule\Forms\PaintersFormFactory;

final class PaintersPresenter extends BasePresenter {        
    /** @var object */
    private $record;
    /** @var EventsSchedule */
    private $model;
    /** @var PaintersFormFactory @inject */
    public $factory;

	protected function startup() {
		parent::startup();
		$this->model = $this->painters;
	}
	
	public function renderAdd() {
		$this->setView("form");
		$this->template->form_title = "Přidat ročník Krajem malířů vysočiny";
	}

    public function actionEdit($record_id) {
        $this->record = $this->model->get($record_id);
        
        if (!$this->record)
            throw new Nette\Application\BadRequestException("Ročník KMV nenalezen.");
            
        $this->template->record = $this->record;        

        $_SESSION['KCFINDER'] = array(
            'disabled' => false,
            'uploadURL' => "../../images/kcfinder/painters",
        );
    }

	public function renderEdit($record_id) {
		$this->setView("form");
		$this->template->form_title = "Přidat ročník Krajem malířů vysočiny";
	}
	
    public function renderList() {
        $this->template->records = $this->model->findAll()
                                               ->order('year DESC');
    }
					
    protected function createComponentForm() {
        $form = $this->factory->create($this->record);
        
        $form->onSuccess[] = function ($form, $values) {
            if($form->isSubmitted() !== true && $form->isSubmitted()->name == "add") { 
                $this->flashMessage("Ročník KMV byl vytvořen", 'success');
                $form->getPresenter()->redirect('list');
            }
            else {
                $this->flashMessage("Rokčník KMV byl upraven", 'success');
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
