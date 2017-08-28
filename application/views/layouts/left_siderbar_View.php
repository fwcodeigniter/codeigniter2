<section> 
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>-->
							<?php 
                                                        if (!isset($active_cat)) {
                                                            $active_cat = -1;
                                                        }
							if (isset($category)): 
								foreach ($category as $key => $value): ?>
							<div class="panel panel-default">
								<a href="<?php echo $base_url.'home/category/'.$value->id; ?>"><div class="panel-heading <?php echo ($value->id == $active_cat)?'selected':''; ?>">
									<h4 class="panel-title"><?php echo $value->name; ?></h4>
								</div></a>
							</div>
						<?php 
							endforeach;
						endif; ?>
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php 
                                                                if (!isset($active_brand)) {
                                                            $active_brand = -1;
                                                        }
                                                                if (isset($brand)): 
								foreach ($brand as $key => $value): ?>
                                                                    <li><a href="<?php echo $base_url.'home/brand/'.$value->id; ?>" <?php echo ($value->id == $active_brand)?'style="background-color: orange;"':''; ?>>  <span class="pull-right">(<?php 
									if (isset($pro_count)) {
										$num = 0;
										foreach ($pro_count as $k => $v) {
											if ($v['brand_id'] == $value->id) {
												$num = $v['num']; 
												break;
											}
										}
										echo $num;
									}

									
									?>)</span><?php echo $value->name; ?></a></li>
								<?php endforeach; endif; ?>
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
<!--						<div class="price-range">price-range
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div>/price-range-->
						
<!--						<div class="shipping text-center">shipping
							<img src="<?php echo $base_url; ?>/public/images/home/shipping.jpg" alt="" />
						</div>/shipping-->
					
					</div>
				</div>
				
				