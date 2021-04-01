<?php 
	session_start();
	$username = "";
	$email = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$db = mysqli_connect('localhost:3306', 'root', '', 'registration');

	//creer
	if (isset($_POST['reg_user'])) {
		//id
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		if (empty($username)) { array_push($errors, "Vous devez mettre votre pseudo."); }
		if (empty($email)) { array_push($errors, "Vous devez mettre votre E-Mail."); }
		if (empty($password_1)) { array_push($errors, "Un mot de passe est requis."); }

		if ($password_1 != $password_2) {
			array_push($errors, "Les deux mots de passes ne sont pas identique.");
		}

		if (count($errors) == 0) {
			$password = md5($password_1);//crypt mdp
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Vous êtes connecté.";
			header('location: index.php');
		}

	}
	$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	if ($user) {
		if ($user['username'] === $username) {
		  array_push($errors, "Username already exists");
		}
	
		if ($user['email'] === $email) {
		  array_push($errors, "email already exists");
		}
	  }
	

	
	// LOGIN
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		
		$password = mysqli_real_escape_string($db, $_POST['password']);
		
		if (empty($username)) {
			array_push($errors, "Un pseudo est requis.");
		}
		if (empty($password)) {
			array_push($errors, "Un mot de passe est requis.");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Vous êtes connecté.";
				header('location: index.php');
			}else {
				array_push($errors, "Votre pseudo ou votre mot de passe ne correspond pas au compte.");
			}
		}
	}

?>