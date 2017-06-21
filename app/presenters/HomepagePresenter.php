<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;


class HomepagePresenter extends BasePresenter {

	public function renderView($page_name = 'welcome') {
		$page = $this->page->findBy(['page' => $page_name])
						   ->fetch();
								   
		if (!$page)
            throw new Nette\Application\BadRequestException("Stránka nenalezena.");
        else 
        	$this->template->page = $page;
	}
}
