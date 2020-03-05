<!doctype html>
<html lang="pt-br">
  <head>
    <title>Index</title>
    <link rel="stylesheet" href=" <?= base_url("css/bootstrap.css")?>">
    <link rel="stylesheet" href="http://localhost/CI/assets/css/estilo.css">
    <link rel="shortcut icon" href="http://localhost/CI/assets/img/icon.ico" />
<style>
@font-face {
    font-family: premiersans;
    src: url("..//fonts/PremierSans.otf");
}

body{
    font-family: premiersans;
}

</style>

  </head>
  
  <body>

  <nav class="navbar">
  <a class="navbar-brand" href="#">
      <img src="http://localhost/CI/assets/img/estoque.png" class="brand_logo" alt="Logo">
  </a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-light my-5 my-sm-2" type="submit">Pesquisar</button>
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


  <?php if($this->session->userdata("usuario_logado")) : ?>

        <div class="card">
        <h1 class="text-center">Produtos</h1>
        <table class="table-bordered table-hover">
        <tr>
            <td class="text-center">Nome</td>
            <td class="text-center" >Descrição</td>
            <td class="text-center">Preço</td> 
            <td class="text-center">Deletar</td>
        </tr>
        <?php foreach ($produtos as $produto) : ?>
        <tr>
            <td class="text-center"><?= $produto ['NOME'] ?></td>
            <td class="text-center"><?= $produto ['DESCRICAO'] ?></td>
            <td class="text-center">R$ <?= ($produto ['PRECO']) ?></td>
            <td class="text-center"><a href= "<?= base_url('produtos/delete/' .$produto['ID']); ?>" class="btn btn-danger">X</a></td>
        </tr>
        <?php endforeach ?>
        </table>
        
        </div>
       <br>
       <?= anchor("produtos/formulario", "Cadastrar Produtos", array("class" => " btn-cad btn btn-dark") ) ?>


        <?= anchor("login/logout", "Sair", array("class" => " btn-sair btn btn-dark")) ?>
  <?php else : ?>

        <div class="card">
        <h1 class="text-center">Login</h1>
        <?php
        echo form_open("login/autenticar");

        echo form_label("Login","login");
        echo form_input(array(
            "name" => "login",
            "id" => "login",
            "class" => "form-control",
            "maxlength" => "255"
        ));
        echo form_label("Senha","senha");
        echo form_password(array(
            "name" => "senha",
            "id" => "senha",
            "class" => "form-control",
            "maxlength" => "255"
        ));
  
        echo form_button(array(
          "class"=>"btn btn-dark",
          "type"=>"submit",
          "content"=>"Entrar"

        ));

        echo form_close();
        
        ?>
      </div>

        <br>



        <div class="card">
        <h1 class="text-center">Cadastro</h1>
        <?php
        echo form_open("usuarios/novo");

        echo form_label("Nome","nome");
        echo form_input(array(
            "name" => "nome",
            "id" => "nome",
            "class" => "form-control",
            "maxlength" => "255"
        ));
        echo form_label("Login","login");
        echo form_input(array(
            "name" => "login",
            "id" => "login",
            "class" => "form-control",
            "maxlength" => "255"
        ));
        echo form_label("Senha","senha");
        echo form_password(array(
            "name" => "senha",
            "id" => "senha",
            "class" => "form-control",
            "maxlength" => "255"
        ));
  
        echo form_button(array(
          "class"=>"btn btn-dark",
          "type"=>"submit",
          "content"=>"Cadastrar"

        ));

        echo form_close();
        ?>
        <?php endif ?>
      </div>
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
</html>