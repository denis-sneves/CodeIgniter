<?php

class Usuarios_model extends CI_Model
{

    public function salva($usuario){
        $this->db->insert("USUARIO", $usuario);

    }

    public function logarUsuarios($login, $senha){
        $this->db->where("LOGIN",$login);
        $this->db->where("SENHA",$senha);
        $usuario = $this->db->get("USUARIO")->row_array();
        return $usuario;
    }
}