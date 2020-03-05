<?php

class Produtos_model extends CI_Model{
    public function buscaTodos(){
        return $this->db->get("PRODUTOS")->result_array();
    }

    public function salva($produto){
        $this->db->insert("PRODUTOS",$produto);
    }

    public function deletar_produto($id){
        $this->db->delete('PRODUTOS');
        return TRUE;
    }
}