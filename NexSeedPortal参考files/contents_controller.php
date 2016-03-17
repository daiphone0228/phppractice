<?php 
	// session_start();
	require('models/content.php');

	//ログインチェックを実装
	// require('function.php');
	// require('dbconnect.php');
	// if (isset($post['email']) && !empty($post['email'])) {
	// 	login($post,$db);
	// } elseif (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
	// 	login2($_SESSION,$db);
	// } else {
	// 	header('Location: /NexSeedPortal/users/login/');
	// }

	//コントローラのクラスをインスタンス化
	$controller = new ContentsController();

	//アクション名によって、呼び出すメソッドを変える
	//$action (グローバル変数)は、routes.phpで定義されているもの

	switch ($action) {
		case 'show':
			$controller->show($id);
			break;

		case 'edit':
			$controller->edit($id);
			break;

		case 'delete':
			$controller->delete($id);
			break;

		case 'confirm':
			$_SESSION['edit'] = $post;
			$controller->editConfirm($id, $fileName, $files);
			break;

		case 'update':
			$controller->update($id);
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
		// private $files = '';
		private $post = array();


		public function show($id) {
			// モデルを呼び出す
			$content = new Content();
			$this->viewOptions = $content->show($id);

			// アクション名を設定する
			$this->resource = 'contents';
			$this->action = 'show';

			// ビューを呼び出す
			include('views/layout/application.php');
		}

		public function edit($id) {
			$content = new Content();
			$this->viewOptions = $content->selectContents($id);
			$this->categories = $content->selectCategories();
			$this->resource = 'contents';
			$this->action = 'edit';

			include('views/layout/application.php');
		}

		public function editConfirm($id, $fileName, $files) {
		  	if (isset($_FILES['picture_path']['name']) && !empty($_FILES['picture_path']['name'])) {
				$fileName = $_FILES['picture_path']['name'];
				$files = $_FILES['picture_path'];
				if (!empty($fileName)) {
					$ext = substr($fileName, -3);
					if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png' && $ext != 'JPG' && $ext != 'GIF' && $ext != 'PNG'){
						$_SESSION['error'] = 'error_prefix';
						header('Location: /NexSeedPortal/contents/edit/'. $id);
					} else {
						$_SESSION['error'] = 'select_again';
						$picture_path = date('YmdHis') . $fileName;
						move_uploaded_file($_FILES['picture_path']['tmp_name'], 'webroot/asset/images/post_images/'. $picture_path);
						$files = $picture_path;
					}
				} else {
					$_SESSION['error'] = 'no_error';
				}
				$_SESSION['edit'] += array('picture_path'=>$files);
			}
			$content = new Content();
			$this->categories = $content->selectCategories();
			$this->files = $files;
			$this->resource = 'contents';
			$this->action = 'edit_confirm';

			include('views/layout/application.php');
		}

		public function update($id) {
			$content = new Content();
			$content->update($id);

			header('Location: /NexSeedPortal/contents/show/'.$id);
		}


		public function delete($id) {
			$content = new content();
			$content->delete($id);

			header('Location: /NexSeedPortal/contents/index');
		}

		


	}

 ?>