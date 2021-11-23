<?php
namespace Project\Controllers;

class Login {
	private $authentication;

	public function __construct(\Redbookers\Authentication $authentication) {
		$this->authentication = $authentication;
	}

	public function loginPage() {
		return ['template' => 'login.html.php', 'title' => '로그인'];
	}

	public function processLogin() {
		if ($this->authentication->login($_POST['email'], $_POST['password'])) {
			header('location: /user/login/success');
		}
		else {
			return ['template' => 'login.html.php',
					'title' => '로그인',
					'variables' => [
						'error' => '사용자 이름/비밀번호가 유효하지 않습니다.'
					]
			];
		}
	}

	public function success() {
		return ['template' => 'loginsuccess.html.php', 'title' => '로그인 성공'];
	}

	public function error() {
		return ['template' => 'loginerror.html.php', 'title' => '로그인되지 않았습니다.'];
	}

	public function permissionsError() {
		return ['template' => 'permissionserror.html.php', 'title' => '접근 불가'];
	}

	public function logout() {
		unset($_SESSION);
		session_destroy();
		return ['template' => 'logout.html.php', 'title' => '로그아웃되었습니다'];
	}
}