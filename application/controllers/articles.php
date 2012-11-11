<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class articles extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('articles_model');
	}

	public function index() {
		$data['title'] = 'Articles';
		// title of the page (use in the template.php)
		$data['content_tpl'] = "articles";
		// the view yout whant to use for the content display
		$articles = $this -> articles_model -> get_articles();
		$articlesArray = array();
		
		foreach ($articles as $value)
		{
			$objImage = $this -> articles_model -> get_articles_image($value->nid);
			$value->image = ($objImage)?$objImage:false;
			if($value->image){
				
				$config['image_library'] = 'GD';
				$config['source_image'] = $value->image->uri;//base_url('uploads/'.$value->image->filename);
				$config['create_thumb'] = false;
				$config['new_image'] = 'articles-'.$value->image->filename;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 75;
				$config['height'] = 50;
				
				
				$this->image_lib->initialize($config);
				if ( ! $this->image_lib->resize())
				{
				    echo $this->image_lib->display_errors();
				}
				$this->image_lib->clear();
			}	
			
			$articlesArray[$value->nid] = $value;
		}
		$data['articles'] = $articlesArray;
		$this -> load -> view('template', $data);
	}

	public function articles_template($nid) {
		$data['title'] = 'article';
		$node = $this -> articles_model -> get_article($nid);
		if ($node) {
			$data['node'] = $node;
		} else {
			show_404('page');
		};
		$data['content_tpl'] = "articles_template";

		$this -> load -> view('template', $data);
	}

	/*
	 * Formulaire d'ajout d'un article
	 */
	public function articles_add() {
		if ($this -> users_model -> isLoggedIn()) {
			$data['title'] = 'add Articles';
			/*
			 *	Gestion BOOTSTRAP DU FIELD UPLOAD
			 */
			$data['scripts_js_inline'] = "$('input[id=inputfile]').change(function() {
   				$('#imagefile').val($(this).val());
			});";
			/*
			 *	Parametrage de field
			 */
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			$this -> load -> library('upload', $config);

			$data['form_additional_inputs_hidden'] = array('uid' => $this -> session -> userdata('uid'));

			$this -> form_validation -> set_rules('titre', 'Titre', 'trim|required|min_length[5]|xss_clean');
			$this -> form_validation -> set_rules('body', 'Body', 'trim|xss_clean');
			$this -> form_validation -> set_rules('inputfile', 'Inputfile', 'callback_validateImage');
			$data['content_tpl'] = "articles_add";

			if ($this -> form_validation -> run() == FALSE) {
				$data['content_tpl'] = "articles_add";
			} else {
				$titre = $this -> input -> post('titre');
				$body = $this -> input -> post('body');
				$uid = $this -> input -> post('uid');
				$myvar = $this -> articles_model -> set_articles($titre, $body, $uid);
				if ($myvar) {
					$this -> form_validation -> set_message('articles_add', 'Validation réussie');
					/*
					 *  FILES UPLOAD
					 */
					$doUpload = $this -> upload -> do_upload('inputfile');

					if (!$doUpload) {
						$this -> form_validation -> set_message('articles_add', "Erreur d'upload de fichier");
					} else {
						$myFile = $this -> articles_model -> add_articles_file($myvar, $this -> upload -> data());
						//krumo($myFile);
					}
				} else {
					$this -> form_validation -> set_message('articles_add', 'ERROR');
				}
			}
			$this -> load -> view('template', $data);
		} else {
			redirect(base_url(), 'refresh');
		};
	}

	function validateImage() {
		if ($_FILES['inputfile']['size'] == 0) {
			$this -> form_validation -> set_message('validateImage', 'You did not upload an image.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
