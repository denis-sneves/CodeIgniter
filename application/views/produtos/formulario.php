<!doctype html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href=" <?= base_url("css/bootstrap.css")?>">
    <link rel="stylesheet" href="http://localhost/CI/assets/css/estilo.css">
    <link rel="shortcut icon" href="http://localhost/CI/assets/img/icon.ico" />
<style>
@font-face {
    font-family: premiersans;
    src: url("../../fonts/PremierSans.otf");
}

body{
    font-family: premiersans;
}

.btnv{
  float : right;
  width : 8%;
}

</style>

  </head>
  
  
  <body>

  <nav class="navbar navbar-success">
  <a class="navbar-brand" href="#">
      <img src="http://localhost/CI/assets/img/estoque.png" class="brand_logo" alt="Logo">
  </a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button id="btn-nav" class="btn btn-outline-light my-5 my-sm-2" type="submit">Pesquisar</button>
    </form>
  </nav>
    <br>

  <div class="container">

  <?php if($this->session->flashdata("success")) : ?>
  <p class="alert alert-success"> <?= $this->session->flashdata("success") ?></p>
  <?php endif ?>

  <?php if($this->session->flashdata("danger")) : ?>
  <p class="alert alert-danger"> <?= $this->session->flashdata("danger") ?> </p>
  <?php endif ?>

        <div class="card ">
        <h1 class="text-center">Cadastro de Produtos</h1>
        <?php
        echo form_open("produtos/novo");

        echo form_label("Nome","nome");
        echo form_input(array(
            "name" => "nome",
            "id" => "nome",
            "class" => "form-control",
            "maxlength" => "255"
        ));
        echo form_label("Preço","preco");
        echo form_input(array(
            "name" => "preco",
            "id" => "preco",
            "class" => "form-control",
            "maxlength" => "255"
        ));
        echo form_label("Descrição","descricao");
        echo form_textarea(array(
            "name" => "descricao",
            "id" => "descricao",
            "class" => "form-control",
            "maxlength" => "255"
        ));
        ?>
        <br>
        <?php
        echo form_button(array(
            "class"=>"btn btn-dark",
            "type"=>"submit",
            "content"=>"Cadastrar"
  
          ));

        echo form_close();
        
        ?>
      </div>
      <?= anchor("produtos/index", "Voltar", array('class'=>'btn btn-dark btnv'));?>
      <br>
  </div>

  <br><br>
 <section id="footer">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>Sistema de Estoque</p>
					<p class="h6">&copy Denis Neves.</p>
            </div>
			</div>	
		</div>
	</section>
  
  </body>