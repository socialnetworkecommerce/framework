<?php 	

	class MVC extends Controller
	{

		public function __construct()
		{
			$this->mvcModel = $this->model('mvcModel');
		}

		public function index()
		{
			$data =[
				'fromModel' => $this->mvcModel->lorem()
			];

			$this->view('mvc/index' , $data);
		}
	}