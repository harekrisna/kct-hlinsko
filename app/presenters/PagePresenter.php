<?php

namespace App\Presenters;

use Nette;
use App\Model;


class PagePresenter extends BasePresenter {

	public function renderView($page = 'welcome') {
		$page = $this->page->findBy(['page' => $page])
						   ->fetch();

		if (!$page)
            throw new Nette\Application\BadRequestException("Stránka nenalezena.");
        else 
        	$this->template->page = $page;
	}
}
