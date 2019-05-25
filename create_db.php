<?php
	echo "<br />Creating db now....";

	// mysql://b31145a0578643:10c62e01@us-cdbr-iron-east-02.cleardb.net/heroku_5795f41579d14c9?reconnect=true
   $dbhost="us-cdbr-iron-east-02.cleardb.net";
   $dbuser="b31145a0578643";
   $dbpass="10c62e01";
   $dbname="heroku_5795f41579d14c9";	

   $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $db->setAttribute(PDO::MYSQL_ATTR_FOUND_ROWS, true);   

   //*
   try {
		$sql_create_applications_tbl = <<<EOSQL
			CREATE TABLE IF NOT EXISTS applications (
			  id int(11) NOT NULL AUTO_INCREMENT,
			  name varchar(150) NOT NULL,
			  cape varchar(10) NOT NULL,
			  mask varchar(10) NOT NULL,
			  costume varchar(10) NOT NULL,
			  superpower varchar(50) NOT NULL,
			  ownerlogin varchar(50) NOT NULL,
			  addeddate datetime NOT NULL,
			  verify int(11) NOT NULL,
			  status int(11) NOT NULL DEFAULT '0',
			  PRIMARY KEY (id)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1
		EOSQL;  

		$result = $db->exec($sql_create_contacts_tbl); 	
		if($result !== false){
			echo "<br/>Table contacts created....";
		} else {
		 	echo "<br/>Error creating table contacts!";
		}		

   }
   catch(PDOException $e) {
      $errorMessage = $e->getMessage();
      echo "<br />$errorMessage";
   }
   //*/ 

   //*
   try {
		$sql_create_users_tbl = <<<EOSQL
			CREATE TABLE IF NOT EXISTS users (
			  id int(11) NOT NULL AUTO_INCREMENT,
			  login varchar(50) NOT NULL,
			  password varchar(250) NOT NULL,
			  name varchar(150) NOT NULL,
			  email varchar(250) NOT NULL,
			  mobileno varchar(15) NOT NULL,
			  photo varchar(150) NOT NULL DEFAULT 'default.png',
			  addeddate datetime NOT NULL,
			  PRIMARY KEY (id)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		EOSQL;

		$result = $db->exec($sql_create_users_tbl); 	
		if($result !== false){
			echo "<br/>Table users created....";
		} else {
		 	echo "<br/>Error creating table users!";
		}	   	

   }
   catch(PDOException $e) {
      $errorMessage = $e->getMessage();
      echo "<br />$errorMessage";
   }
   //*/ 

   //*
   try {
		$sql_insert_user_into_users = <<<EOSQL
			INSERT INTO users (login, password, name, email, mobileno, photo, addeddate) VALUES ('admin', 'b42a6d93d7969152e0f18f0e41c0f4f2bc9625f06c43dcbc22f6ffb2ffdd6137d93c1cdbb16', 'admin', 'admin@gmail.com', '0123456789', 'default.png', NOW());
		EOSQL;

		$result = $db->exec($sql_insert_user_into_users); 	
		if($result !== false){
			echo "<br/>User ali created....";
		} else {
		 	echo "<br/>Error inserting user ali!";
		}	   	

   }
   catch(PDOException $e) {
      $errorMessage = $e->getMessage();
      echo "<br />$errorMessage";
   }
   //*/    

     

