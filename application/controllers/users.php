<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Users extends CI_Controller {
	/*
	 * Controller de gestion de connexion et création d'utilisateurs
	 */
	public function __construct() {
		parent::__construct();
	}

	/*
	 * "/users" envoie vers le formulaire de login OU la home si l'utilisateur est deja logué
	 */
	public function index() {
		if (!$this -> users_model -> isLoggedIn()) {
			$data['title'] = 'Users';
			$password = $this -> input -> post('password');
			$password = do_hash($password, 'md5');
			
			$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[5]|xss_clean|callback_username_check['.$password.']');
			$this -> form_validation -> set_rules('password', 'Password', 'trim|required|md5');
			if ($this -> form_validation -> run() == FALSE) {
				$data['content_tpl'] = "users";
			} else {
				redirect(base_url(), 'refresh');
			}
			$this -> load -> view('template', $data);
		} else {
			redirect(base_url(), 'refresh');
		};
	}

	/*
	 *  Methode de logout avec redirection vers la Home page
	 */
	public function users_logout() {

		$this -> users_model -> logout();
		redirect('', 'refresh');
	}

	/*
	 * Formulaire d'ajout d'un utilisateur
	 */
	public function users_add() {
		if ($this -> users_model -> isLoggedIn()) {
			$data['title'] = 'add Users';
			$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[users.name]|xss_clean');
			$this -> form_validation -> set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
			$this -> form_validation -> set_rules('passconf', 'Password Confirmation', 'trim|required');
			$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.mail]');
			if ($this -> form_validation -> run() == FALSE) {
				$data['content_tpl'] = "users_add";
			} else {
				$username = $this -> input -> post('username');
				$password = $this -> input -> post('password');
				$email = $this -> input -> post('email');
				$myvar = $this -> users_model -> set_user($username, $password, $email);
				if ($myvar) {
					$this -> form_validation -> set_message('Validation réussie');
					$data['content_tpl'] = "users_success";
				} else {
					$this -> form_validation -> set_message('ERROR');
					$data['content_tpl'] = "users_add";
				}
			}
			$this -> load -> view('template', $data);
		} else {
			redirect('users', 'refresh');
		};
	}
	/*
	 * Methode de validation du nom de formulaire login
	 */
	public function username_check($paramDefault,$param2) {
		$validCredentials = $this -> users_model -> validCredentials($paramDefault,$param2);
		if ($validCredentials) {
			return TRUE;
		} else {
			$this -> form_validation -> set_message('username_check', 'Login et/ou mot de passe incorrect');
			return FALSE;
		};
	}

}
