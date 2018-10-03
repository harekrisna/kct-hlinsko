<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;
use Nette\DI\Container;

class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter(Nette\DI\Container $container)
	{
		$router = new RouteList;
		$router[] = new Route('admin1953/<presenter>/<action>[/<id>]', array(
        	'module'    => 'Admin',
            'presenter' => 'Noticeboard',
            'action'    => 'list'
        ));
        
        $router[] = new Route('nastenka', 'Noticeboard:noticeboard');
        $router[] = new Route('fotogalerie', 'Photogallery:photogallery');
        $router[] = new Route('plan-akci', 'EventsSchedule:schedulesList');
        $router[] = new Route('plan-akci/aktualni/<record_id>', array(
			'presenter' => 'EventsSchedule',
			'action' => 'actualSchedule',
			'record_id' => array(
				Route::FILTER_OUT => function ($id) use($container) { return $container->getService('events_schedule')->getYearById($id);},
				Route::FILTER_IN => function ($year) use($container) { return $container->getService('events_schedule')->getIdByYear($year);},
			),
		));

		$router[] = new Route('plan-akci/uskutecnene/<record_id>', array(
			'presenter' => 'EventsSchedule',
			'action' => 'historySchedule',
			'record_id' => array(
				Route::FILTER_OUT => function ($id) use($container) { return $container->getService('events_schedule_history')->getYearById($id);},
				Route::FILTER_IN => function ($year) use($container) { return $container->getService('events_schedule_history')->getIdByYear($year);},
			),
		));

        $router[] = new Route('fotogalerie/<galery_id>', array(
			'presenter' => 'Photogallery',
			'action' => 'photos',
			'galery_id' => array(
				Route::FILTER_OUT => function ($id) use($container) { return $container->getService('galery')->getTitleById($id);},
				Route::FILTER_IN => function ($url) use($container) { return $container->getService('galery')->getIdByTitle($url);},
			),
		));

		$router[] = new Route('audio/rok/<year>?seskupit=<group_by>', array(
			'presenter' => 'Audio',
			'action' => 'year',
			'group_by' => array(
				Route::FILTER_TABLE => array(
					'autoru' => 'interpret_id',
					'temata' => 'book_id',
				)
			),
		));

		$router[] = new Route('<page_name>', array(
			'presenter' => 'Page',
			'action' => 'view',
			'page_name' => array(
				Route::FILTER_TABLE => array(
					'vitejte' => 'welcome',
					'odkazy' => 'links',
					'historie' => 'history',
					'kontakty' => 'contacts',
					'stanovy-kct' => 'statute',
					'ke-stazeni' => 'download',
					'clenske-prispevky' => 'member_donations',
					'pojisteni-clenu' => 'insurance',
					'vyrocni-schuze-kct' => 'meeting',
				)
			),
		));

		$router[] = new Route('<presenter>/<action>[/<id>]', "Page:view");
		return $router;
	}

}
