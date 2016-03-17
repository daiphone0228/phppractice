<div id="contact">
	<div class="contact fullscreen parallax">
		<div class="overlay02">
			<div class="container">
				<div class="wow fadeInUp row contact-row">
					<div class="col-md-9 contact-right">
					<?php if (isset($this->viewOptions) && !empty($this->viewOptions)): ?>
						<div class="well2">
							<p>
								<div class="col-xs-10 contact-left">
									<?php echo $this->viewOptions['shop_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;'s Information
								</div>
							<!-- ここはログインユーザーIDとコンテンツユーザーIDが一致した場合にのみ表示される -->
							<?php //if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $this->viewOptions['user_id']): ?>
								<div class="contact-right">
										<a href="/NexSeedPortal/contents/edit/<?php echo $id; ?>">
											<i class="fa fa-pencil fa-glay"></i>
										</a>&nbsp;&nbsp;&nbsp;&nbsp;
										<a href="/NexSeedPortal/contents/delete/<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete?');">
											<i class="fa fa-trash fa-glay"></i>
										</a>
								</div>
							<?php //endif; ?>
							</p>
						</div>
							<br />
						<div class="wow fadeInUp alt-table-responsive">
							<table class="table table-hover table-condensed col-xs-10">
								<tr>
									<td>Store Name</td>
									<td>
										<div class="text-center">
											<?php echo $this->viewOptions['shop_name']; ?>
										</div>
									</td>
								</tr>
								<tr>
									<td>Category</td>
									<td>
										<div class="text-center">
											<?php echo $this->viewOptions['category_name']; ?>
										</div>
									</td>
								</tr>
								<tr>
									<td>Review</td>
									<td id="review">
										<div class="text-center">
											<?php
												$i = $this->viewOptions['review'];
												for ($i; $i>0; $i--) {
													echo "★";
												}
											?>
										</div>
									</td>
								</tr>
								<tr>
									<td>Comment</td>
									<td>
										<div class="text-center">
											<?php echo $this->viewOptions['comment']; ?>
										</div>
									</td>
								</tr>
								<tr>
									<td>Photo</td>
									<td>
										<div class="col-xs-12 col-sm-12">
											<?php if (isset($this->viewOptions['picture_path']) && !empty($this->viewOptions['picture_path'])): ?>
												<img src="/NexSeedPortal/webroot/asset/images/post_images/<?php echo $this->viewOptions['picture_path']; ?>" class="img-thumbnail img-responsive center-block"/>
											<?php else: ?>
												No Image
											<?php endif; ?>
										</div>
									</td>
								</tr>
								<tr>
									<td>Location</td>
									<td>
										<!-- goolgle map API -->
										<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
										<?php require('webroot/asset/js/gmap.php'); ?>
										<div id="gmap" class="img-thumbnail center-block"></div>
									</td>
								</tr>
								<tr>
									<td>Date</td>
									<td>
										<div class="text-center">
											<?php echo $this->viewOptions['modified']; ?>
										</div>
									</td>
								</tr>
								<tr>
									<td>Reviewer</td>
									<td>
										<div class="text-center">
											<?php echo $this->viewOptions['user_name']; ?>
										</div>
									</td>
								</tr>
							</table>
						</div>
					<?php else: ?>
						<p>This post couldn't find out. Please check your URL.</br>Thank you.</p>
					<?php endif; ?>
							<br />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>