<?php

	require('models/user.php');

	$controller = new UsersController();
	//アクションによって呼び出すメソッドを変える
	//$actionはroutes.phpで定義されているもの
	switch ($action) {
		case 'login':
			$controller->login($post);
			break;
		case 'add':
			$controller->add($post);
			break;
		case 'confirm':
			$controller->confirm($post);
			break;
		case 'create':
			$controller->create($post);
			break;
		default:
			break;
	}

	class UsersController {
			private $action = '';
			private $resource = '';
			private $viewOptions = '';

			private $name = '';
			private $email = '';
			private $password = '';
			private $error = '';

		public function login($post) {
			//ここでモデルを呼び出す
			$user = new User();
			$this->viewOptions = $user->login($post);
			$this->resource = 'users';
			$this->action = 'login';
			$this->error = $user->error;

			//ビューを呼び出す
			include('views/layout/application.php');
		}

		public function add($post) {
			//ここでモデルを呼び出す
			$user = new User();
			$this->viewOptions = $user->add($post);
			$this->resource = 'users';
			$this->action = 'index';
			$this->error = $user->error;
			if (isset($user->rewrite) && !empty($user->rewrite)) {
				$post = $user->rewrite;
			}

			//変数の引き渡しはコントローラーの役割であってる？
			if(isset($post) && !empty($post)) {
			    $this->name = htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8');
			    $this->email = htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8');
			    $this->password = htmlspecialchars($post['password1'], ENT_QUOTES, 'UTF-8');
			}

			//ビューを呼び出す
			include('views/layout/application.php');
		}

		public function confirm($post) {
			//ここでモデルを呼び出す
			$user = new User();
			$this->viewOptions = $user->confirm($post);
			$this->resource = 'users';
			$this->action = 'check';

			//ビューを呼び出す
			include('views/layout/application.php');
		}

		public function create($post) {
			//ここでモデルを呼び出す
			$user = new User();
			$this->viewOptions = $user->create($post);
			$this->resource = 'users';
			$this->action = 'login';

			//ビューを呼び出す
			include('views/layout/application.php');
		}

	}

 ?>

