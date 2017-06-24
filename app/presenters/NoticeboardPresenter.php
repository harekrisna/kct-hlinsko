<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;


class NoticeboardPresenter extends BasePresenter  {

	public function renderNoticeboard() {
		$this->template->actual_blocks = $this->noticeboard->findBy(['actual_to >= CURDATE()', 'active' => TRUE])
										      			   ->order('block_date DESC');
	}
	
	public function renderLoadNextBlock($offset) {
		$this->setView('noticeBlock');
		
		$block = $this->noticeboard->findBy(['actual_to < CURDATE()', 'active' => TRUE])
								   ->order('block_date DESC')
								   ->limit(1, $offset)
								   ->fetch();

		if($block) {
			$this->template->block = $block;
		}
		else {
			$this->payload->is_last = true;
			$this->sendPayload();	
		}
    }

	public function renderLoadAllBlocks($offset) {
		$this->setView('noticeBlocks');
		Debugger::fireLog($offset);
		$this->template->blocks = $this->noticeboard->findBy(['actual_to < CURDATE()', 'active' => TRUE])
													->order('block_date DESC')
													->limit(1316134911, $offset);
    }	    
}
