<?php
namespace Project;

class ProjectRoutes {
	private $userTable;
	private $authentication;
	private $boardTable;

	public function __construct() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';
		$board_id = isset($_GET['board_id']) ? $_GET['board_id'] : 'archive';

		$this->userTable = new \Redbookers\DatabaseTable($pdo, 'user', 'id', '\Project\Entity\User',[&$this->boardTable]);
		$this->authentication = new \Redbookers\Authentication($this->userTable, 'email', 'password');

		$this->boardTable = new \Redbookers\DatabaseTable($pdo, $board_id.'_board', 'id', '\Project\Entity\Board');
	}

	public function getRoutes(): array {
		$loginController = new \Project\Controllers\Login($this->authentication);
		$registerController = new \Project\Controllers\Register($this->userTable);
		$homeController = new \Project\Controllers\Home();
		$boardController = new \Project\Controllers\Board($this->boardTable, $this->authentication);


		$routes = [
			// 회원 가입
			'user/register' => [
				'GET' => [
					'controller' => $registerController,
					'action' => 'registrationPage'
				],
				'POST' => [
					'controller' => $registerController,
					'action' => 'registerUser'
				]
			],
			'user/register/success' => [
				'GET' => [
					'controller' => $registerController,
					'action' => 'success'
				]
			],

			// 로그인
			'user/login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => "loginPage"
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				]
			],
			'user/login/success' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'success'
				]
			],
			'user/login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			],
			'user/logout' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'logout'
				]
			],

			// 페이지
			'' => [
				'GET' => [
					'controller' => $homeController,
					'action' => "home"
				]
			],
			'post/write'=>[
				'GET'=>[
					'controller' => $boardController,
					'action' => "writePostPage"
				],
				'POST'=>[
					'controller' => $boardController,
					'action' => "saveEdit"
				],
			],
			'post/list'=>[
				'GET'=>[
					'controller' => $boardController,
					'action' => "listPage"
				],
			],
			'post/read'=>[
				'GET'=>[
					'controller' => $boardController,
					'action' => "readPage"
				],
			],
		];
		return $routes;
	}

	public function getAuthentication(): \Redbookers\Authentication {
		return $this->authentication;
	}
}