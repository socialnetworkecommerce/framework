<?php 	

	class StudentModel extends Base_model
	{

		public function initTable()
		{

			// $sql = "CREATE TABLE IF NOT EXISTS users(
			// 	id int(10) not null primary key auto_increment,
			// 	studno varchar(25) not null unique,
			// 	firstname varchar(100) not null,
			// 	lastname varchar(100) not null,
			// 	middlename varchar(100) not null,
			// 	year char(5) ,
			// 	gender enum('male' , 'female'),
			// 	course varchar(50),
			// 	created_at timestamp default now()
			// )";
			// $this->db->query($sql)
			// if($this->db->execute()){
			// 	Flash::set('Table has been created');
			// }else{
			// 	Flash::set($this->db->error());
			// }
			
		}

		public function register($studentInfo)
		{

			// echo 'Register from model';
			extract($studentInfo);

			$sql = "INSERT INTO students(studno , firstname , lastname , middlename , year ,
			gender , course )
			VALUES('$studno' , '$firstname' , '$lastname' , '$middlename' , '$year',
			'$gender' , '$course')";

			$this->db->query($sql);

			if($lastid = $this->db->insert()){
				Flash::set("New user has been inserted" , 'success');
				redirect('student/list');
			}else
			{
				Flash::set('Something went wrong');
			}
		}

	}