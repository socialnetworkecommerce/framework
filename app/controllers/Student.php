<?php 	

	class Student extends Controller
	{

		public function __construct()
		{
			//load user model
			$this->studentModel = $this->model('studentModel');
		}

		public function list()
		{

		}

		public function register()
		{
			$data = [
				'title' => 'Student Registration Page'
			];

			if($this->request() === 'POST') {
				$this->studentModel->register($_POST);
			}else{
				$this->view('student/register' , $data);
			}
		}
		// public function preview()
		// {

		// }
		public function edit()
		{

		}
	}