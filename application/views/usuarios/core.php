<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">
	<?php $this->load->view('layout/sidebar'); ?>
	<div class="main-content">
		<div class="container-fluid">
			<div class="page-header">
				<div class="row align-items-end">
					<div class="col-lg-8">
						<div class="page-header-title">
							<i class="ik ik-user bg-blue"></i>
							<div class="d-inline">
								<h5><?php echo $titulo; ?></h5>
								<span><?php echo $subtitulo; ?></span>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<nav class="breadcrumb-container" aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"><h3>Data da última alteração: <?php
								echo isset($usuario) && !empty($usuario->data_ultima_alteracao)
									? (new DateTime($usuario->data_ultima_alteracao))->format('d/m/Y H:i:s')
									: '';
								?></h3></div>
						<div class="card-body">
							<form class="forms-sample" method="post" action="<?php echo base_url('usuarios/core/'.$usuario->id); ?>">
								<!-- Agrupamento Nome de usuário e Email -->
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="username">Nome de usuário</label>
										<input type="text" class="form-control" id="username" name="username"
											   placeholder="Nome de usuário"
											   value="<?php echo isset($usuario->username) ? $usuario->username : set_value('username'); ?>">
										<?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label for="email">Endereço de email (Login)</label>
										<input type="email" class="form-control" id="email" name="email"
											   placeholder="Endereço de email"
											   value="<?php echo isset($usuario->email) ? $usuario->email : set_value('email'); ?>">
										<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
									</div>
								</div>

								<!-- Agrupamento Nome e Sobrenome -->
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="first_name">Nome</label>
										<input type="text" class="form-control" id="first_name" name="first_name"
											   placeholder="Nome"
											   value="<?php echo isset($usuario->first_name) ? $usuario->first_name : set_value('first_name'); ?>">
										<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label for="last_name">Sobrenome</label>
										<input type="text" class="form-control" id="last_name" name="last_name"
											   placeholder="Sobrenome"
											   value="<?php echo isset($usuario->last_name) ? $usuario->last_name : set_value('last_name'); ?>">
										<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
									</div>
								</div>

								<!-- Agrupamento Telefone -->
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="phone">Número de telefone</label>
										<input type="text" class="form-control" id="phone" name="phone"
											   placeholder="Número de telefone"
											   value="<?php echo isset($usuario->phone) ? $usuario->phone : set_value('phone'); ?>">
										<?php echo form_error('phone', '<div class="text-danger">', '</div>'); ?>
									</div>
								</div>

								<!-- Agrupamento Perfil de Acesso e Status active -->
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="perfil_acesso">Perfil de Acesso</label>
										<select class="form-control" id="perfil_acesso" name="perfil_acesso">
											<option value="">Selecione</option>
											<?php if (isset($usuario)): ?>
												<option value="1" <?php echo $perfil_usuario->id == 1 ? 'selected' : ''; ?>>Administrador</option>
												<option value="2" <?php echo $perfil_usuario->id == 2 ? 'selected' : ''; ?>>Atendente</option>
											<?php else: ?>
												<option value="1">Administrador</option>
												<option value="2">Atendente</option>
											<?php endif; ?>
										</select>
										<?php echo form_error('perfil_acesso', '<div class="text-danger">', '</div>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label for="active">Está active?</label>
										<select class="form-control" id="active" name="active">
											<option value="">Nenhum</option> <!-- Opção padrão -->
											<?php if ($usuario): ?>
												<option value="1" <?php echo $usuario->active == 1 ? 'selected' : ''; ?>>Sim</option>
												<option value="0" <?php echo $usuario->active == 0 ? 'selected' : ''; ?>>Não</option>
											<?php else: ?>
												<option value="1">Sim</option>
												<option value="0">Não</option>
											<?php endif; ?>
										</select>
										<?php echo form_error('active', '<div class="text-danger">', '</div>'); ?>
									</div>
								</div>

								<!-- Agrupamento Senha e Confirmação de Senha -->
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="password">Senha</label>
										<input type="password" class="form-control" id="password" name="password"
											   placeholder="Senha">
										<?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label for="confirm_password">Confirmar Senha</label>
										<input type="password" class="form-control" id="confirm_password"
											   name="confirm_password" placeholder="Confirmar Senha">
										<?php echo form_error('confirm_password', '<div class="text-danger">', '</div>'); ?>
									</div>
								</div>

								<?php if(isset($usuario)): ?>
								<div class="form-group">
									<div class="col-md-12">
										<input type="hidden" name="usuario_id"
											   value="<?php echo isset($usuario) ? $usuario->id : ''; ?>">
									</div>
								</div>
								<?php endif; ?>

								<button type="submit" class="btn btn-primary mr-2">
									<?php echo isset($usuario) ? 'Atualizar' : 'Criar'; ?>
								</button>
								<a type="button" class="btn btn-light" href="<?php echo base_url($this->router->fetch_class()); ?>">Cancelar</a>
							</form>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	<aside class="right-sidebar">
		<div class="sidebar-chat" data-plugin="chat-sidebar">
			<div class="sidebar-chat-info">
				<h6>Chat List</h6>
				<form class="mr-t-10">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search for friends ...">
						<i class="ik ik-search"></i>
					</div>
				</form>
			</div>
			<div class="chat-list">
				<div class="list-group row">
					<a href="javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
						<figure class="user--online">
							<img src="img/users/1.jpg" class="rounded-circle" alt="">
						</figure>
						<span><span class="name">Gene Newman</span>  <span class="username">@gene_newman</span> </span>
					</a>
					<a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
						<figure class="user--online">
							<img src="img/users/2.jpg" class="rounded-circle" alt="">
						</figure>
						<span><span class="name">Billy Black</span>  <span class="username">@billyblack</span> </span>
					</a>
					<a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
						<figure class="user--online">
							<img src="img/users/3.jpg" class="rounded-circle" alt="">
						</figure>
						<span><span class="name">Herbert Diaz</span>  <span class="username">@herbert</span> </span>
					</a>
					<a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
						<figure class="user--busy">
							<img src="img/users/4.jpg" class="rounded-circle" alt="">
						</figure>
						<span><span class="name">Sylvia Harvey</span>  <span class="username">@sylvia</span> </span>
					</a>
					<a href="javascript:void(0)" class="list-group-item active" data-chat-user="Marsha Hoffman">
						<figure class="user--busy">
							<img src="img/users/5.jpg" class="rounded-circle" alt="">
						</figure>
						<span><span class="name">Marsha Hoffman</span>  <span class="username">@m_hoffman</span> </span>
					</a>
					<a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
						<figure class="user--offline">
							<img src="img/users/1.jpg" class="rounded-circle" alt="">
						</figure>
						<span><span class="name">Mason Grant</span>  <span class="username">@masongrant</span> </span>
					</a>
					<a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
						<figure class="user--offline">
							<img src="img/users/2.jpg" class="rounded-circle" alt="">
						</figure>
						<span><span class="name">Shelly Sullivan</span>  <span class="username">@shelly</span></span>
					</a>
				</div>
			</div>
		</div>
	</aside>

	<div class="chat-panel" hidden>
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
				<span class="user-name">John Doe</span>
				<button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="card-body">
				<div class="widget-chat-activity flex-1">
					<div class="messages">
						<div class="message media reply">
							<figure class="user--online">
								<a href="#">
									<img src="img/users/3.jpg" class="rounded-circle" alt="">
								</a>
							</figure>
							<div class="message-body media-body">
								<p>Epic Cheeseburgers come in all kind of styles.</p>
							</div>
						</div>
						<div class="message media">
							<figure class="user--online">
								<a href="#">
									<img src="img/users/1.jpg" class="rounded-circle" alt="">
								</a>
							</figure>
							<div class="message-body media-body">
								<p>Cheeseburgers make your knees weak.</p>
							</div>
						</div>
						<div class="message media reply">
							<figure class="user--offline">
								<a href="#">
									<img src="img/users/5.jpg" class="rounded-circle" alt="">
								</a>
							</figure>
							<div class="message-body media-body">
								<p>Cheeseburgers will never let you down.</p>
								<p>They'll also never run around or desert you.</p>
							</div>
						</div>
						<div class="message media">
							<figure class="user--online">
								<a href="#">
									<img src="img/users/1.jpg" class="rounded-circle" alt="">
								</a>
							</figure>
							<div class="message-body media-body">
								<p>A great cheeseburger is a gastronomical event.</p>
							</div>
						</div>
						<div class="message media reply">
							<figure class="user--busy">
								<a href="#">
									<img src="img/users/5.jpg" class="rounded-circle" alt="">
								</a>
							</figure>
							<div class="message-body media-body">
								<p>There's a cheesy incarnation waiting for you no matter what you palete preferences
									are.</p>
							</div>
						</div>
						<div class="message media">
							<figure class="user--online">
								<a href="#">
									<img src="img/users/1.jpg" class="rounded-circle" alt="">
								</a>
							</figure>
							<div class="message-body media-body">
								<p>If you are a vegan, we are sorry for you loss.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form action="javascript:void(0)" class="card-footer" method="post">
				<div class="d-flex justify-content-end">
					<textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
					<button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
				</div>
			</form>
		</div>
	</div>

	<footer class="footer">
		<div class="w-100 clearfix">
			<span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y'); ?> b-Web. All Rights Reserved.</span>
			<span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Costumizado <i
					class="fa fa-code text-danger"></i> por <a href="javascript:void" class="text-dark" target="_blank">Breno</a></span>
		</div>
	</footer>

</div>
