

 <?php $this->load->view('layout/navbar'); ?>

	<div class="page-wrap">
		<?php $this->load->view('layout/sidebar'); ?>
		<div class="main-content">
			<div class="container-fluid">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<i class="ik ik-users bg-blue"></i>
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
							<div class="card-header"><h3><?php echo $titulo; ?></h3></div>
							<div class="card-body">
								<table id="data_table" class="table">
									<thead>
									<tr>
										<th>#</th>
										<th>Usuário</th>
										<th>E-mail</th>
										<th>Nome</th>
										<th>Ativo</th>
										<th class="nosort">Ações</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($usuarios as $usuario): ?>
									<tr>
										<td><?php echo $usuario->id; ?></td>
										<td><?php echo $usuario->username; ?></td>
										<td><?php echo $usuario->email; ?></td>
										<td><?php echo $usuario->first_name.' '.$usuario->last_name;?></td>
										<td>
											<?php echo ($usuario->active == 1 ? '<span class="badge badge-success">Sim</span>' : '<span class="badge badge-danger">Não</span>'); ?>
										</td>
										<td>
											<a href="<?php echo base_url('usuarios/edit/'.$usuario->id); ?>" data-toggle="tooltip" data-placement="top" title="Editar" class="text-primary" style="font-size: 1.2em;"><i class="ik ik-edit"></i></a>
											<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Excluir" class="text-danger delete" data-id="<?php echo $usuario->id; ?>" style="font-size: 1.2em;"><i class="ik ik-trash-2"></i></a>
										</td>
									</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
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
							</figure><span><span class="name">Gene Newman</span>  <span class="username">@gene_newman</span> </span>
						</a>
						<a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
							<figure class="user--online">
								<img src="img/users/2.jpg" class="rounded-circle" alt="">
							</figure><span><span class="name">Billy Black</span>  <span class="username">@billyblack</span> </span>
						</a>
						<a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
							<figure class="user--online">
								<img src="img/users/3.jpg" class="rounded-circle" alt="">
							</figure><span><span class="name">Herbert Diaz</span>  <span class="username">@herbert</span> </span>
						</a>
						<a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
							<figure class="user--busy">
								<img src="img/users/4.jpg" class="rounded-circle" alt="">
							</figure><span><span class="name">Sylvia Harvey</span>  <span class="username">@sylvia</span> </span>
						</a>
						<a href="javascript:void(0)" class="list-group-item active" data-chat-user="Marsha Hoffman">
							<figure class="user--busy">
								<img src="img/users/5.jpg" class="rounded-circle" alt="">
							</figure><span><span class="name">Marsha Hoffman</span>  <span class="username">@m_hoffman</span> </span>
						</a>
						<a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
							<figure class="user--offline">
								<img src="img/users/1.jpg" class="rounded-circle" alt="">
							</figure><span><span class="name">Mason Grant</span>  <span class="username">@masongrant</span> </span>
						</a>
						<a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
							<figure class="user--offline">
								<img src="img/users/2.jpg" class="rounded-circle" alt="">
							</figure><span><span class="name">Shelly Sullivan</span>  <span class="username">@shelly</span></span>
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
									<p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
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
				<span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Costumizado <i class="fa fa-code text-danger"></i> por <a href="javascript:void" class="text-dark" target="_blank">Breno</a></span>
			</div>
		</footer>

	</div>
