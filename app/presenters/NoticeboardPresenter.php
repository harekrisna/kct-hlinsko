<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;
use Nette\Utils\DateTime;


class NoticeboardPresenter extends BasePresenter  {
	protected $ajax_blocks_count = 3;

	public function renderNoticeboard() {
		$this->template->actual_blocks = $this->noticeboard->findBy(['actual_to >= CURDATE()', 'active' => TRUE])
										      			   ->order('block_date DESC');

		$this->template->ajax_blocks_count = $this->ajax_blocks_count;
		$this->template->total_records_count = $this->noticeboard->findBy(['actual_to < CURDATE()', 'active' => TRUE])
																 ->count();		
	}
	/*
    public function renderImport() {
        $html_file = file_get_contents('./nastenka.html');
        
		$blocks = explode("----------", $html_file);

		$iterator = 0;
		$actual_to = DateTime::from('2018-09-29'); // vytvoří DateTime z řetězce
		foreach ($blocks as $key => $block) {
			$this->noticeboard->insert(['block_date' => "2018-09-29",
										'content' => trim($block),
										'actual_to' => $actual_to,
										'block_date' => $actual_to,
										'active' => 1]);

			$actual_to->modify('-1 day');
			$iterator++;

		}

        $this->template->test = $html_file;
        $this->template->blocks = $blocks;
    }
	*/
	public function renderLoadNextBlock($offset) {
		$this->setView('noticeBlocks');
		
		$blocks = $this->noticeboard->findBy(['actual_to < CURDATE()', 'active' => TRUE])
								    ->order('block_date DESC')
								    ->limit($this->ajax_blocks_count, $offset);

		$this->template->blocks = $blocks;
    }

	public function renderLoadAllBlocks($offset) {
		$this->setView('noticeBlocks');
		Debugger::fireLog($offset);
		$this->template->blocks = $this->noticeboard->findBy(['actual_to < CURDATE()', 'active' => TRUE])
													->order('block_date DESC')
													->limit(1316134911, $offset);
    }	    
}
