<?php
header("Content-type: text/html; charset=utf-8");
$connect = mysqli_connect("localhost", "root", "", "teste");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM empresa 
	WHERE titulo LIKE '%".$search."%'
	OR endereco LIKE '%".$search."%' 
	OR cep LIKE '%".$search."%' 
	OR cidade LIKE '%".$search."%' 
	
	";
}
else
{
	$query = "
	SELECT * FROM empresa ORDER BY titulo";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Titulo</th>
							<th>Telefone</th>
							<th>Endereço</th>
							<th>Cep</th>
							<th>Cidade</th>
							<th>Estado</th>
							<th>Descrição</th>
							<th>Categoria</th>
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["titulo"].'</td>
				<td>'.$row["telefone"].'</td>
				<td>'.$row["endereco"].'</td>
				<td>'.$row["cep"].'</td>
				<td>'.$row["cidade"].'</td>
				<td>'.$row["estado"].'</td>
				<td>'.$row["descricao"].'</td>
				<td>'.$row["idCategoria"].'</td>
				
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>