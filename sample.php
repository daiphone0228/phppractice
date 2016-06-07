<?php 
	require('models/content.php');

	//コントローラのクラスをインスタンス化
	$controller = new ContentsController();

	//アクション名によって、呼び出すメソッドを変える
	//$action (グローバル変数)は、routes.phpで定義されているもの

	switch ($action) {

		case 'add';
		$controller->add();
			break;

		case 'add_confirm':
			if($id == 0) {
				$controller->addConfirm($_SESSION['add']);
			} else {
				$controller->editConfirm($id);
			}
			break;

		default:
			break;
	}


	class ContentsController {
		//プロパティ
		private $action = '';
		private $resource = '';
		private $viewOptions = '';
		private $categories = '';
		private $session = array();
		// private $categories = '';

	public function add(){
		$content = new Content();
					var_dump($_POST);
		$this->categories = $content->selectCategories();
		$this->action='add';
		$this->resource='contents';
		if (!empty($_POST)) {
			$kakuninn = $_POST;

			if ($kakuninn['Store_Name']=='') {
				$erorr['Store_Name'] = 'blank';
			}
			var_dump($_FILES);
			
			$fileName = $_FILES['Photo']['name'];
			  if (!empty($fileName)) {
				$ext = substr($fileName, -3);
				if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png' && $ext != 'GIF' && $ext != 'GIF' && $ext != 'PNG') {
				  $error['picture_path'] = 'type';
				}
			  }
			  if (empty($error)) {
			// エラーがなかったら処理する
				$picture_path = date('YmdHis') . $fileName;
				move_uploaded_file($_FILES['picture_path']['tmp_name'], '../member_picture/' . $picture_path);
				$_SESSION['join'] = $_POST;
				$_SESSION['join']['picture_path'] = $picture_path;
				// check.phpへ遷移
				header('Location: add_confirm');
				// これより以下のコードを処理しないようにexit()で抜ける
				exit();
			  }

		}
		include('views/layout/application.php');


	}
	public function addConfirm($id) {
		// var_dump($session);
		$content = new Content();
		$this->categories = $content->selectCategories();
		$this->resource = 'contents';
		$this->action = 'add_confirm';
		// $this->session = $post;
		// echo $this->session['Category'];
		include('views/layout/application.php');

	}
	public function editConfirm($id) {
		// $content = new Content();
		$this->resource = 'contents';
		$this->action = 'edit_confirm';
		include('views/layout/application.php');

	}
	
	}
 ?>

 <?php

	session_start();
	//$GETパラメータ取得
	//explode関数:第二引数の文字列を第一引数で分割し、配列で返す関数
	$params = explode('/', $_GET['url']);

	//パラメータの分解
	$resource = $params[0];
	$action = $params[1];
	$id = 0;
	$post = array();

	//idがあった場合idも取得する
	if (isset($params[2])) {
		$id = $params[2];
	}
	//POST送信されたらtitle,bodyを取得
	// if (isset($_POST['title'])&&isset($_POST['body'])) {
	if(isset($_POST)&&!empty($_POST)){
		$post = $_POST;
	}
	$_SESSION['add'] = $post;
	// $_SESSION['edit'] = $post;
	// var_dump($SESSION['add']);

	// echo ("routes.phpにきました。");
	//コントローラの呼び出し
	require('controllers/'.$resource.'_controller.php');
?>

