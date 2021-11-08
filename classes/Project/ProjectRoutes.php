<?php
namespace Project;

class ProjectRoutes {

	public function __construct() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';
	}

	public function getRoutes(): array {
		$centerIntroController = new \Project\Controllers\CenterIntro();

		$routes = [
			'' => [
				'GET' => [
					'controller' => $centerIntroController,
					'action' => "home"
				]
			],
		];
		return $routes;
	}


	public function getAuthentication(): \Redbookers\Authentication {
		return $this->authentication;
	}

	public function getHeaderVariables(){
		return $this->boardsMetadataTable;
	}
}