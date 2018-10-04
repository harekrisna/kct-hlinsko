<?php

namespace App\AdminModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;
use Tracy\Debugger;

class GaleryFormFactory {
	use Nette\SmartObject;
	
	/** @var FormFactory */
	private $factory;
	/** @var Galery */
	private $model;

	private $record;
		
	public function __construct(FormFactory $factory, \App\Model\Galery $galery) {
		$this->factory = $factory;
		$this->model = $galery;
	}

	public function create($record = null) {
		$this->record = $record;

		$form = $this->factory->create();
		$data = $form->addContainer('data');

		$data->addText('title', 'Název galerie')
			 ->setRequired('Zadej název galerie.');

		$data->addText('url', 'URL galerie', 40)
      	     ->setRequired('Zadej URL galerie.');
      	
      	$data->addTextArea('description', 'Popis:', 40);

		$data->addDatePicker('date_from', 'Datum od')
			 ->setRequired('Zadej datum galerie.');

		$data->addDatePicker('date_to', 'Datum do');

	    $form->addSubmit('add', 'Přidat galerii');
	    $form->addSubmit('edit', 'Uložit změny');

	    if($record != null) {
	    	$form['data']->setDefaults($record);
	    }

		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		try {
			if($form->isSubmitted()->name == "add") {
				$new_record = $this->model->insert($values->data);
				$photos_folder = $new_record->id."_".Strings::webalize($new_record->title);
				$this->model->update($new_record->id, ['photos_folder' => $photos_folder]);
				$photos_folder = GALERIES_FOLDER."/".$photos_folder;
				mkdir($photos_folder);
				chmod($photos_folder, 0777);
				mkdir($photos_folder."/photos");
				chmod($photos_folder, 0777);
				mkdir($photos_folder."/previews");
				chmod($photos_folder, 0777);
			}
			else {
				$this->model->update($this->record->id, $values->data);
			}
		}
		catch(\App\Model\DuplicateException $e) {
			if($e->foreign_key == "url") {
				$form['data']['url']->addError("Galerie s tímto url již existuje.");
			}
		}
	}
}
