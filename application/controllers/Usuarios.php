<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function novo()
	{
        
        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome","nome","required");
        $this->form_validation->set_rules("login","login","required");
        $this->form_validation->set_rules("senha","senha","required");
        $sucesso = $this->form_validation->run();
        if($sucesso){
   

        $usuario = array(
            
            "NOME" => $this->input->post("nome"),
            "LOGIN" => $this->input->post("login"),
            "SENHA" => $this->input->post("senha")
        );
    
        $this->load->model("usuarios_model");
        $this->usuarios_model->salva($usuario);
        $this->session->set_flashdata("success", "Usuário Cadastrado com sucesso!!");
		redirect('/');

        
        }
            else
        {
           
            $this->session->set_flashdata("danger", "Favor inserir valores nos campos!!");
        }
        redirect('/');  

	}
}