<?php
	class User {
		private $dbconnect = '';
		public function __construct() {
			require('dbconnect.php');
			// DB接続の値を代入
			$this->dbconnect = $db;

		}
		public $error = '';
		public $rewrite = '';

		public function login($post) {
			if (isset($_COOKIE['email']) && $_COOKIE['email'] != '') {
			    $post['email'] = $_COOKIE['email'];
			    $post['password'] = $_COOKIE['password'];
			    $post['save'] = 'on';
			}

			if (!empty($post)) {
		    	if ($post['email'] != '' && $post['password'] != '') {
			    	$sql = sprintf('SELECT COUNT(*) AS cnt FROM users WHERE email="%s"',
			        	mysqli_real_escape_string($this->dbconnect, $post['email'])
			    	);
				    $record = mysqli_query($this->dbconnect, $sql);
				    $table = mysqli_fetch_assoc($record);
				    if ($table['cnt'] == 0) {
				        $error['login'] = 'noexist';
				    } elseif (strlen($post['password']) < 4 || strlen($post['password']) > 16) {
				    	$error['login'] = 'length';
				    } else {
				    	$sql = sprintf('SELECT * FROM users WHERE email="%s" AND password="%s"',
				        	mysqli_real_escape_string($this->dbconnect, $post['email']),
				        	mysqli_real_escape_string($this->dbconnect, sha1($post['password']))
			        	);
			      		$record = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
			      		if ($table = mysqli_fetch_assoc($record)) {
				        	//ログイン成功
				        	$_SESSION['user_id'] = $table['user_id'];
				        	$_SESSION['time'] = time();
				        	if ($post['save'] == 'on') {
					          	setcookie('email', $post['email'], time()+60*60*24*14);
					          	setcookie('password', $post['password'], time()+60*60*24*14);
				        	}
				        	header('Location: /NexSeedPortal/contents/index');
				        	exit();
				      	} else {
				        	$error['login'] = 'failed';
				      	}
				    }
		    	} else {
		      		$error['login'] = 'blank';
		    	}

				$this->error = $error;
			}

		}

		public function add($post) {
			$error = array();
			if ($post == '') {
				$post = $_POST;
			}

			if(isset($post) && !empty($post)) {
			    $name = htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8');
			    $email = htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8');
			    $password = htmlspecialchars($post['password1'], ENT_QUOTES, 'UTF-8');

			    if($post['name']=='') {
			    	$error['name'] = 'blank';
			    }
			    if($post['email']=='') {
			    	$error['email'] = 'blank';
			    }
			    if($post['password1']=='') {
			     	$error['password'] = 'blank';
			    } elseif (strlen($post['password1']) < 4 || strlen($post['password1']) > 16) {
			    	$error['password'] = 'length';
			    } elseif ($post['password1'] != $post['password2']) {
			    	$error['password'] = 'incorrect';
			    }

			    if (empty($error)) {
			    	//重複アカウントのチェック
			    	$sql = sprintf('SELECT COUNT(*) AS cnt FROM users WHERE email="%s"',
			        	mysqli_real_escape_string($this->dbconnect, $post['email'])
			    	);
				    $record = mysqli_query($this->dbconnect, $sql);
				    $table = mysqli_fetch_assoc($record);
				    if ($table['cnt'] > 0) {
				        $error['email'] = 'duplicate';
				    } else {
				        $_SESSION['join'] = $post;
				        header('Location: /NexSeedPortal/users/confirm/');
				        exit();
				    }

			    }
			}

			if (isset($_REQUEST['action']) && $_REQUEST['action']=='rewrite') {
			    $this->rewrite = $_SESSION['join'];
			    $error['rewrite'] = true;
			}
			$this->error = $error;
		}

		public function confirm($post) {
			if(isset($post) && !empty($post)) {
				//$_SESSION['join'] = $post;
				header('Location: /NexSeedPortal/users/create/');
				exit();
			}
		}

		public function create() {
			//if (!empty($post)) {
			    //登録処理
			    $sql = sprintf('INSERT INTO users SET user_name="%s", email="%s", password="%s", created=now()',
			    	mysqli_real_escape_string($this->dbconnect, $_SESSION['join']['name']),
			    	mysqli_real_escape_string($this->dbconnect, $_SESSION['join']['email']),
			    	mysqli_real_escape_string($this->dbconnect, sha1($_SESSION['join']['password1']))
			    );

			    mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
			    //登録したので、セッション情報を破棄
			    unset($_SESSION['join']);
			    header('Location: /NexSeedPortal/users/login/');
			    exit();
			//}
		}

	}
 ?>

 

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
							<a href="/NexSeedPortal/users/add?action=rewrite"><input type="button" class="btns btn-warning btn-block btn-lg" value="Back!" style="margin-left:5px; float:left;"></a>
 							<input type="submit" onclick="check()" class="btn btn-warning btn-block btn-lg" value="Sign Up!" style="margin-left:5px; float:left;">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
								<input class="form-control input-lg" name="name" type="text" placeholder="Name" value="<?php echo $this->name; ?>" required>
				            	<?php if(isset($this->error['name']) && $this->error['name']=='blank'){ ?>
				            		<p class="error">*名前を入力してください</p>
				            	<?php } ?>
							</div>
							<div class="form-group">
								<!-- <h3>Email</h3> -->
								<input class="form-control input-lg" name="email" type="email" placeholder="Email address" value="<?php echo $this->email; ?>" required>
				            	<?php if(isset($this->error['email']) && $this->error['email']=='blank'){ ?>
				            		<p class="error">*メールアドレスを入力してください</p>
				            	<?php } elseif(isset($this->error['email']) && $this->error['email']=='duplicate') { ?>
				             		<p class="error">*指定されたメールアドレスは既に登録されています</p>
            					<?php } ?>
							</div>
							<div class="form-group">
								<!-- <h3>Password</h3> -->
								<input class="form-control input-lg" name="password1" type="password" placeholder="Password" value="<?php echo $this->password; ?>" required>
				            	<?php if(isset($this->error['password'])){ ?>
				            		<?php if($this->error['password']=='blank'){ ?>
				            			<p class="error">*パスワードを入力してください</p>
				            		<?php } elseif ($this->error['password']=='length') { ?>
				            			<p class="error">*パスワードは４文字から１６文字で入力してください</p>
				            		<?php } ?>
				            	<?php } ?>
							</div>
							<div class="form-group">
								<!-- <h3>Password(for check)</h3> -->
								<input class="form-control input-lg" name="password2" type="password" placeholder="Password(for check)" value="<?php echo $this->password; ?>" required>
								<?php if(isset($this->error['password'])){ ?>
				            		<?php if($this->error['password']=='incorrect'){ ?>
				            			<p class="error">*２つのパスワードが一致しません</p>
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
