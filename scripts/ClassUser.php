<?php

class User {

	public $id;
	public $email;
	public $password;
	public $name;
	public $company;
	public $phone;
	public $description;
	public $profile_file;
	public $isActive;
	public $code;
	//public $isLoggedIn = false;
		
	function __construct() {
		if (session_id() == "") {
		session_start();
		}
		if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
		$this->_initUser();
		}
	} //end __construct

public function authenticate($user,$pass) {
			$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		$safeUser = $mysqli->real_escape_string($user);
		$incomingPassword = $mysqli->real_escape_string($pass);
		$query = "SELECT * from user WHERE email = '{$safeUser}'";
		
		if (!$result = $mysqli->query($query)) {
			error_log("Cannot retrieve account for {$user}");
			return false;
		}
		// Will be only one row, so no while() loop needed
		$row = $result->fetch_assoc();
		$dbPassword = $row['password'];
		
		if ($incomingPassword !=$dbPassword) {
			error_log("Passwords for {$user} don't match");
			return false;
			}

		$this->id = $row['id'];
		$this->email = $row['email'];
		$this->password = $row['password'];
		$this->name = $row['name'];
		$this->company = $row['company'];
		$this->phone = $row['phone'];
		$this->description = $row['description'];
		$this->profile_file = $row['profile_file'];
		$this->isActive = $row['isActive'];
		$this->code = $row['code'];
		$this->isLoggedIn = true;
		$this->_setSession();
		return true;
	} //end function authenticate */

	private function _setSession() {
			
			$_SESSION['id'] = $this->id;
			$_SESSION['email'] = $this->email;
			$_SESSION['password'] = $this->password;
			$_SESSION['name'] = $this->name;
			$_SESSION['company'] = $this->company;
			$_SESSION['phone'] = $this->phone;
			$_SESSION['description'] = $this->description;
			$_SESSION['email'] = $this->email;
			$_SESSION['profile_file'] = $this->profile_file;
			$_SESSION['isActive']=$this->isActive;
			$_SESSION['code']= $this->code;
			$_SESSION['isLoggedIn'] = $this->isLoggedIn;
	} //end function setSession

	private function _initUser() {
		
			$this->id = $_SESSION['id'];
			$this->email = $_SESSION['email'];
			$this->password = $_SESSION['password'];
			$this->name = $_SESSION['name'];
			$this->company = $_SESSION['company'];
			$this->phone = $_SESSION['phone'];
			$this->description = $_SESSION['description'];
			$this->profile_file = $_SESSION['profile_file'];
			$this->isActive = $_SESSION['isActive'];
			$this->code = $_SESSION['code'];
			$this->isLoggedIn = $_SESSION['isLoggedIn'];
	} //end function initUser


	public function logout() {
		$this->isLoggedIn = false;
		if (session_id() == '') {
		session_start();
		}
		$_SESSION['isLoggedIn'] = false;
		foreach ($_SESSION as $key => $value) {
		$_SESSION[$key] = "";
		unset($_SESSION[$key]);
		}
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
		$cookieParameters = session_get_cookie_params();
		setcookie(session_name(), '', time() - 28800,
		$cookieParameters['path'],
		$cookieParameters['domain'],
		$cookieParameters['secure'],
		$cookieParameters['httponly']);
		} //end if
		session_destroy();
		//header("Location: login.php");
	} //end function logout





} //end class User

