<?php
	//include "base\conexao.php";
	if($_SESSION['UsuarioNivel'] == 1){
		header('Location: ?page=home');
	}
	$id_ue = (int) $_GET['id_ue'];
	
	$sql = mysqli_query($con, "select * from ue where id_ue = '".$id_ue."';");
	$row = mysqli_fetch_array($sql);
	$num = mysqli_query($con, "select numero from localidade where cep = ".$row["cep"].";");
?>
<div id="main" class="titulo container-fluid">
 	<div id="top" class="row">
		<div class="td-titulo col-md-5">
		<h2 class="font-info page-header">Editar registro da Instituição : <?php echo $id_ue;?></h2>
		</div>
	</div>
	<hr>
	<br>

	<!-- Área de campos do formulário de edição-->

	<form enctype="multipart/form-data" action="?page=atualiza_ue&id_ue=<?php echo $row['id_ue']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		<div class="form-group col-md-2">
			<label class="font-info" for="id_ue">ID</label>
			<input type="text" class="form-control" name="id_ue" value="<?php echo $row["id_ue"];?>" readonly>
		</div>
		<div class="form-group col-md-4">
			<label class="font-info" for="nome_ue"><strong>Nome Instituição</strong></label>
			<input type="text" name="nome_ue" class="form-control" id="nome_ue" value="<?php echo $row["nome_ue"];?>" required>
		</div>
		<div class="form-group col-md-3">
				<label class="font-info" for="sigla_ue"><strong>Sigla Instituição</strong></label>
				<input type="text" name="sigla_ue" class="form-control" id="sigla_ue" value="<?php echo $row["sigla_ue"];?>" required>
			</div>
		<div class="form-group col-md-3">
			<label class="font-info" for="logo_ue"><strong>Logo</strong></label>
			<img src="<?php echo $row["logo_ue"];?>" style="width:70px;">
			<input type="hidden" name="logo_old" class="form-control" id="logo_old" value="<?php echo $row["logo_ue"];?>" readonly>
			<input type="file" class="form-control" name="logo_ue">
		</div>
	</div>

	<!-- 2ª LINHA -->
		<div class="row">
			<div class="form-group col-md-4">
				<label class="font-info" for="email_ue"><strong>Email</strong></label><br>
				<input type="text" name="email_ue" class="form-control" id="email_ue" value="<?php echo $row["email_ue"];?>" required>
			</div>
			<div class="form-group col-md-3 ">
				<label class="font-info" for="tel_ue"><strong>Telefone</strong></label><br>
				<input type="text" name="tel_ue" id="tel_ue" class="form-control" style="width:100%" value="<?php echo $row["tel_ue"];?>" required>
			</div>
			<div class="form-group col-md-3 ">
				<label class="font-info" for="cep"><strong>CEP</strong></label><br>
				<input type="hidden" name="cep_old" class="form-control" id="cep_old" value="<?php echo $row["cep"];?>" readonly>
				<input type="text" name="cep" id="cep" class="form-control" style="width:100%" value="<?php echo $row["cep"];?>" required>
			</div>
			<div class="form-group col-md-2">
				<label class="font-info" for="numero"><strong>Número</strong></label>
				<input type="text" name="numero" class="form-control" id="numero" value="<?php echo mysqli_fetch_array($num)[0];?>" required>
			</div>
		</div>

	<br>

		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary ">Salvar Alterações</button>
				<a href="?page=lista_ue" class="btn btn-secondary">Voltar</a>
			</div>
		</div>
	</div>