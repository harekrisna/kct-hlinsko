<?php

namespace App\Presenters;

use Nette;
use App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {
	/** @var Page */
	protected $page;
	/** @var Galery */
	protected $galery;
	/** @var Photo */
	protected $photo;

	protected function startup() {
		parent::startup();

		$this->page = $this->context->getService('page');
        $this->galery = $this->context->getService('galery');
        $this->photo = $this->context->getService('photo');
	}
}
