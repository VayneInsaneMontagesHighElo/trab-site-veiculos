<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?>
<div class="row">
	<div class="col s12 m8 push-m2"> 
		<h3 class="light"> Usuários </h3>
		<table class="striped">
			<thead>
				<tr>
					<th>Nome:</th>
					<th>Login:</th>
					<th>Senha:</th>
					<th>Telefone:</th>
          			<th>Foto:</th>
					<th>Data de nascimento:</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$sql = "SELECT * FROM tbusuario";
				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['login']; ?></td>
					<td><?php echo $dados['senha']; ?></td>
					<td><?php echo $dados['telefone']; ?></td>
          			<td><?php echo $dados['foto']; ?></td>
					<td><?php echo $dados['datanasc']; ?></td>
					<td><a href="editarusu.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					  <div id="modal<?php echo $dados['id']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Um momento amigo!</h4>
					      <p>Você REALMENTE deseja excluir esse usuário?</p>
					    </div>
					    <div class="modal-footer">					     

					      <form action="php_action/deleteusu.php" method="POST">
					      	<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
					      	<button type="submit" name="btn-deletar" class="btn red">Sim, desejo deletar</button>

					      	 <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

					      </form>

					    </div>
					  </div>


				</tr>
			   <?php 
				endwhile;
				else: ?>

				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
          			<td>-</td>
					<td>-</td>
				</tr>

			   <?php 
				endif;
			   ?>

			</tbody>
		</table>
		<br>
		<a href="adicionarusu.php" class="btn">Adicionar usuario</a>
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>