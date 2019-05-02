<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('base_model', 'apelido');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('usuario_model','userml');
    }

	public function index()
	{   
        //if($this->userml->get_usuario($))
        $dados['menuarray'] = $this->config_model->get_menu();
        $dados['titulo'] = 'Gumb site para teste MVC';
		$this->load->view('home',$dados);
    }
    public function login()
	{   
        verifica_lg();

        $dados['menuarray'] = $this->config_model->get_menu();

        $this->form_validation->set_rules('senha', 'senha', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            }
        }else{
            $dados_form = $this->input->post();
            $getid = $this->userml->get_usuario($dados_form['email']);
            if($this->userml->get_usuario($dados_form['email']) > 0){
                if(password_verify($dados_form['senha'], $this->userml->get_pass($dados_form['email']))){
                    $nomeusuario = $this->userml->get_nome($dados_form['email']);   
                    $array = $this->userml->get_usuario_complete($nomeusuario);               
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('nome',$nomeusuario);
                    $this->session->set_userdata('email',$dados_form['email']);
                    $this->session->set_userdata('cargo',$array[3]);
                    $this->session->set_userdata('id',$getid);
                    
                    redirect('usuario/perfil/'.$nomeusuario);
                }else{
                    //senha incorreta
                    set_msg('<div class="alert alert-danger" role="alert">Senha incorreta</div>');
                }
            }else{
                set_msg('<div class="alert alert-danger" role="alert">Email nao encontrado</div>');
            }
        }
        $dados['titulo'] = 'Pagina de login';
		$this->load->view('usuario/login',$dados);
    }
    public function registro()
	{
        verifica_lg();
        $dados['menuarray'] = $this->config_model->get_menu();

        $this->form_validation->set_rules('senha', 'senha', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('senha2', 'senha2', 'trim|required|matches[senha]|min_length[5]');
        $this->form_validation->set_rules('nome', 'nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            }
        }else{
            $dados_form = $this->input->post();
            $id_usuario = $this->userml->insere_usuario($dados_form['nome'],$dados_form['email'], password_hash(($dados_form['senha']), PASSWORD_DEFAULT));
            if($id_usuario > 0){//usuario cadastrado
                set_msg('<div class="alert alert-success" role="alert">Cadastrado com sucesso</div>');
                $this->config_model->icu($id_usuario,1,100);//insere conquista
                redirect('usuario/login');
            }else{
                set_msg('<div class="alert alert-danger" role="alert">Usuário ja existe</div>');
            }
        }
        $dados['titulo'] = 'Pagina de Registro';
		$this->load->view('usuario/registro',$dados);
    }
    public function perfil()
    {
        verifica_login();
        if($this->config_model->vcu($_SESSION['id'])){
            $dados['conquista'] = $this->config_model->get_conquista($_SESSION['id']);
            $this->config_model->attvisu($_SESSION['id']);
        }
        $dados['menuarray'] = $this->config_model->get_menu();
		
        $this->form_validation->set_rules('senha', 'senha', 'trim|min_length[5]');
        $this->form_validation->set_rules('senha2', 'senha2', 'trim|matches[senha]|min_length[5]');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">As senhas precisam ser identicas</div>');
            }
        }else{
            $dados_form = $this->input->post();
            if($dados_form['senha']==NULL && $dados_form['senha2']==NULL){
                $result = $this->userml->atualizar_usuario($dados_form['nome'],$dados_form['email'],$_SESSION['id']);
                if($result==1){
                    $this->session->set_userdata('nome',$dados_form['nome']);
                    $this->session->set_userdata('email',$dados_form['email']);
                    set_msg('<div class="alert alert-success" role="alert">Informações alteradas com sucesso</div>');
                    redirect('usuario/perfil/'.$dados_form['nome'].'/editar');
                }else{
                    set_msg('<div class="alert alert-danger" role="alert">Não foi possivel alterar os dados!</div>');
                }
            }else{
                $result = $this->userml->atualizar_senha(password_hash(($dados_form['senha']), PASSWORD_DEFAULT),$_SESSION['id']);
                if($result==1){
                    $this->session->set_userdata('nome',$dados_form['nome']);
                    $this->session->set_userdata('email',$dados_form['email']);
                    set_msg('<div class="alert alert-success" role="alert">Senha alterada com sucesso</div>');
                    redirect('usuario/perfil/'.$dados_form['nome'].'/editar');
                }else{
                    set_msg('<div class="alert alert-danger" role="alert">Não foi possivel alterar os dados!</div>');
                }
            }
        }
        if($this->uri->segment(3)){
            $dados['nomepagina'] = $this->uri->segment(3);
        }else{
            $dados['nomepagina'] = $_SESSION['nome'];
        }
        if($this->uri->segment(4)=='editar'){
            $dados['editmode'] = 1;
        }else{
            $dados['editmode'] = 0;
        }
        $array = $this->userml->get_usuario_complete($dados['nomepagina']);
        if($array != 0){
            $dados['found'] = 1;
            $dados['id'] = $array[0];
            attlvl($dados['id']);
            $dados['nm'] = $array[1];
            $dados['email'] = $array[2];
            $dados['idcargo'] = $array[3];
            $dados['lvl'] = $array[4];
            $dados['xp'] = $array[5];
            $dados['cargo'] = $this->userml->get_cargo($array[3]);
            $dados['titulo'] = 'Perfil de '.$dados['nomepagina'];
            $dados['allconquistas'] = $this->userml->get_userconquistas($dados['id']);
        }else{
            $dados['found'] = 0;
            $dados['titulo'] = 'Perfil nao encontrado';
        }
        $this->load->view('usuario/perfil',$dados);
    }
    public function logout()
    {
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('nome');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('cargo');
        set_msg('<p>Deslogado com sucesso</p>');
        redirect('usuario/login','refresh');
    }

}