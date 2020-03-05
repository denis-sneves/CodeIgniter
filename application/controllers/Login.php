<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function autenticar()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("login","login","required");
		$this->form_validation->set_rules("senha","senha","required");
		$sucesso = $this->form_validation->run();

		if($sucesso){

		$this->load->model("usuarios_model");
		$login = $this->input->post("login");
		$senha = $this->input->post("senha");
		$usuario = $this->usuarios_model->logarUsuarios($login, $senha);

		if($usuario){
			$this->session->set_userdata("usuario_logado", $usuario);
			$this->session->set_flashdata("success","Logado com Sucesso!!");
		}	
		else
		{
			$this->session->set_flashdata("danger","Usuário ou senha inválidos!!");	
		}

		redirect('/');

		}
		else
		{
			$this->session->set_flashdata("danger", "Favor inserir valores nos campos!!");
		}
		redirect('/');
	}

	public function logout(){
		$this->session->unset_userdata("usuario_logado");
		$this->session->set_flashdata("success","Deslogado com sucesso!!");
		redirect('/');
	}
		
}
