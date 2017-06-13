<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;


class NoticeboardPresenter extends BasePresenter  {

	public function renderNoticeboard() {
		$this->template->block = $this->noticeboard->findAll()
												   ->order('block_date DESC')
												   ->limit(1)
												   ->fetch();
	}
	
	public function renderLoadNextBlock($block_id) {
		$this->setView('noticeBlock');
		
		$block = $this->noticeboard->findBy(['block_date < ?' => $this->noticeboard->get($block_id)->block_date])
								   ->order('block_date DESC')
								   ->limit(1)
								   ->fetch();
		
		if($block) {
			$this->template->block = $block;
		}
		else {
			$this->payload->is_last = true;
			$this->sendPayload();	
		}
    }	
}
