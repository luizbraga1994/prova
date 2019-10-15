<?php
require "Conexao.php";
?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<title>Cadatro Empresa</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>


<div id="container">

	<form method="post" action="?go=cadastrar">
		<table id="cad_table">
			<tr>
				<td>Titulo:</td>
				<td><input type="text" name="titulo" id="titulo" class="txt" /></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" id="telefone" class="txt" /></td>
			</tr>
			<tr>
				<td>Endereço:</td>
				<td><input type="text" name="endereco" id="endereco" class="txt" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Cep:</td>
				<td><input type="text" name="cep" id="cep" class="txt" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Cidade:</td>
				<td><input type="text" name="cidade" id="cidade" class="txt" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Estado:</td>
				<td><input type="text" name="estado" id="estado" class="txt" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td><input type="text" name="descricao" id="descricao" class="txt" maxlength="15" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Cadastrar" id="btnCad"> 
				&nbsp;
				<a href="./">
					<input type="button" value="Cancelar" class="btn" id="btnCancelar">
				</a>
				</td>
			</tr>	
		</table>
	</form>
</div>

</body>
</html>

<?php
if(@$_GET['go'] == 'cadastrar'){
	$titulo = $_POST['titulo'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	$cep = $_POST['cep'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$descricao = $_POST['descricao'];
	
							

	if(empty($titulo)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($telefone)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($endereco)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($cep)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($cidade)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($estado)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}else{
		$query1 = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM empresa WHERE titulo = '$titulo'"));
		if($query1 == 1){
			echo "<script>alert('Empresa já existe.'); history.back();</script>"; 
		}else{

			$sql=("insert into empresa (titulo, telefone, endereco, cep, cidade, estado, descricao, idCategoria) 
			values ('$titulo', '$telefone', '$endereco', '$cep', '$cidade', '$estado', '$descricao',1)");
			if ($conn->query($sql) === TRUE) {
				echo "<script>alert('Empresa cadastrado com sucesso.');</script>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			
		}
	}
}

?>