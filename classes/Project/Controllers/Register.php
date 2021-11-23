<?php
namespace Project\Controllers;
use \Redbookers\DatabaseTable;

class Register {
	private $userTable;

	public function __construct(DatabaseTable $userTable) {
		$this->userTable = $userTable;
	}

	public function registrationPage() {
		return ['template' => 'register.html.php', 
				'title' => '사용자 등록'];
	}

	public function success() {
		return ['template' => 'registersuccess.html.php', 
			    'title' => '등록 성공'];
	}

	public function registerUser() {
		$user = $_POST['user'];

		// 데이터는 처음부터 유효하다고 가정
		$valid = true;
		$errors = [];

		// 하지만 항목이 빈 값이면 $valid에 false 할당
		if (empty($user['name'])) {
			$valid = false;
			$errors[] = '이름을 입력해야 합니다.';
		}

		if (empty($user['email'])) {
			$valid = false;
			$errors[] = '이메일을 입력해야 합니다.';
		}
		else if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) == false) {
			$valid = false;
			$errors[] = '유효하지 않은 이메일 주소입니다.';
		}
		else { // 이메일 주소가 빈 값이 아니고 유효하다면
			// 이메일 주소를 소문자로 변환
			$user['email'] = strtolower($user['email']);

			// $user['email']을 소문자로 검색
			if (count($this->userTable->find('email', $user['email'])) > 0) {
				$valid = false;
				$errors[] = '이미 가입된 이메일 주소입니다.';
			}
		}


		if (empty($user['password'])) {
			$valid = false;
			$errors[] = '비밀번호를 입력해야 합니다.';
		}

		// $valid가 true라면 빈 항목이 없으므로
		// 데이터를 추가할 수 있음
		if ($valid == true) {
			// 데이터베이스에 저장하기 전에 비밀번호를 해시화
			$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

			// 폼이 전송되면 $user 변수는
			// 소문자 메일과 비밀번호 해시값을 포함
			$this->userTable->save($user);

			header('Location: /user/register/success');
		}
		else {
			// 데이터가 유효하지 않으면 폼을 다시 출력
			return ['template' => 'register.html.php', 
				    'title' => '사용자 등록',
				    'variables' => [
				    	'errors' => $errors,
				    	'user' => $user
				    ]
				   ]; 
		}
	}
}