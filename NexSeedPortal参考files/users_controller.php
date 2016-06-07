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

			if(isset($post) && !empty($post)) {
				$this->email = htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8');
				$this->password = htmlspecialchars($post['password'], ENT_QUOTES, 'UTF-8');
			}

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