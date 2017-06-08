<?php
		
		class User {
			public $name = "Matvey";
			public $password = 123;
			public function __construct($name,$password)
			{
				echo $this -> name = $name;
				echo "<br>";
				echo $this -> password = $password;

			}

	}

	class nameUser extends User{
				public $role = "admin";
				public function __construct($name,$password,$role){
					parent::__construct($name,$password);
				 echo $this -> role = $role;

	}}
$user = new nameUser('raul',02122 ,'adminnnnn');


?>