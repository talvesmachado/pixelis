<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function get_users() {
		$query = $this -> db -> get('users');
		return $query -> result();
	}
	/*
	 * 		Methode de login
	 */
	function validCredentials($username, $password) {

		$q = "SELECT * FROM users WHERE name = ? AND pass = ?";
		$data = array($username, $password);

		$q = $this -> db -> query($q, $data);

		if ($q -> num_rows() > 0) {
			$r = $q -> result();
			$session_data = array('username' => $r[0] -> name, 'logged_in' => true, 'uid' => $r[0] -> uid);
			$this -> session -> set_userdata($session_data);
			return true;
		} else {
			return false;
		}
	}
	/*
	 * 		Methode de logout
	 */
	function logout() {
		$this -> session ->unset_userdata('username');
		$this -> session ->unset_userdata('uid');
		
		$session_data = array('logged_in' => false);
		$this -> session -> set_userdata($session_data);
		return true;
	}
	/*
	 * 		Methode d'ajout d'utilisateur
	 */
	public function set_user($username, $password, $email) {
		$data = array('name' => $username, 'pass' => $password, 'mail' => $email);
		$query = $this -> db -> insert('users', $data);
		return $query;
	}
	/*
	 * 		Methode de vérification du login
	 */
	public function isLoggedIn() {
		if ($this -> session -> userdata('logged_in')) {
			return true;
		} else {
			return false;
		}
	}
}
