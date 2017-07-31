<body>

	
	 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="<?php echo $file_dir_racine.'js/materialize.min.js' ?>"></script>
     <script type="text/javascript" src="<?php echo $file_dir_racine.'js/_client.js' ?>"></script>

     <header>
         <nav class="section-header">
		    <div class="nav-wrapper maxW">
		      <a href="#!" class="brand-logo">Logo</a>
		      <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="<?php echo $file_dir_racine ?>index.php">Accueil</a></li>
		        <li><a href="">Components</a></li>
		        <?php 
		           if(_user_is_connected()) {
		              
		               echo ' <li><a href="index.php?r=deconnexion">Déconnexion</a></li>';
		           }
	               else {
	                   echo '<li><a href="login/login.php">Connexion</a></li>';
	               }
		           
		        ?>
		      
		       
		      </ul>
		      <ul class="side-nav" id="mobile-nav">
		        <li><a href="<?php echo $file_dir_racine ?>index.php">Accueil</a></li>
		        <li><a href="">Components</a></li>
		        <li><a href="">Javascript</a></li>
		        <?php 
		           if(_user_is_connected()) {
		              
		               echo ' <li><a href="index.php?r=deconnexion">Déconnexion</a></li>';
		           }
	               else {
	                   echo '<li><a href="login/login.php">Connexion</a></li>';
	               }
		        ?>
		      </ul>
		    </div>
		  </nav>
     </header>