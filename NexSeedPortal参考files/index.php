<!-- /.preloader -->
<div id="preloader"></div>
<div id="top"></div>

<!-- /.parallax full screen background image -->
<div class="fullscreen landing parallax" style="background-image:url('/NexSeedPortal/webroot/asset/images/top_image.jpg');" data-img-width="2000" data-img-height="1333" data-diff="100">
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-7">

					<!-- /.main title -->
					<h1 class="wow fadeInLeft">
					NexSeed Portal Site New Open!!
					</h1>

					<!-- /.header paragraph -->
					<div class="landing-text wow fadeInUp">
						<p>留学生活を有意義にするために、是非このサイトをご活用下さい。<br>
						皆さんが作り上げていくポータルサイトです。<br>
						使い方は自由自在！！<br>
						おすすめレストラン、ローカル情報、レジャー情報<br>
						特に日常生活に関連する情報満載です！<br>
						よろしくお願いします！</p>
					</div>

				</div>

				<!-- /.signup form -->
				<div class="col-md-5">
					<div class="signup-header wow fadeInUp">
						<h3 class="form-title text-center">Get Started!</h3>
						<form class="form-header" action="" role="form" method="POST" id="#">
						<!-- <input type="hidden" name="u" value="503bdae81fde8612ff4944435"> -->
						<!-- <input type="hidden" name="id" value="bfdba52708"> -->
							<div class="form-group">
								<!-- <h3>Name</h3> -->
								<input class="form-control input-lg" name="name" type="text" placeholder="Name" value="<?php echo htmlspecialchars($_SESSION['join']['name']); ?>" required>
								<?php if(isset($this->error['name']) && $this->error['name']=='blank'){ ?>
									<p class="error">*名前を入力してください</p>
								<?php } ?>
							</div>
							<div class="form-group">
								<!-- <h3>Email</h3> -->
								<input class="form-control input-lg" name="email" type="email" placeholder="Email address" value="<?php echo htmlspecialchars($_SESSION['join']['email']); ?>" required>
								<?php if(isset($this->error['email']) && $this->error['email']=='blank'){ ?>
									<p class="error">*メールアドレスを入力してください</p>
								<?php } elseif(isset($this->error['email']) && $this->error['email']=='duplicate') { ?>
							 		<p class="error">*指定されたメールアドレスは既に登録されています</p>
								<?php } ?>
							</div>
							<div class="form-group">
								<!-- <h3>Password</h3> -->
								<input class="form-control input-lg" name="password1" type="password" placeholder="Password" value="<?php echo htmlspecialchars($_SESSION['join']['password1']); ?>" required>
								<?php if(isset($this->error['password'])){ ?>
									<?php if($this->error['password']=='blank'){ ?>
										<p class="error">*パスワードを入力してください</p>
									<?php } elseif ($this->error['password']=='length') { ?>
										<p class="error">*パスワードは4文字以上16文字以下で入力してください</p>
									<?php } ?>
								<?php } ?>
							</div>
							<div class="form-group">
								<!-- <h3>Password(for check)</h3> -->
								<input class="form-control input-lg" name="password2" type="password" placeholder="Password(for check)" value="<?php echo htmlspecialchars($_SESSION['join']['password2']); ?>" required>
								<?php if(isset($this->error['password'])){ ?>
									<?php if($this->error['password']=='incorrect'){ ?>
										<p class="error">*パスワードが一致しません</p>
									<?php } ?>
								<?php } ?>
							</div>
							<div class="form-group last">
 								<input type="submit" class="btn btn-warning btn-block btn-lg" value="Next!" style="margin-left:5px; float:left;">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
