<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('set_msg')){
    function set_msg($msg=NULL){
        $ci = & get_instance();
        $ci->session->set_userdata('aviso', $msg);
    }
}

if(!function_exists('get_msg')){
    function get_msg($destroy=TRUE){
        $ci = & get_instance();
        $retorno = $ci->session->userdata('aviso');
        if($destroy) $ci->session->unset_userdata('aviso');
        return $retorno;
    }
}
if(!function_exists('verifica_login')){
    function verifica_login($redirect='usuario/login'){
        $ci = & get_instance();
        if($ci->session->userdata('logged') != TRUE){
            set_msg("<p>Acesso restrito!</p>");
            redirect($redirect,'refresh');
        }/*else{
            $id = $ci->session->userdata('id');
            $ci->db->where('idusuario',$id);
            $ci->db->where('visualizado',0);
            $ci->db->where('progresso',100);
            $ci->db->from('user_conquista');
            return $ci->db->get()->result();
        }*/
    }
}
if(!function_exists('verifica_permissao')){
    function verifica_permissao($redirect='/'){
        $ci = & get_instance();
        if($ci->session->userdata('cargo') == 1){
            set_msg("<p>Acesso restrito!</p>");
            redirect($redirect,'refresh');
        }
    }
}
if(!function_exists('verifica_lg')){
    function verifica_lg($redirect='usuario/perfil'){
        $ci = & get_instance();
        if($ci->session->userdata('logged') == TRUE){
            redirect($redirect,'refresh');
        }
    }
}
if(!function_exists('attlvl')){
    function attlvl($id){
        $ci = & get_instance();
        //$id = $ci->session->userdata('id');
        $ci->db->where('idusuario',$id);
        $ci->db->from('usuario_jogo');
        $query = $ci->db->get();
        if($query->num_rows()==1){
            $row = $query->row();
            $lvl = substr($row->xp,0,strlen($row->xp)-3);
            $dados = array(
                'level' => $lvl
            );
            $ci->db->where('idusuario', $id);
            $ci->db->update('usuario_jogo', $dados);//atualizar array
        }
        
    }
}