<div id="contact">
	<div class="contact fullscreen parallax">
		<div class="overlay02">
			<div class="container">
				<div class="row contact-row">
					<!-- /.contact form -->
					<div class="col-sm-7 contact-right">
						<form method="post" id="contact-form" class="form-horizontal" action=""  enctype="multipart/form-data" onSubmit="alert('Thank you for your feedback!');">
							<!-- カテゴリ -->
						<div class="btn-section dropdown01">
						 <select class="" name="Category">
							<option value="1">Category</option>
							<?php foreach ($this->categories as $category): ?>
									<?php if ($category['category_id'] == $this->viewOptions['category_id']):?>
										<option value="<?php echo $category['category_id'];?>" selected><?php echo $category['category_name']; ?></option>
									<?php else: ?>
										<option value="<?php echo $category['category_id'];?>"><?php echo $category['category_name']; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
						</div>
						 </select>
							<!-- 店の名前 -->
						<div class="category">
							<input type="text" name="Store Name" placeholder="Store Name" class="form-control input-lg" value="" required>
							<?php if(isset($erorr['Store_Name']) && $erorr['Store_Name'] == 'blank'): ?>
							<p class="post">* 名前を入れてください。</p>
						  <?php endif; ?>
						</div>
							<!-- 場所の写真 -->
						<!-- <div class="category">
							<input type="text" name="Location" placeholder="Location" class="form-control input-lg" value="">
							<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
							<script type="text/javascript" src="js/jquery.js"></script>
   							<script type="text/javascript" src="js/map.js"></script>
   							<div id="map" class="map01"></div>
						</div> -->
						<!-- <div align="right" style="float: right">
							<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
							<script type="text/javascript" src="js/jquery.js"></script>
   							<script type="text/javascript" src="js/map.js"></script>
   							<div id="map" style="width:200px; height:200px"></div>
   						</div> -->
   						 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
						<!-- googlemap API -->
						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
						<!-- googlemap API 実装 -->
						<script type="text/javascript">
							google.maps.event.addDomListener(window, 'load', function()
							{
								// La Guardia Flats2の経緯度
								var lng = 123.90381932258606;
								var lat = 10.329200473939935;
								var latlng = new google.maps.LatLng(lat, lng);

								var mapOptions = {
									zoom: 15,
									center: latlng,
									mapTypeId: google.maps.MapTypeId.ROADMAP,
									scaleControl: true
								};
								// マップを表示する
								var mapObj = new google.maps.Map(document.getElementById('gmap'), mapOptions);
								// マップ上にマーカーを表示する
								var markerObj = new google.maps.Marker({
									position: latlng,
									map: mapObj
								});

								// クリック時のイベント
								google.maps.event.addListener(mapObj, 'click', function(e)
								{
									// ポジションを変更
									markerObj.position = e.latLng;
									// マーカーをセット
									markerObj.setMap(mapObj);
									alert("経度:" + e.latLng.lat() + "  緯度:" + e.latLng.lng());
								})
							});
						</script>
						<div id="gmap" class="map01"style=""></div>

							<!-- 写真 -->
						<div class="category">
						   	<input type="file" name="Photo" placeholder="Photo" class="form-control input-lg" value="" >
						   	 <?php if (isset($error['picture_path']) && $error['picture_path'] == 'type'): ?>
							<p class="post">* 写真などは「.gif」「.jpg」の画像を指定してください。</p>
						  <?php endif; ?>
						  <?php if(!empty($post)): ?>
							<p class="post">* 恐れ入りますが、画像を改めて指定してください。</p>
						  <?php endif; ?>
						</div>
						  
								<!-- 評価 -->
						<div class="abc">
						<span>Review:</span>
							<p class="abc01">
				   			<input type="radio" name="point" value="1">１
							<input type="radio" name="point" value="2">２
							<input type="radio" name="point" value="3" checked>３
							<input type="radio" name="point" value="4">４
							<input type="radio" name="point" value="5">５
							</p>
			  			</div>
						<!-- </tr> -->
							 <!-- コメント -->

						<div class="category">
			  				<textarea name="comment" rows="5" cols="10" id="comment" class="form-control input-message fadeInUp"  placeholder="Comment" required></textarea>
			  			</div>
							<!-- 戻るボタン -->
						<div class="col-sm-4 contact-right">
							<a href="/NexSeedPortal/contents/index/"><input type="button" name="bitton" value="Back"class="btn01 btn-success fadeInUp" /></a>
						</div>
							<!-- 確認ボタン -->
						<div class="col-sm-4 contact-left">
							<input type="submit" name="submit" value="Post" class="btn btn-success fadeInUp">
						</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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