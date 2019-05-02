<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_model extends CI_Model {

	function __construct(){
		parent::__construct();
		//$this->load->model('base_model', 'apelido');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    public function get_allusers()
	{
        $this->db->select('usuario.nome,email,usuario.id,cargo.nome AS cargonome');
        $this->db->from('usuario');
        $this->db->join('cargo','usuario.cargo=cargo.id');
        return $this->db->get()->result();

    }
    public function insere_menu($nome, $local, $permissao, $ativo){
        $dados = array(
            'nome' => $nome,
            'local' => $local,
            'permissao' => $permissao,
            'ativo' => $ativo
        );
        $this->db->insert('menu',$dados);
        return $this->db->insert_id();
    }
    public function insere_conquista($nomeconqui, $xpconqui, $descricao, $ativo, $imagem){
        $dados = array(
            'nomeconqui' => $nomeconqui,
            'xpconqui' => $xpconqui,
            'descricao' => $descricao,
            'ativo' => $ativo,
            'imagem' => $imagem
        );
        $this->db->insert('conquista',$dados);
        return $this->db->insert_id();
    }

    public function update_menu($id, $nome, $local, $permissao){
        $this->db->where('idmenu',$id);
        $query = $this->db->get('menu', 1);
        if($query->num_rows()==1){//se encontrar usuario atualiza
            $dados = array(
                'nome' => $nome,
                'local' => $local,
                'permissao' => $permissao
            );
            $this->db->where('idmenu', $id);
            $this->db->update('menu', $dados);//atualizar array
            return 1;
        }else{
            return 0;
        }
    }
    public function get_all_menu()
	{
        $this->db->from('menu');
        return $this->db->get()->result();
    }
    public function get_menu_complete($id)
	{
        $this->db->where('idmenu',$id);
        $query = $this->db->get('menu', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return array($row->idmenu,$row->nome,$row->local,$row->permissao,$row->ativo);
        }else{
            return 0;
        }
    }
    public function get_conquista_complete($id)
	{
        $this->db->where('id',$id);
        $query = $this->db->get('conquista', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return array($row->id,$row->nomeconqui,$row->xpconqui,$row->descricao,$row->ativo,$row->imagem);
        }else{
            return 0;
        }
    }
    public function get_conquistas()
	{
        $this->db->from('conquista');
        return $this->db->get()->result();
    }
    public function update_ativo($id, $status){
        if($status==1){
            $status = 0;
        }else{
            $status = 1;
        }
        $this->db->where('idmenu',$id);
        $query = $this->db->get('menu', 1);
        if($query->num_rows()==1){//se encontrar usuario atualiza
            $dados = array(
                'ativo' => $status
            );
            $this->db->where('idmenu', $id);
            $this->db->update('menu', $dados);//atualizar array
            return $status;
        }else{
            return 0;
        }
    }
    public function get_usuario_complete($id)
	{
        $this->db->where('id',$id);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return array($row->id,$row->nome,$row->email,$row->cargo);
        }else{
            return 0;
        }
    }
    public function update_usuario($id, $nome, $email, $cargo){
        $this->db->where('id',$id);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){//se encontrar usuario atualiza
            $dados = array(
                'nome' => $nome,
                'email' => $email,
                'cargo' => $cargo
            );
            $this->db->where('id', $id);
            $this->db->update('usuario', $dados);//atualizar array
            return 1;
        }else{
            return 0;
        }
    }
    public function update_conquista($id, $nomeconqui, $xpconqui, $descricao, $imagem){
        $this->db->where('id',$id);
        $query = $this->db->get('conquista', 1);
        if($query->num_rows()==1){//se encontrar usuario atualiza
            $dados = array(
                'nomeconqui' => $nomeconqui,
                'xpconqui' => $xpconqui,
                'descricao' => $descricao,
                'imagem' => $imagem
            );
            $this->db->where('id', $id);
            $this->db->update('conquista', $dados);//atualizar array
            return 1;
        }else{
            return 0;
        }
    }
    public function excluir_usuario($id){
        $this->db->where('id', $id);
        $this->db->delete('usuario');
        return 1;
    }
    public function excluir_menu($id){
        $this->db->where('idmenu', $id);
        $this->db->delete('menu');
        return 1;
    }
    public function excluir_conquista($id){
        $this->db->where('id', $id);
        $this->db->delete('conquista');
        return 1;
    }

}