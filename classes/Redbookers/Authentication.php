<?php
namespace Redbookers;

class Authentication {
	private $users;
	private $usernameColumn;
	private $passwordColumn;

	public function __construct(DatabaseTable $users, $usernameColumn, $passwordColumn) {
		session_start();
		$this->users = $users;
		$this->usernameColumn = $usernameColumn;
		$this->passwordColumn = $passwordColumn;
	}

	public function login($login_id, $password) {
		$user = $this->users->find($this->usernameColumn, strtolower($login_id));
		if (!empty($user) && password_verify($password, $user[0]->{$this->passwordColumn})) {
			session_regenerate_id();
			$_SESSION['username'] = $login_id;
			$_SESSION['password'] = $user[0]->{$this->passwordColumn};
			return true;
		}
		else {
			return false;
		}
	}

	public function isLoggedIn() {
		if (empty($_SESSION['username'])) {
			return false;
		}
		
		$user = $this->users->find($this->usernameColumn, strtolower($_SESSION['username']));

		if (!empty($user) && $user[0]->{$this->passwordColumn} === $_SESSION['password']) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function getUser() {
		if ($this->isLoggedIn()) {
			return $this->users->find($this->usernameColumn, strtolower($_SESSION['username']))[0];
		}
		else {
			return false;
		}
	}
}