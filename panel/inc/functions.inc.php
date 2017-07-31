<?php
    // function _user_login($user, $password) {
    //     global $db;
    //     $query = $db->query('SELECT * FROM '.MYSQL_TABLE_USER.' WHERE name=\''.$user.'\' LIMIT 1');
    //     while ($data=$query->fetch()) {
    //         if($data['password'] == sha1($password)) {
    //             $_SESSION['user_login']['isonline'] = true;
    //             // $_SESSION['user_login']['admin'] = $data['admin'];
    //             return true;
    //         } 
    //     }
    //     return false;
    // }

    function _user_disconnect() {
        if(!_user_is_connected()) return false;
        unset($_SESSION['user_login']);
        return true;
    }

    function _user_is_connected() {
        return (isset($_SESSION['user_login']['isonline']) && $_SESSION['user_login']['isonline'] == true) ? true : false;
    }




    function _client_url_init() {
        $_SESSION['client_get_old_url'] = (isset($_SESSION['client_get_url'])) ? $_SESSION['client_get_url'] : '';
        $_SESSION['client_get_url'] = 'http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'';
    }
    function _client_file_init() {
        $path = $_SERVER['PHP_SELF']; 
        $_SESSION['client_get_old_file'] = (isset($_SESSION['client_get_file'])) ? $_SESSION['client_get_file'] : '';
        $_SESSION['client_get_file'] = basename ($path);
    }

    function _client_get_url($type='new') {   // type = new || old
        if($type == 'new' && isset($_SESSION['client_get_url']) && !empty($_SESSION['client_get_url'])) {
            return $_SESSION['client_get_url'];
        }
        else if($type == 'old' && isset($_SESSION['client_get_old_url']) && !empty($_SESSION['client_get_old_url'])) {
            return $_SESSION['client_get_old_url'];
        }
        return _get_url_params('index.php');
    }
    function _client_get_file($type='new') {
        if($type == 'new' && isset($_SESSION['client_get_file']) && !empty($_SESSION['client_get_file'])) 
            return $_SESSION['client_get_file'];
        else if($type == 'old' && isset($_SESSION['client_get_old_file']) && !empty($_SESSION['client_get_old_file'])) 
            return $_SESSION['client_get_old_file'];
        return 'index.php';
    }
    function _client_redirect($filename, $refresh=0) {
        if (!headers_sent()) {
            header(($refresh==0)?'Location: '.$filename.'':'refresh:'.$refresh.'; url='.$filename.'');
        }
        else {
            if($refresh != 0) 
                sleep($refresh);
            echo '<script type="text/javascript">';
            echo "window.location.href=\"$filename\"";
            echo '</script>';
            echo '<noscript>';
            echo "<meta http-equiv=\"refresh\" content=\"0; url=$filename\" />";
            echo '</noscript>';
        }
    }

    function _client_verif_cookies() {
        if(isset($_SESSION['user_login'])) {
            if(isset($_COOKIE[$_SESSION['user_login']['username']])) {
                if($_SESSION['user_login']['cookieid'] != $_COOKIE[$_SESSION['user_login']['username']]) {
                    unset($_SESSION['user_login']);
                    session_destroy();
                    header('Location : http://localhost/panel/login/login.php');
                }
            }
            else {
                unset($_SESSION['user_login']);
                session_destroy();
                header('Location : http://localhost/panel/login/login.php');
            }
        }
    }

?>