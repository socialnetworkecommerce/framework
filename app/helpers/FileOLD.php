<?php

	class File
	{	
		/*LIMIT*/
		private $limitSize = 50000;

		private $_file;
		private $_ok_file_extension = ['jpeg' , 'jpg' , 'png' , 'bitmap'];
		private $_errors = array();
		private $_dir;

		private $_prefix = '';
		public function setFile($file = null)
		{
			if(!empty($file['name']))
			{
				$this->_errors = 'No file found';
			}
			$this->_file = $file;
			$this->tmp_name = $file['tmp_name'];
			$this->name = $file['name'];
			
			//Extract extension on file name;
			$ext = explode('.', $this->name);
			//set file extension
			$this->ext = strtolower(end($ext));

			return $this;
		}

		public function setDIR($dir)
		{
			$this->_dir = $dir;
			return $this;
		}

		public function upload()
		{
			if(is_null($this->_file))
			{
				$this->addErrors('No file uploaded');
			}else
			{
				//check if extension is valid
				if($this->isValidExtension())
				{
					$this->uploadFile();
				}
				
			}
		}
		public function setPrefix($_prefix)
		{
			$this->_prefix = $_prefix;
			return $this;
		}
		public function getNewName()
		{
			return $this->newname;
		}

		public function getName()
		{
			return $this->name;
		}
		private function isValidExtension()
		{
			if(in_array(strtolower($this->ext),$this->_ok_file_extension))
			{
				return true;
			}else
			{
				$this->addErrors('Invalid Extension : ' .$this->ext);
			}
			return false;
		}
		private function uploadFile()
		{
			$newName = $this->generateName();

			if($this->checkFileSize()){
				try
				{
					if(move_uploaded_file($this->tmp_name,$this->_dir.'/'.$newName))
					{
						return true;
					}else{
						$this->addErrors('THE FILE IS NOT UPLOADED');
						return false;
					}
				}catch(Exception $e)
				{
					return $e->getMessage();
				}
			}else
			{
				return false;
			}
			

		}

		private function checkFileSize()
		{
			$fileSize = $this->_file['size'];

			if($fileSize > $this->limitSize){

				$this->addErrors('FILE IS TOO LARGE');
				return false;
			}

			return true;
		}
		private function generateName()
		{
			return $this->newname = strtolower($this->_prefix.''.random_gen().'.'.$this->ext);
		}

		private function addErrors($err)
		{
			array_push($this->_errors, $err);
		}

		public function errors()
		{
			if(!empty($this->errors)){
				return implode(',',$this->_errors);
			}
			return '';
		}
	}