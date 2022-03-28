<?php
namespace Redbookers;

class EntryPoint {
	private $route;
	private $method;
	private $routes;
	private $authentication;
	private $skin_name="2111";
	
	public function __construct(string $route, string $method, $routes) {
		$this->route = $route;
		$this->routes = $routes;
		$this->method = $method;
		$this->checkUrl();
		$this->authentication = $routes->getAuthentication();
	}

	private function checkUrl() {
		if ($this->route !== strtolower($this->route)) {
			http_response_code(301);
			header('location: ' . strtolower($this->route));
		}
	}

	private function loadTemplate($templateFileName, $variables = []) {
		$skin_name = $this->skin_name;
		$loggedIn = $this->authentication->isLoggedIn();
		$user = $this->authentication->getUser();
		extract($variables);
		ob_start();
		include  __DIR__ . "/../../templates/".$this->skin_name."/".$templateFileName;
		return ob_get_clean();
	}

	public function run() {

		$routes = $this->routes->getRoutes();	

		if (isset($routes[$this->route]['login']) && !$this->authentication->isLoggedIn()) {
			header('location: /login/error');
		} else {
			$controller = $routes[$this->route][$this->method]['controller'];
			$action = $routes[$this->route][$this->method]['action'];
			$page = $controller->$action();

			if (isset($page['variables'])) {
				$output = $this->loadTemplate($page['template'], $page['variables']);
			} else {
				$output = $this->loadTemplate($page['template']);
			}

			echo $this->loadTemplate('layout.html.php', ['output' => $output ]);

		}

		}
	}