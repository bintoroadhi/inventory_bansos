<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+s', function assets() {
			$('#btn_save').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#btn_cancel').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+d', function assets() {
			$('.btn_save_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Barangkeluar <small>Edit Barangkeluar</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/barangkeluar'); ?>">Barangkeluar</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

<style>
	/* .group-id-barang */
	.group-id-barang {}

	.group-id-barang .control-label {}

	.group-id-barang .col-sm-8 {}

	.group-id-barang .form-control {}

	.group-id-barang .help-block {}

	/* end .group-id-barang */



	/* .group-tujuan */
	.group-tujuan {}

	.group-tujuan .control-label {}

	.group-tujuan .col-sm-8 {}

	.group-tujuan .form-control {}

	.group-tujuan .help-block {}

	/* end .group-tujuan */



	/* .group-jumlah */
	.group-jumlah {}

	.group-jumlah .control-label {}

	.group-jumlah .col-sm-8 {}

	.group-jumlah .form-control {}

	.group-jumlah .help-block {}

	/* end .group-jumlah */
</style>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body ">
					<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header ">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username">Barangkeluar</h3>
							<h5 class="widget-user-desc">Edit Barangkeluar</h5>
							<hr>
						</div>
						<?= form_open(base_url('administrator/barangkeluar/edit_save/'.$this->uri->segment(4)), [
							'name' => 'form_barangkeluar',
							'class' => 'form-horizontal form-step',
							'id' => 'form_barangkeluar',
							'method' => 'POST'
						]); ?>

						<?php
						$user_groups = $this->model_group->get_user_group_ids();
						?>

							<div class="form-group group-kecamatan-id ">
    							<label for="kecamatan_id" class="col-sm-2 control-label">Kecamatan <i class="required">*</i></label>
    							<div class="col-sm-8">
    								<select class="form-control chosen chosen-select-deselect" name="kecamatan_id" id="kecamatan_id" data-placeholder="Select Kecamatan">
    									<option value=""></option>
									<?php
										$conditions = [];
									?>
    									<?php foreach (db_get_all_data('kecamatan', $conditions) as $row): ?>
											<option <?= $row->kecamatan_id == $barangkeluar->kecamatan_id ? 'selected="selected"' : ''; ?> value="<?= $row->kecamatan_id ?>"><?= $row->kecamatan_nama; ?></option>
    									<?php endforeach; ?>
    								</select>
    								<small class="info help-block"></small>
    							</div>
    						</div>
    						<div class="form-group group-kelurahan-id">
								<label for="kelurahan_id" class="col-md-2 control-label">Kelurahan <i class="required">*</i></label>
    							<div class="col-sm-8">
									<select class="form-control chosen chosen-select-deselect" name="kelurahan_id" id="kelurahan_id" data-placeholder="Select Kelurahan">
										<option value=""></option>
									</select>
									<small class="info help-block"></small>
								</div>
							</div>


						<div class="form-group group-tujuan">
							<label for="tujuan_posko" class="col-sm-2 control-label">Tujuan Posko</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="tujuan_posko"
									id="tujuan_posko" data-placeholder="Select Penerima">
									<option value=""></option>
									<?php
										$conditions = [
											];
										?>
									<?php foreach (db_get_all_data('posko', $conditions) as $row): ?>
									<option <?= $row->posko_id == $barangkeluar->tujuan_posko ? 'selected' : ''; ?>
										value="<?= $row->posko_id ?>"><?= $row->posko_nama; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block">
								</small>
							</div>
						</div>
						<div class="form-group group-tujuan">
							<label for="tujuan" class="col-sm-2 control-label">Penerima <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="tujuan" id="tujuan"
									data-placeholder="Select Penerima">
									<option value=""></option>
									<?php
										$conditions = [
											];
										?>
									<?php foreach (db_get_all_data('sumber', $conditions) as $row): ?>
									<option <?= $row->id_sumber == $barangkeluar->tujuan ? 'selected' : ''; ?>
										value="<?= $row->id_sumber ?>"><?= $row->nama_sumber; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block">
								</small>
							</div>
						</div>






						<div class="form-group group-id-barang">
							<label for="id_barang" class="col-sm-2 control-label">Nama Barang <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="id_barang"
									id="id_barang" data-placeholder="Select Nama Barang">
									<option value=""></option>
								</select>
								<small class="info help-block">
								</small>
							</div>
						</div>





						<div class="form-group group-jumlah  ">
							<label for="jumlah" class="col-sm-2 control-label">Banyaknya <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="jumlah" id="jumlah" placeholder=""
									value="<?= set_value('jumlah', $barangkeluar->jumlah); ?>">
								<small class="info help-block">
									<b>Input Jumlah</b> Max Length : 12.</small>
							</div>
						</div>




						<div class="form-group group-keterangan  ">
							<label for="keterangan" class="col-sm-2 control-label">Keterangan </label>
							<div class="col-sm-8">
								<textarea placeholder="Keterangan" id="keterangan" name="keterangan" rows="5"
									class="textarea form-control"><?= set_value('keterangan', $barangkeluar->keterangan); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>




						<div class="form-group group-tanggal  ">
							<label for="tanggal" class="col-sm-2 control-label">Tanggal <i class="required">*</i>
							</label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right datepicker" name="tanggal"
										placeholder="" id="tanggal"
										value="<?= set_value('barangkeluar_tanggal_name', $barangkeluar->tanggal); ?>">
								</div>
								<small class="info help-block">
								</small>
							</div>
						</div>





						<div class="form-group group-waktu  ">
							<label for="waktu" class="col-sm-2 control-label">Waktu <i class="required">*</i>
							</label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right timepicker" name="waktu"
										id="waktu"
										value="<?= set_value('barangkeluar_waktu_name', $barangkeluar->waktu); ?>">
								</div>
								<small class="info help-block">
								</small>
							</div>
						</div>



						<div class="message"></div>
						<div class="row-fluid col-md-7 container-button-bottom">
							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay'
								title="<?= cclang('save_button'); ?> (Ctrl+s)">
								<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
							</button>
							<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save"
								data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
								<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
							</a>

							<div class="custom-button-wrapper">

							</div>
							<a class="btn btn-flat btn-default btn_action" id="btn_cancel"
								title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
								<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
							</a>
							<span class="loading loading-hide">
								<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
								<i><?= cclang('loading_saving_data'); ?></i>
							</span>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
				<!--/box body -->
			</div>
			<!--/box -->
		</div>
	</div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
	$(document).ready(function () {
		window.event_submit_and_action = '';

		(function () {
			var id_barang = $('#id_barang');
			/* 
	id_barang.on('change', function() {});
	*/
			var tujuan = $('#tujuan');
			var jumlah = $('#jumlah');

		})()







		$('#btn_cancel').click(function () {
			swal({
					title: "Are you sure?",
					text: "the data that you have created will be in the exhaust!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes!",
					cancelButtonText: "No!",
					closeOnConfirm: true,
					closeOnCancel: true
				},
				function (isConfirm) {
					if (isConfirm) {
						window.location.href = BASE_URL + 'administrator/barangkeluar';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_barangkeluar = $('#form_barangkeluar');
			var data_post = form_barangkeluar.serializeArray();
			var save_type = $(this).attr('data-stype');
			data_post.push({
				name: 'save_type',
				value: save_type
			});

			(function () {
				data_post.push({
					name: '_example',
					value: 'value_of_example',
				})
			})()


			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
					url: form_barangkeluar.attr('action'),
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('form').find('.error-input').remove();
					$('.steps li').removeClass('error');
					if (res.success) {
						var id = $('#barangkeluar_image_galery').find('li').attr('qq-file-id');
						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({
							message: res.message
						});
						$('.message').fadeIn();
						$('.data_file_uuid').val('');

					} else {
						if (res.errors) {
							parseErrorField(res.errors);
						}
						$('.message').printMessage({
							message: res.message,
							type: 'warning'
						});
					}

				})
				.fail(function () {
					$('.message').printMessage({
						message: 'Error save data',
						type: 'warning'
					});
				})
				.always(function () {
					$('.loading').hide();
					$('html, body').animate({
						scrollTop: $(document).height()
					}, 2000);
				});

			return false;
		}); /*end btn save*/





		function chained_id_barang(selected, complete) {
			var val = $('#id_barang').val();
			$.LoadingOverlay('show')
			return $.ajax({
					url: BASE_URL + '/administrator/barangkeluar/ajax_barang/' + val,
					dataType: 'JSON',
				})
				.done(function (res) {
					var html = '<option value=""></option>';
					$.each(res, function (index, val) {
						html += '<option ' + (selected == val.id_barang ? 'selected' : '') +
							' value="' + val.id_barang + '">' + val.nama_barang + ' (' + val.stok +
							' ' + val.nama_satuan + ')' + '</option>'
					});
					$('#id_barang').html(html);
					$('#id_barang').trigger('chosen:updated');
					if (typeof complete != 'undefined') {
						complete();
					}

				})
				.fail(function () {
					toastr['error']('Error', 'Getting data fail')
				})
				.always(function () {
					$.LoadingOverlay('hide')
				});
		}

		function chained_kelurahan_id(selected, complete) {
			var val = $('#kecamatan_id').val();
			$.LoadingOverlay('show')
			return $.ajax({
				url: BASE_URL + 'administrator/barangkeluar/ajax_kelurahan_id/' + val,
				dataType: 'JSON',
			})
			.done(function(res) {
				var html = '<option value=""></option>';
				$.each(res, function(index, val) {
					html += '<option ' + (selected == val.kelurahan_id ? 'selected' : '') + ' value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
				});

				$('#kelurahan_id').html(html);
				$('#kelurahan_id').trigger('chosen:updated');
				if (typeof complete != 'undefined') {
					complete();
				}
			})
			.fail(function() {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function() {
				$.LoadingOverlay('hide')
			});
		}

		$('#kecamatan_id').change(function(event) {
			chained_kelurahan_id('<?= $barangkeluar->kelurahan_id ?>');
		});

		$('#id_barang').change(function (event) {
			chained_id_barang('')
		});

		async function chain() {
			await chained_id_barang("<?= $barangkeluar->id_barang ?>");
			await chained_kelurahan_id("<?= $barangkeluar->kelurahan_id ?>");
		}

		chain();
	}); /*end doc ready*/
</script>