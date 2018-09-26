<?php

namespace App\AdminModule\Forms;

use Nette;
use Nette\Application\UI\Form;


class FormFactory {
    use Nette\SmartObject;
    
	/**
	 * @return Form
	 */
	public function create() {
		$form = new Form;
		$form->addProtection('Vypršel časový limit, odešlete formulář znovu');
		return $form;
	}
}
