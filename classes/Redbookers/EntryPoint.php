<?php
namespace Redbookers;

class EntryPoint {
	private $route;
	private $method;
	private $routes;
	private $skin_name="2109";
	private $authentication;
	private $boardsMetadataTable;

	public function __construct(string $route, string $method, $routes) {
		$this->route = $route;
		$this->routes = $routes;
		$this->authentication = $routes->getAuthentication();
		$this->boardsMetadataTable = $routes->getHeaderVariables();
		$this->method = $method;
		$this->checkUrl();
	}

	private function checkUrl() {
		if ($this->route !== strtolower($this->route)) {
			http_response_code(301);
			header('location: ' . strtolower($this->route));
		}
	}

	private function loadTemplate($templateFileName, $variables = []) {
		$logged_in = $this->authentication->isLoggedIn();
		$user = $this->authentication->getUser();
		$archive_menus = $this->boardsMetadataTable->find("group_no", 1);
		$communication_menus = $this->boardsMetadataTable->find("group_no", 4);
		extract($variables);
		ob_start();
		include  __DIR__ . "/../../templates/".$this->skin_name."/".$templateFileName;
		return ob_get_clean();
	}

	public function run() {
		$routes = $this->routes->getRoutes();
		if (isset($routes[$this->route]['login']) && !$this->authentication->isLoggedIn()) {
			header('location: /login/error');
		}else { 
			$controller = $routes[$this->route][$this->method]['controller'];
			$action = $routes[$this->route][$this->method]['action'];
			$page = $controller->$action();
	
			if (isset($page['variables'])) {
				$output = $this->loadTemplate($page['template'], $page['variables']);
			}
			else {
				$output = $this->loadTemplate($page['template']);
			}
			echo $this->loadTemplate('layout.html.php',
				[
					'output' => $output
				]
			);
		}
	}
}