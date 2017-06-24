<?php

namespace App\AdminModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;
use Tracy\Debugger;

class PaintersFormFactory extends Nette\Object {
	/** @var FormFactory */
	private $factory;
	/** @var Painters */
	private $model;

	private $record;
		
	public function __construct(FormFactory $factory, \App\Model\Painters $painter) {
		$this->factory = $factory;
		$this->model = $painter;
	}

	public function create($record = null) {
		$this->record = $record;

		$form = $this->factory->create();
		$data = $form->addContainer('data');

		$data->addText('year', 'Rok')
			 ->setRequired('Zadej rok.');      	

      	$data->addTextArea('content', 'Obsah');

	    $form->addSubmit('add', 'Přidat rok');
	    $form->addSubmit('edit', 'Uložit změny');

	    if($record != null) {
	    	$form['data']->setDefaults($record);
	    }

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formError');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		try {
			if($form->isSubmitted() !== true && $form->isSubmitted()->name == "add") { 	
				$this->model->insert($values->data);
			}
			else { //pokud $form->isSubmitted() === true znamená to že byl formulář odeslán ukládacím tlačítkem CKFINDERu při editaci
				$this->model->update($this->record->id, $values->data);
			}
		}
		catch(\App\Model\DuplicateException $e) {
			if($e->foreign_key == "year") {
				$form['data']['year']->addError("KMV pro tento rok již existuje.");
			}
		}
	}
	
	public function formError(Form $form) {
		Debugger::fireLog($form->errors);
	}
}
