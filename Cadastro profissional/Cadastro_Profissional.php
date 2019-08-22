<!DOCTYPE html>
<html>
<head>
	<title>Build N' Fix | Cadastre-se</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>



	<div class="row mb-5 mt-5">

			<div class="col-sm-4 ml-5">
				<h1 class="display-1 ml-5" id="txtcadastro"> <strong>Construir nunca foi tão fácil. </strong></h1>
				<p class="ml-5"> Participe do Build N' Fix e encontre projetos específicos e clientes perto de você de forma rápida, segura e fácil. </p>
				<button type="button" class="btn btn-outline-dark ml-5 mt-5">Já sou cadastrado</button>
				<button type="button" class="btn btn-dark ml-5 mt-5">Voltar ao início</button>


			</div>

    		<div class="col-sm-4 ml-5">
    			<form id="formulario"  action="#" method="POST" name="formlogin">
						<input type="text" class="form-control" id="nome" name="nome"  placeholder="Nome">
						<input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
					    <input type="text" class="form-control" id="email" name="email" placeholder="email@exemplo">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="senha">
					    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
						<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
						<button type="submit" class="btn btn-primary col-md-5" name="enviar" value="Cadastrar" id="enviar">Cadastrar</button>
					</form>
					
    			</div>
    		</div>
    </div>

    <?php
                            include('conexao.php');
                    
                            if(isset($_POST['enviar'])){
                                $nome=$_POST['nome'];
                                $sobrenome=$_POST['sobrenome']; 
                                $email=$_POST['email'];
                                $senha=$_POST['senha'];
                                $senha=sha1($senha);
                                $telefone=$_POST['telefone']; 
                                $celular=$_POST['celular']; 
                                
                                $sqlpesquisa = ('select * from profissional where email = "'.$email.'"');
					
								$resul = mysqli_query($conexao,$sqlpesquisa);
			
								if (mysqli_num_rows($resul) > 0 ){
									
									echo('<script>window.alert("Usuário já cadastrado!");window.location="cadastro_profissional.php";</script>');
			
								}elseif (mysqli_num_rows($resul) == 0){

									//info profissional
									$sqlinserir_prof('insert into profissional(nome,sobrenome,email,senha,telefone,celular) values ("'.$nome.'","'.$sobrenome.'","'.$email.'","'.$senha.'",'.$telefone.','.$celular.')');
									
									$inserir = mysqli_query($conexao,$sqlinserir_prof);

									// cidade e estado tem que rever
								}elseif ($nome ==" " || $sobrenome == " " || $email == " " || $telefone == " " || $celular == " " || $cidade ==" " || $cep == " " || $estado == " " || $senha == " " ){
									echo('<script>window.alert("Preencha todos os dados!");window.location="cadastro_profissional.php";</script>');
								}
                            } 

                        ?>

</body>
</html>