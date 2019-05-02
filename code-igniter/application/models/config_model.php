<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

	function __construct(){
		parent::__construct();
		//$this->load->model('base_model', 'apelido');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    public function get_menu()
	{
        $this->db->from('menu');
        $this->db->where('ativo',1);
        return $this->db->get()->result();
        /*$this->db->where('ativo',1);
        $query = $this->db->get('menu');
        if($query->num_rows()>1){
            $row = $query->row();
            return array($row->nome);
        }else{
            return 0;
        }*/
    }
    public function icu($iduser, $idconquista, $progresso){
        $this->db->where('idusuario',$iduser);
        $this->db->where('idconquista',$idconquista);
        $query = $this->db->get('user_conquista', 1);
        if($query->num_rows()==0){//verifica se o usuario ja tem essa conquista
            $xp = $this->get_xp_conquista($idconquista);//pega o xp da conquista
            $this->altera_xp($iduser,$xp);
            
            $dados = array(
                'idusuario' => $iduser,
                'idconquista' => $idconquista,
                'progresso' => $progresso
            );
            $this->db->insert('user_conquista',$dados);//insere nova conquista

            return $this->db->insert_id();
        }
        return 0;
    }
    public function get_xp_conquista($idconquista)
    {
        $this->db->where('id',$idconquista);
        $query = $this->db->get('conquista');
        $row = $query->row();
        return $row->xpconqui;
    }
    public function get_xp_usuario($iduser)
    {
        $this->db->where('idusuario',$iduser);
        $query = $this->db->get('usuario_jogo');
        $row = $query->row();
        return $row->xp;
    }
    public function altera_xp($iduser,$xp){
        $xpusuario = $this->get_xp_usuario($iduser);
        $xptotal = $xpusuario + $xp;
        $dados2 = array(
            'xp' => $xptotal
        );
        $this->db->where('idusuario', $iduser);
        $this->db->update('usuario_jogo', $dados2);
    }
    public function get_conquista($id)
	{
        /*$this->db->where('id',$id);
        $query = $this->db->get('conquista', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return array($row->id,$row->nomeconqui,$row->xpconqui,$row->descricao);
        }else{
            return 0;
        }*/
        $this->db->select('nomeconqui,descricao,xpconqui,imagem,ativo');
        $this->db->from('conquista');
        $this->db->join('user_conquista','conquista.id=user_conquista.idconquista');
        $this->db->where('visualizado',0);
        $this->db->where('user_conquista.idusuario',$id);
        return $this->db->get()->result();
    }
    public function vcu($id)
	{
        $this->db->where('idusuario',$id);
        $this->db->where('visualizado',0);
        $query = $this->db->get('user_conquista', 1);
        if($query->num_rows()==1){
            $row = $query->row();
            return $row->idconquista;
        }else{
            return 0;
        }
    }
    public function attvisu($id)
	{
        $this->db->where('idusuario', $id);
        $dados = array(
            'visualizado' => 1
        );
        $this->db->update('user_conquista',$dados);
    }

}