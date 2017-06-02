<?php

namespace App\AdminModule\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;
use Nette\Application\UI\Form;
use Nette\Utils\FileSystem;
use App\AdminModule\Forms\GaleryFormFactory;

class GaleryPresenter extends BasePresenter {
	/** @var object */
    private $record;
	/** @var Galery */
	private $model;
	/** @var GaleryFormFactory @inject */
	public $factory;

	private $delete_success;

	protected function startup() {
		parent::startup();
		$this->model = $this->galery;
	}
	
	public function renderAdd() {
		$this->setView("form");
		$this->template->form_title = "Přidat galerii";
	}

	public function renderEdit($record_id) {
		$this->setView("form");
		$this->template->form_title = "Upravit galerii";
	}

	public function actionEdit($record_id) {
		$this->record = $this->model->get($record_id);
		
		if (!$this->record)
            throw new Nette\Application\BadRequestException("Galerie nenalezena.");
			
        $this->template->record = $this->record;
	}

	public function renderList() {
        $this->template->records = $this->model->findAll();

        if($this->isAjax()) {
        	$this->redrawControl('galeries');
        	$this->payload->success = $this->delete_success;
        }
	}

	protected function createComponentForm() {
		$form = $this->factory->create($this->record);
		
		$form->onSuccess[] = function ($form) {
			if($form->isSubmitted()->name == "add") {
				$this->flashMessage("Galerie byla přidána", 'success');
				$form->getPresenter()->redirect('Galery:add');
			}
			else {
				$this->flashMessage("Galerie byla upravena", 'success');
				$form->getPresenter()->redirect('Galery:list');
			}
		};
 		
 		return $form;
	}	

	public function actionDelete($id) {
		$record = $this->model->get($id);

		if($record->photos_folder != "") {
			FileSystem::delete(GALERIES_FOLDER."/".$record->photos_folder);
		}
		
		$this->delete_success = $this->model->delete($id);
		$this->setView("list");
	}

    public function actionSetActivity($record_id, $active) {
        $this->model->findBy(['id' => $record_id])
                    ->update(['active' => $active == "true" ? 1 : 0]);

        $this->sendPayload();
    }   	
}
