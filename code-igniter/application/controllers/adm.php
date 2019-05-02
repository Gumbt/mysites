<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('base_model', 'apelido');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('adm_model','adm');
    }

	public function index()
	{   
        verifica_login();
        verifica_permissao();
        $dados['menuarray'] = $this->config_model->get_menu();

        //if($this->userml->get_usuario($))
        $dados['titulo'] = 'Pagina do Administrador';
		$this->load->view('adm/home',$dados);
    }
    public function conquistas()
	{   
        verifica_login();
        verifica_permissao();
        $dados['menuarray'] = $this->config_model->get_menu();

        //if($this->userml->get_usuario($))
        $dados['allconquistas'] = $this->adm->get_conquistas();
        $dados['titulo'] = 'Conquistas';
		$this->load->view('adm/conquistas',$dados);
    }
    public function usuarios(){
        verifica_login();
        verifica_permissao();

        $dados['menuarray'] = $this->config_model->get_menu();

        
        $dados['allusers'] = $this->adm->get_allusers();
        $dados['titulo'] = 'Usuários';
        $this->load->view('adm/usuarios',$dados);
    }
    public function menu(){
        verifica_login();
        verifica_permissao();

        $dados['menuarray'] = $this->config_model->get_menu();
        
        $dados['allmenu'] = $this->adm->get_all_menu();
        $dados['titulo'] = 'Editar menu';
        $this->load->view('adm/menu',$dados);
    }
    public function novomenu(){
        verifica_login();
        verifica_permissao();

        $dados['menuarray'] = $this->config_model->get_menu();

        $this->form_validation->set_rules('nome', 'nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('local', 'local', 'trim');
        $this->form_validation->set_rules('permissao', 'permissao', 'trim|required');
        $this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            }
        }else{
            $dados_form = $this->input->post();
            $id_menu = $this->adm->insere_menu($dados_form['nome'],$dados_form['local'], $dados_form['permissao'],$dados_form['ativo']);
            if($id_menu > 0){//usuario cadastrado
                redirect('adm/menu');
            }else{
                set_msg('<div class="alert alert-danger" role="alert">Não foi possivel cadastrar o menu</div>');
            }
        }
        $dados['titulo'] = 'Novo menu';
        $this->load->view('adm/novomenu',$dados);
    }
    public function novaconquista(){
        verifica_login();
        verifica_permissao();

        $dados['menuarray'] = $this->config_model->get_menu();

        $this->form_validation->set_rules('nomeconqui', 'nomeconqui', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('xpconqui', 'xpconqui', 'trim');
        $this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
        $this->form_validation->set_rules('ativo', 'ativo', 'trim|required');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            }
        }else{
            $dados_form = $this->input->post();
            $id_conqu = $this->adm->insere_conquista($dados_form['nomeconqui'],$dados_form['xpconqui'], $dados_form['descricao'],$dados_form['ativo'],$dados_form['imagem']);
            if($id_conqu > 0){//usuario cadastrado
                redirect('adm/conquistas');
            }else{
                set_msg('<div class="alert alert-danger" role="alert">Não foi possivel cadastrar a conquista</div>');
            }
        }
        $dados['titulo'] = 'Nova Conquista';
        $this->load->view('adm/novaconquista',$dados);
    }
    public function editarmenu(){
        verifica_login();
        verifica_permissao();
        $dados['menuarray'] = $this->config_model->get_menu();

        
        if($this->uri->segment(4)){
            $dados['idmenu'] = $this->uri->segment(4);
        }
        $array = $this->adm->get_menu_complete($dados['idmenu']);
        if($array != 0){
            $dados['found'] = 1;
            $dados['id'] = $array[0];
            $dados['nome'] = $array[1];
            $dados['local'] = $array[2];
            $dados['permissao'] = $array[3];
            $dados['ativo'] = $array[4];
        }else{
            $dados['found'] = 0;
        }
        $this->form_validation->set_rules('nome', 'nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('local', 'local', 'trim');
        $this->form_validation->set_rules('permissao', 'permissao', 'trim|required');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            }
        }else{
            $dados_form = $this->input->post();
            $verifica = $this->adm->update_menu($dados['idmenu'],$dados_form['nome'],$dados_form['local'], $dados_form['permissao']);
            if($verifica > 0){//usuario cadastrado
                set_msg('<div class="alert alert-success" role="alert">Editado com sucesso</div>');
                redirect('adm/menu');
            }else{
                set_msg('<div class="alert alert-danger" role="alert">Não foi possivel editar o menu</div>');
            }
        }
        $dados['titulo'] = 'Editar menu';
        $this->load->view('adm/editarmenu',$dados);
    }
    public function editarusuario(){
        verifica_login();
        verifica_permissao();
        $dados['menuarray'] = $this->config_model->get_menu();

        
        if($this->uri->segment(4)){
            $dados['idusuario'] = $this->uri->segment(4);
        }
        $array = $this->adm->get_usuario_complete($dados['idusuario']);
        if($array != 0){
            $dados['found'] = 1;
            $dados['id'] = $array[0];
            $dados['nome'] = $array[1];
            $dados['email'] = $array[2];
            $dados['cargo'] = $array[3];
        }else{
            $dados['found'] = 0;
        }
        $this->form_validation->set_rules('nome', 'nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            }
        }else{
            $dados_form = $this->input->post();
            $verifica = $this->adm->update_usuario($dados['id'],$dados_form['nome'],$dados_form['email'], $dados_form['cargo']);
            if($verifica > 0){//usuario cadastrado
                set_msg('<div class="alert alert-success" role="alert">Editado com sucesso</div>');
                redirect('adm/usuarios');
            }else{
                set_msg('<div class="alert alert-danger" role="alert">Não foi possivel editar o usuario</div>');
                redirect('adm/usuarios');
            }
        }
        $dados['titulo'] = 'Editar usuario';
        $this->load->view('adm/editarusuario',$dados);
    }
    public function editarconquista(){
        verifica_login();
        verifica_permissao();
        $dados['menuarray'] = $this->config_model->get_menu();
        
        if($this->uri->segment(4)){
            $dados['id'] = $this->uri->segment(4);
        }
        $array = $this->adm->get_conquista_complete($dados['id']);
        if($array != 0){
            $dados['found'] = 1;
            $dados['id'] = $array[0];
            $dados['nomeconqui'] = $array[1];
            $dados['xpconqui'] = $array[2];
            $dados['descricao'] = $array[3];
            $dados['ativo'] = $array[4];
            $dados['imagem'] = $array[5];
        }else{
            $dados['found'] = 0;
        }
        $this->form_validation->set_rules('nomeconqui', 'nomeconqui', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('xpconqui', 'xpconqui', 'trim|required');
        $this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
        $this->form_validation->set_rules('imagem', 'imagem', 'trim|required');
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                set_msg('<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            }
        }else{
            $dados_form = $this->input->post();
            $verifica = $this->adm->update_conquista($dados['id'],$dados_form['nomeconqui'],$dados_form['xpconqui'], $dados_form['descricao'],$dados_form['imagem']);
            if($verifica > 0){//usuario cadastrado
                set_msg('<div class="alert alert-success" role="alert">Editado com sucesso</div>');
                redirect('adm/conquistas');
            }else{
                set_msg('<div class="alert alert-danger" role="alert">Não foi possivel editar a conquista</div>');
            }
        }
        $dados['titulo'] = 'Editar conquista';
        $this->load->view('adm/editarconquista',$dados);
    }
    public function alterarstatus(){
        $dadosmenu = $this->input->post();
        $verifica = $this->adm->update_ativo($dadosmenu['idmenu'],$dadosmenu['ativo']);
        echo json_encode(array('success' => 'success','status' => $verifica));
    }
    public function excluirconquista(){
        $dados = $this->input->post();
        $verifica = $this->adm->excluir_conquista($dados['id']);
        if($verifica==1)
            echo json_encode(array('success' => 'success'));
        else
            echo json_encode(array('success' => 'false'));
    }
    public function excluirusuario(){
        $dadosusuario = $this->input->post();
        $verifica = $this->adm->excluir_usuario($dadosusuario['id']);
        if($verifica==1)
            echo json_encode(array('success' => 'success'));
        else
            echo json_encode(array('success' => 'false'));
    }
    public function excluirmenu(){
        $dadosmenu = $this->input->post();
        $verifica = $this->adm->excluir_menu($dadosmenu['id']);
        if($verifica==1)
            echo json_encode(array('success' => 'success'));
        else
            echo json_encode(array('success' => 'false'));
    }
    public function usuarioconquista(){
        $dados = $this->input->post();
        if($this->config_model->icu($dados['iduser'],$dados['idconquista'],100))
            echo json_encode(array('success' => 'success'));
        else
            echo json_encode(array('success' => 'false'));
    }
}