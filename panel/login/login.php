<?php 
	$file_dir_racine = '../';

	$pageTitle = "Login";


    require_once($file_dir_racine.'inc/head.inc.php');
    require_once($file_dir_racine.'inc/header.inc.php');

    if(isset($_SESSION['user_login'])) {
    	if($_SESSION['user_login']['isonline'] == true) {
    		header('Location: http://localhost/panel/index.php');
    	}
    }

    ?>
	
    <main class="maxW container section-main" style="height: 500px;width: 100%;">
	 <div class="row container-login margin-auto">
	    <h5>Login :</h5>
	    <br />
	    <form id="form-login" class="col s12" method="post" action="">
	      <div class="row">
	        <div class="input-field col s12">
	          <i class="material-icons prefix">account_circle</i>
	          <input name="post_login_username" id="icon_prefix" type="text" class="validate">
	          <label for="icon_prefix">Nom d'utilisateur</label>
	        
	        </div>

	      </div>
	      <div class="row">
	        <div class="input-field col s12">
	          <i class="material-icons prefix">vpn_key</i>
	          <input name="post_login_password" id="icon_telephone" type="password" class="validate">
	          <label for="icon_telephone">Mot de passe</label>
	          
	        </div>
	      </div>
	      <input name="post_login_submit" type="button" class="waves-effect waves-blue btn align-right clearAft" value="Connexion">
	      <br />
	      <br />
	    </form>
	  </div>
	 



    </main>

<?php
    require_once($file_dir_racine.'inc/footer.inc.php');
?>