<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="evento/action/eventoAdd.php" onsubmit="return validaForm(this);">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Adicionar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="titulo" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo" required>
					</div>
				  </div>

				  <div class="form-group">
					<label for="descricao" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					  <textarea type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição"></textarea>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="cor" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					  <select name="cor" class="form-control" id="cor">
					  <option value="">Escolher</option>
						  <option style="color:#0071c5" value="#0071c5">&#9724; Azul Escuro</option>
						  <option style="color:#40E0D0" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700" value="#FFD700">&#9724; Amarelo</option>
						  <option style="color:#FF8C00" value="#FF8C00">&#9724; Laranja</option>
						  <option style="color:#FF0000" value="#FF0000">&#9724; Vermelho</option>
						  <option style="color:#000" value="#000">&#9724; Preto</option>
						  
						</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="convidado" class="col-sm-2 control-label">Convidar</label>
					<div class="col-sm-10">
					  <select name="convidado" class="form-control" id="convidado">
					  <option value="">Ninguém</option>
					  <?php
							$sql2 = "SELECT * FROM usuarios WHERE id_usuario!=$id_user";
							$req = $db->prepare($sql2);
							$req->execute();
							$linhas = $req->rowCount();
							while ($dados = $req->fetch(PDO::FETCH_ASSOC)) {
								$id_usuario = $dados['id_usuario'];
								$nome_usuario = $dados['nome'];
								echo " <option value=\"$id_usuario\">$nome_usuario</option>";
							}
						?>				  
						</select>
					</div>
				  </div>


				  <div class="form-group">
					<label for="inicio" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-10">
					  <input type="text" name="inicio" class="form-control" id="inicio" required>
					</div>
				  </div>
				  <div class="form-group">
					<label for="termino" class="col-sm-2 control-label">Termino</label>
					<div class="col-sm-10">
					  <input type="text" name="termino" class="form-control" id="termino" required>
					</div>
				  </div>
				
			  </div>

			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Adicionar</button>
			  </div>
			</form>
			</div>
		</div>
</div>