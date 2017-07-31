<?php
	$file_dir_racine = '../';
	require $file_dir_racine.'inc/require.inc.php';

	if(isset($_POST['post_login_username']) && isset($_POST['post_login_password']) && !empty($_POST['post_login_username']) && !empty($_POST['post_login_password'])) {

		global $db;
	    $sql=$db->query('SELECT password FROM `users` WHERE username=\''.$_POST['post_login_username'].'\' LIMIT 1');
	    while($data=$sql->fetch()) {
	    	if(sha1($_POST['post_login_password']) == $data['password']) {
	    		$_SESSION['user_login']['username'] = $_POST['post_login_username'];
	    		$_SESSION['user_login']['isonline'] = true;
	    		$rand = rand(100000, 999999);
	    		$key = session_id().$rand;
	    		$_SESSION['user_login']['cookieid'] = $key;
	    		setcookie($_POST['post_login_username'], $key, time()+(60), '/');
	    		echo 'OK';
	    	}
		}
	}
    

?>