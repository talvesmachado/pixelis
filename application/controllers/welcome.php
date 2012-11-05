<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			$data['title'] = 'Home page';																			// title of the page (use in the template.php)
			$data['content_tpl'] = "welcome_message";																// the view yout whant to use for the content display
/*
			$data['scripts_css'] = array('css/mySStyle.css');														// css file you whant to hadd to the template
			$data['scripts_css_inline'] = 'body { text-align: center; margin:0px, etc...}';							// style you whant to hadd to the template
 			$data['scripts_js'] = array('js/myScript.js');															// js file you whant to hadd to the template
 			$data['scripts_js_inline'] = "alert('heLlO WOrLd')";													// Scripts you whant to hadd to the template
*/

			$this->load->view('template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */