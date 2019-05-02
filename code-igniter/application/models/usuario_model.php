<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function __construct(){
		parent::__construct();
		//$this->load->model('base_model', 'apelido');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

	public function get_usuario($email)
	{
        $this->db->where('email',$email);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return $row->id;
        }else{
            return 0;
        }
    }
    public function get_usuario_complete($nome)
	{
        $this->db->from('usuario');
        $this->db->join('usuario_jogo','usuario.id=usuario_jogo.idusuario');
        $this->db->where('usuario.nome',$nome);
        $query = $this->db->get();
        if($query->num_rows()==1){
            $row = $query->row();
            return array($row->id,$row->nome,$row->email,$row->cargo,$row->level,$row->xp);
        }else{
            return 0;
        }
    }
    public function get_pass($email)
	{
        $this->db->where('email',$email);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return $row->senha;
        }else{
            return 0;
        }
    }
    public function get_nome($email)
	{
        $this->db->where('email',$email);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return $row->nome;
        }else{
            return 0;
        }
    }
    public function insere_usuario($nome, $email, $senha){
        $this->db->where('email',$email);
        $this->db->or_where('nome',$nome);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){
            return 0;
        }else{//nao encontrar usuario insere
            $dados = array(
                'nome' => $nome,
                'senha' => $senha,
                'email' => $email
            );
            $this->db->insert('usuario',$dados);
            $idus= $this->db->insert_id();
            $dados2 = array(
                'idusuario' => $idus,
                'level' => 0,
                'xp' => 0
            );
            $this->db->insert('usuario_jogo',$dados2);
            return $idus;
        }
    }
    public function atualizar_usuario($nome, $email,$id){

        $where = "id !='".$id."' AND (email='".$email."' OR nome='".$nome."')";
        $this->db->where($where);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){
            return 0;
        }else{
            $this->db->where('id',$id);
            $query = $this->db->get('usuario', 1);
            if($query->num_rows()==1){//se encontrar usuario atualiza
                $dados = array(
                    'nome' => $nome,
                    'email' => $email
                );
                $this->db->where('id', $id);
                $this->db->update('usuario', $dados);//atualizar array
                return 1;
            }else{
                return 0;
            }
        }
    }
    public function atualizar_senha($senha, $id){


        $this->db->where('id',$id);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows()==1){//se encontrar usuario atualiza
            $dados = array(
                'senha' => $senha
            );
            $this->db->where('id', $id);
            $this->db->update('usuario', $dados);//atualizar array
            return 1;
        }else{
            return 0;
        }
    }
    public function get_cargo($id)
	{
        $this->db->where('id',$id);
        $query = $this->db->get('cargo', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return $row->nome;
        }else{
            return 0;
        }
    }
    public function get_userconquistas($id)
    {
        $this->db->select('nomeconqui,descricao,xpconqui,imagem');
        $this->db->from('conquista');
        $this->db->join('user_conquista','conquista.id=user_conquista.idconquista');
        $this->db->where('ativo',1);
        $this->db->where('user_conquista.idusuario',$id);
        $this->db->order_by('datahora','DESC');
        return $this->db->get()->result();
    }

}