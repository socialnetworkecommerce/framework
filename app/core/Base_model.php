<?php 
 	abstract class Base_model{

 		use DBHelperTrait;
 		
 		protected $db;
 		///DBVENDOR , DBHOST , DBNAME , DBUSER , DBPASS
 		public function __construct(){

 			$this->db = new Database();
 		}
 	}