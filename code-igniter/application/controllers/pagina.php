<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('base_model', 'apelido');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $dados['menuarray'] = $this->config_model->get_menu();
        
        $dados['titulo'] = 'Gumb site para teste MVC';
		$this->load->view('home',$dados);
    }
}
