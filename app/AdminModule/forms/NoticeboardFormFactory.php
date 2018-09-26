<?php

namespace App\AdminModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;
use Tracy\Debugger;

class NoticeboardFormFactory {
	use Nette\SmartObject;
	
	/** @var FormFactory */
	private $factory;
	/** @var Noticeboard */
	private $model;

	private $record;
		
	public function __construct(FormFactory $factory, \App\Model\Noticeboard $noticeboard) {
		$this->factory = $factory;
		$this->model = $noticeboard;
	}

	public function create($record = null) {
		$this->record = $record;

		$form = $this->factory->create();
		$data = $form->addContainer('data');

		$data->addDatePicker('block_date', 'Datum')
			 ->setRequired('Zadej datum.');

		$data->addDatePicker('actual_to', 'Aktuální do')
			 ->setRequired('Zadej aktuální do.');			 

      	$data->addTextArea('content', 'Obsah');

	    $form->addSubmit('add', 'Přidat blok');
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
			else {
				$this->model->update($this->record->id, $values->data);
			}
		}
		catch(\App\Model\DuplicateException $e) {
			if($e->foreign_key == "block_date") {
				$form['data']['block_date']->addError("Blok pro tento den již existuje.");
			}
			else throw $e;
		}
	}
	
	public function formError(Form $form) {
		Debugger::fireLog($form->errors);
	}
}
