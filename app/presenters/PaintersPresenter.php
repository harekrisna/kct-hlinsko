<?php

namespace App\Presenters;

use Nette;
use App\Model;


class PaintersPresenter extends BasePresenter {
	
	public function renderList() {
		$this->template->painters = $this->painters->findAll()
												  ->order('year DESC');
	}
	
	public function renderDetail($record_id) {
		$this->template->painter = $this->painters->get($record_id);
		$this->template->backlink = $this->link('list');
	}		
}
