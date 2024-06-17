<?php $this->load->view('layout/navbar'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="<?php echo $icone_view; ?> bg-blue"></i>
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
								<a href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
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
					<div class="card-header d-block"><a href="<?php echo base_url($this->router->fetch_class() . '/core'); ?>" class="btn bg-blue float-right text-white">+ Novo</a></div>
					<div class="card-body">
						<table class="table data_table">
							<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>CPF</th>
								<th>E-mail</th>
								<th>Celular</th>
								<th>Ativo</th>
								<th class="nosort text-right pr-25">Ações</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($mensalistas as $mensalista) : ?>
								<tr>
									<td><?php echo $mensalista->mensalista_id; ?></td>
									<td><?php echo $mensalista->mensalista_nome; ?></td>
									<td><?php echo $mensalista->mensalista_cpf; ?></td>
									<td><?php echo $mensalista->mensalista_email; ?></td>
									<td><?php echo $mensalista->mensalista_telefone_movel; ?></td>
									<td><?php echo ($mensalista->mensalista_ativo == 1) ? 'Sim' : 'Não'; ?></td>
									<td class="text-right">
										<a href="<?php echo base_url($this->router->fetch_class() . '/core/' . $mensalista->mensalista_id); ?>" class="btn btn-icon btn-primary"><i class="ik ik-edit-2"></i></a>
										<button type="button" class="btn btn-icon btn-danger" data-toggle="modal" data-target="#mensalista-<?php echo $mensalista->mensalista_id; ?>"><i class="ik ik-trash"></i></button>
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

<footer class="footer">
	<div class="w-100 clearfix">
		<span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y'); ?> ThemeKit v2.0. Todos os direitos reservados.</span>
		<span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Costumizado <i class="fa fa-laptop-code text-danger"></i> por <a href="http://lavalite.org/" class="text-dark" target="_blank">Tavilo Breno</a></span>
	</div>
</footer>

</div>
