<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index()
	{
		$this->load->model("produtos_model");
		$lista = $this->produtos_model->buscaTodos();
		$dados = array ("produtos" => $lista);
		$this->load->view('produtos/index', $dados);
	}

	public function formulario(){
		$this->load->view('produtos/formulario');
	}

	public function novo(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome","nome","required");
		$this->form_validation->set_rules("descricao","descricao","required");
		$this->form_validation->set_rules("preco","preco","required");

		$sucesso = $this->form_validation->run();
		if($sucesso){

		$usuarioId = $this->session->userdata("usuario_logado");
		$produto = array(
			"NOME" => $this->input->post("nome"),
			"PRECO" => $this->input->post("preco"),
			"DESCRICAO" => $this->input->post("descricao"),
			"ID" => $usuarioId['id']

		);
		$this->load->model('produtos_model');
		$this->produtos_model->salva($produto);
		$this->session->set_flashdata("success","Produto Cadastrado com sucesso!!");
		redirect('/');

		}
		else
		{
			$this->session->set_flashdata("danger","Favor inserir valores nos campos!!");
			$this->load->view('produtos/formulario');
			
		}


	}


	public function detalhe(){
		$id = $this->input->get('ID');
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->retorna($id);
		$dados = array("PRODUTO" => $produto);
	}


	public function delete($id){
		$this->load->model("produtos_model");
		$this->produtos_model->deletar_produto($id);
		redirect('produtos/index');	
	}
	
}
