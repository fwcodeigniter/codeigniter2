
<section id="cart_items">
	<div class="container">
		<div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
		<div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
		<div class="table-responsive cart_info">
			<button style="margin-bottom: 5px" type="button" class="btn btn-default hbtn" data-toggle="modal" data-target="#addBrand">Thêm Thương hiệu</button>

			<div class="modal fade" id="addBrand" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Thêm Thương hiệu</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="<?php echo $base_url; ?>admin/brand/add" method="POST">
								<div class="row">
									<div class="col-xs-9">
										<input class="form-control" id="name" type="text" name="txtName" placeholder="Tên Thương hiệu" pattern="+[a-zA-Z0-9]" />
									</div>
									<div class="col-xs-3">
										<input tabindex="1" class="form-control hbtn" type="submit" class="btn btn-default" value="Lưu">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Mã Thương hiệu</td>
						<td class="description">Tên Thương hiệu</td>
						<td class="price"></td>
						<td class="quantity"></td>
						<td class="total"></td>
						<td></td>
					</tr>
				</thead>

				<tbody>

				<?php 
				$num=1;
				foreach ($brand as $key => $value):	?>
					<tr>
						<td class="cart_product">
							<?php echo $value->id; ?>
						</td>
						<td class="cart_description">
							<?php echo $value->name; ?>
						</td>
						<td class="cart_price">
							
						</td>
						<td class="cart_quantity">
							
						</td>
						<td class="cart_edit">
							<a class="cart_quantity_delete" data-toggle="modal" data-target="#editBrand<?php echo $num; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
							<div class="modal fade" id="editBrand<?php echo $num; ?>" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Sửa Thương hiệu</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" action="<?php echo $base_url; ?>admin/brand/update/<?php echo $value->id; ?>" method="POST">
												<div class="row">
													<div class="col-xs-9">
														<input class="form-control" type="text" name="txtName" value="<?php echo $value->name; ?>" pattern="+[a-zA-Z0-9]" />
													</div>
													<div class="col-xs-3">
														<input class="form-control hbtn" type="submit" class="btn btn-default" value="Lưu">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" data-toggle="modal" data-target="#delBrand<?php echo $num; ?>"><i class="fa fa-times"></i></a>
							<div class="modal fade" id="delBrand<?php echo $num; ?>" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Thông báo</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" action="<?php echo $base_url; ?>/admin/brand/drop/<?php echo $value->id; ?>">
												<div class="row">
													<h4 style="padding-left: 10px; margin-bottom: 10px;"><i>Bạn muốn xóa Thương hiệu <?php echo $value->name; ?> ?</i></h4>
												</div>
												<div class="row">
													<div class="col-xs-3 col-xs-offset-6">
														<input class="form-control hbtn" type="submit" class="btn btn-default" value="Xác nhận">
													</div>
													<div class="col-xs-3">
														<input class="form-control hbtn" class="btn btn-default" type="button" data-dismiss="modal" value="Hủy">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<?php 
					$num++;
					endforeach; ?>
					
				</tbody>
			</table>
		</div>
	</div>
</section>
