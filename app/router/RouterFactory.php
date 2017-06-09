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
		$router[] = new Route('admin1896/<presenter>/<action>[/<id>]', array(
        	'module'    => 'Admin',
            'presenter' => 'Galery',
            'action'    => 'list'
        ));
        
        $router[] = new Route('fotogalerie', 'Photogallery:photogallery');
        $router[] = new Route('plan-akci', 'EventsSchedule:schedulesList');

        $router[] = new Route('fotogalerie/<galery_id>', array(
			'presenter' => 'Photogallery',
			'action' => 'photos',
			'galery_id' => array(
				Route::FILTER_OUT => function ($id) use($container) { return $container->getService('galery')->getTitleById($id);},
				Route::FILTER_IN => function ($url) use($container) { return $container->getService('galery')->getIdByTitle($url);},
			),
		));

		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}

}
