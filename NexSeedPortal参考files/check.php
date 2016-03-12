<script type="text/javascript">
    function check(){
        if (confirm('入力いただいた内容を登録しますがよろしいですか。')){
        	//okボタンを押した時
        	//location.href = 'login.php';
            return true;
        } else {
            return false;
        }
    }

 </script>

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
						<h3 class="form-title text-center">Check Your Profile!</h3>
						<form class="form-header" action="" role="form" method="POST" id="#">
        					<input type="hidden" name="action" value="submit">
						<!-- <input type="hidden" name="u" value="503bdae81fde8612ff4944435"> -->
						<!-- <input type="hidden" name="id" value="bfdba52708"> -->
							<div class="form-group">
								<div class="insert_box">
								    <?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8'); ?>
							    </div>
								<!-- <input class="form-control input-lg" name="name" type="text" placeholder="Name" required> -->
							</div>
							<div class="form-group">
								<div class="insert_box">
								    <?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES, 'UTF-8'); ?>
							    </div>
								<!-- <input class="form-control input-lg" name="email" type="email" placeholder="Email address" required> -->
							</div>
							<div class="form-group">
								<div class="insert_box">
								    [表示されません]
							    </div>
								<!-- <input class="form-control input-lg" name="password" type="password" placeholder="Password" required> -->
							</div>
							<!-- <div class="form-group last"> -->
							<!-- <a href="index.html?action=rewrite">&laquo;&nbsp;書き直す</a> | -->
							<div class="form-group last">
							<a href="/NexSeedPortal/users/add"><input type="button" class="btns btn-warning btn-block btn-lg" value="Back!" style="margin-left:5px; float:left;"></a>
 							<input type="submit" onclick="check()" class="btn btn-warning btn-block btn-lg" value="Sign Up!" style="margin-left:5px; float:left;">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
