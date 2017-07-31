<?php 
  //   if(isset($_POST['post_login_submit'])) {
  //   	if(isset($_POST['post_login_username']) && isset($_POST['post_login_password']) && !empty($_POST['post_login_username']) && !empty($_POST['post_login_password'])) {

		// 	global $db;
		//     $sql=$db->query('SELECT password FROM `users` WHERE username=\''.$_POST['post_login_username'].'\' LIMIT 1');
		//     while($data=$sql->fetch()) {
		//     	if(sha1($_POST['post_login_password']) == $data['password']) {
		//     		$_SESSION['user_login']['username'] = $_POST['post_login_username'];
		//     		$_SESSION['user_login']['isonline'] = true;
		//     		$rand = rand(100000, 999999);
		//     		$key = session_id().$rand;
		//     		$_SESSION['user_login']['cookieid'] = $key;
		//     		setcookie($_POST['post_login_username'], $key, time()+(5*60), '/');
		//     		echo 'OK';
		//     		print_r($_COOKIE);
		//     	}
		// 	}
		// }
  //   }

    if(isset($_GET['r'])) {
    	switch($_GET['r']) {
    		case 'deconnexion' : {
    			session_destroy();
    			header('Location:index.php');
    			break;
    		}
    	}
    }
?>