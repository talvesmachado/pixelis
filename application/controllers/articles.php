<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class articles extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('articles_model');
	}
	
	public function index()
	{
			$data['title'] = 'Articles';																			// title of the page (use in the template.php)
			$data['content_tpl'] = "articles";																// the view yout whant to use for the content display

			$data['articles'] = $this->articles_model->get_articles();
						
			$this->load->view('template', $data);
	}
	public function articles_template($nid)
	{
			$data['title'] = 'article';
			$node = $this->articles_model->get_article($nid);
			if($node)
			{
				$data['node'] = $node;
			}
			else
			{
				show_404('page');
			};
			$data['content_tpl'] = "articles_template";
			
			
			$this->load->view('template', $data);
	}
	
	/*
	 * Formulaire d'ajout d'un article
	 */
	public function articles_add() {
		if ($this -> users_model -> isLoggedIn()) {
			$data['title'] = 'add Articles';
			
			$data['form_additional_inputs_hidden'] =  array(
              'uid'  => $this -> session -> userdata('uid')
            );

			$this -> form_validation -> set_rules('titre', 'Titre', 'trim|required|min_length[5]|xss_clean');
			$this -> form_validation -> set_rules('body', 'Body', 'trim|xss_clean');
			$data['content_tpl'] = "articles_add";
			
			if ($this -> form_validation -> run() == FALSE) {
				$data['content_tpl'] = "articles_add";
			} else {
				$titre = $this -> input -> post('titre');
				$body = $this -> input -> post('body');
				$uid = $this -> input -> post('uid');

				$myvar = $this -> articles_model -> set_articles($titre, $body, $uid);
				
				if ($myvar) {
					$this -> form_validation -> set_message('Validation réussie');
				} else {
					$this -> form_validation -> set_message('ERROR');
				}
			}
			$this -> load -> view('template', $data);
		} else {
			redirect(base_url(), 'refresh');
		};
	}
	
}