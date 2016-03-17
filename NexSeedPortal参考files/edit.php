<div id="contact">
	<div class="contact fullscreen parallax">
		<div class="overlay02">
			<div class="container">
				<div class="col-sm-7 contact-right wow fadeInUp row contact-row">
					<?php if (isset($this->viewOptions) && !empty($this->viewOptions)): ?>
						<form method="post" id="contact-form" class="form-horizontal" action="/NexSeedPortal/contents/confirm/<?php echo $id; ?>" enctype="multipart/form-data">
							<div class="btn-section dropdown01">
								<select name="category_id" class="category" required>
										<option value="">Category</option>
								<?php foreach ($this->categories as $category): ?>
									<?php if (isset($_SESSION['edit']) && !empty($_SESSION['edit'])): ?>
										<?php if ($_SESSION['edit']['category_id'] == $category['category_id']): ?>
											<option value="<?php echo $_SESSION['edit']['category_id'];?>" selected><?php echo $category['category_name']; ?></option>
										<?php else: ?>
											<option value="<?php echo $category['category_id'];?>"><?php echo $category['category_name']; ?></option>
										<?php endif; ?>
									<?php else: ?>
										<?php if ($category['category_id'] == $this->viewOptions['category_id']):?>
											<option value="<?php echo $category['category_id'];?>" selected><?php echo $category['category_name']; ?></option>
										<?php else: ?>
											<option value="<?php echo $category['category_id'];?>"><?php echo $category['category_name']; ?></option>
										<?php endif; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								</select>
							</div>
							<div class="category">
								<?php if (isset($_SESSION['edit']) && !empty($_SESSION['edit'])): ?>
									<input type="text" name="shop_name" id="storename" class="form-control input-lg" placeholder="Store Name" value="<?php echo $_SESSION['edit']['shop_name']; ?>" required/>
								<?php else: ?>
									<input type="text" name="shop_name" id="storename" class="form-control input-lg" placeholder="Store Name" value="<?php echo $this->viewOptions['shop_name']; ?>" required/>
								<?php endif; ?>
								<div class="abc">
									<span>Please Select Your Favorite Location!!</span>
									<!-- goolgle map API -->
									<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
									<?php require('webroot/asset/js/gmap_edit.php'); ?>
									<div id="gmap"></div>
									<?php if (isset($_SESSION['edit']) && !empty($_SESSION['edit'])): ?>
										<div id="lng">
											<input type="hidden" name="lng" id="lng" value="<?php echo $_SESSION['edit']['lng']; ?>">
										</div>
										<div id="lat">
											<input type="hidden" name="lat" id="lat" value="<?php echo $_SESSION['edit']['lat']; ?>">
										</div>
									<?php else: ?>
										<div id="lng">
											<input type="hidden" name="lng" id="lng" value="<?php echo $this->viewOptions['lng']; ?>">
										</div>
										<div id="lat">
											<input type="hidden" name="lat" id="lat" value="<?php echo $this->viewOptions['lat']; ?>">
										</div>
									<?php endif; ?>
								</div>
								</br>
							</div>
							<div class="abc">
								<span>Photo:</span>
								<label><input type="file" name="picture_path" class="input-lg"></label>
								<?php if (isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 'error_prefix'): ?>
									<p class="danger">※画像の拡張子は".jpg"または".png"または".gif"のファイルを選択して下さい。</p>
								<?php elseif (isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 'select_again'): ?>
									<p class="danger">※恐れ入りますがもう一度画像ファイルを選択して下さい。</p>
								<?php elseif (isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 'no_error'): ?>
									<?php false; ?>
								<?php endif; ?>
								<br/>
								<span>Review:</span>
								<p class="abc01">
									<?php for ($i=1; $i<=5; $i++):?>
										<?php if(isset($_SESSION['edit']) && !empty($_SESSION['edit'])): ?>
											<?php if($i == $_SESSION['edit']['review']): ?>
												<label for="<?php echo $i;?>"><?php echo $i; ?>&nbsp;</label><input type="radio" id="<?php echo $i;?>" name="review" value="<?php echo $i; ?>" checked required/>&nbsp;&nbsp;&nbsp;&nbsp;
											<?php else: ?>
												<label for="<?php echo $i;?>"><?php echo $i; ?>&nbsp;</label><input type="radio" id="<?php echo $i;?>" name="review" value="<?php echo $i; ?>" required/>&nbsp;&nbsp;&nbsp;&nbsp;
											<?php endif; ?>
										<?php else: ?>
											<?php if($i == $this->viewOptions['review']): ?>
												<label for="<?php echo $i;?>"><?php echo $i; ?>&nbsp;</label><input type="radio" id="<?php echo $i;?>" name="review" value="<?php echo $i; ?>" checked required/>&nbsp;&nbsp;&nbsp;&nbsp;
											<?php else: ?>
												<label for="<?php echo $i;?>"><?php echo $i; ?>&nbsp;</label><input type="radio" id="<?php echo $i;?>" name="review" value="<?php echo $i; ?>" required/>&nbsp;&nbsp;&nbsp;&nbsp;
											<?php endif; ?>
										<?php endif; ?>
									<?php endfor; ?>
								</p>
							</div>
							<div class="category">
								<?php if (isset($_SESSION['edit']) && !empty($_SESSION['edit'])): ?>
									<textarea name="comment" rows="5" cols="10" id="comment" class="form-control input-message wow fadeInUp"  placeholder="Comment" required><?php echo $_SESSION['edit']['comment']; ?></textarea>
								<?php else: ?>
									<textarea name="comment" rows="5" cols="10" id="comment" class="form-control input-message wow fadeInUp"  placeholder="Comment" required><?php echo $this->viewOptions['comment']; ?></textarea>
								<?php endif; ?>
							</div>
							<div class="col-sm-4">
								<a href='/NexSeedPortal/contents/show/<?php echo $id; ?>'>
									<input type="button" name="button" value="Back" class="btn01 wow fadeInUp" />
								</a>
							</div>
							<!-- 確認ボタン -->
							<div class="col-sm-4 contact-left">
								<input type="submit" name="submit" value="Edit" class="btn wow fadeInUp" />
							</div>
						</form>
					<?php else: ?>
						<p>This post couldn't found out. Please check your URL.</br>Thank you.</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>