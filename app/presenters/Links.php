<?php

namespace App\Presenters;

use Nette;
use App\Model;


class LinksPresenter extends BasePresenter	{

	public function renderLinks() {
		$this->template->page = $this->page->findBy(['page' => 'links'])
										   ->fetch();
	}	
}
