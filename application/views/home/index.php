

 <?php $this->load->view('layout/navbar'); ?>

	<div class="page-wrap">
		<?php $this->load->view('layout/sidebar'); ?>
		<div class="main-content">
			<div class="container-fluid">
				<h1>Home</h1>
				<?php if($message = $this->session->flashdata('sucesso')): ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Sucesso!</strong> <?php echo $message; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>

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
