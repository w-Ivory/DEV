<?php 
	$file_dir_racine = '';
	
	$pageTitle = "Accueil";

    require_once('./inc/head.inc.php');
    require_once('./inc/header.inc.php');



    ?>

    <main>
        <?php
        if(isset($_SESSION['user_login'])) {
        	if($_SESSION['user_login']['isonline'] == true) {
        		echo 'Username : '.$_SESSION['user_login']['username'].'<br /> Cookie : '.$_SESSION['user_login']['cookieid'];
        	}
        }
        else {
        	echo 'Vous ne semblez pas être en ligne.';
        }




        ?>

        <div class="carousel">
        	
		    <a class="carousel-item" href="article.php?id=1"><img src="https://lorempixel.com/250/250/nature/1"></a>
		    <a class="carousel-item" href="article.php?id=2"><img src="https://lorempixel.com/250/250/nature/2"></a>
		    <a class="carousel-item" href="article.php?id=3"><img src="https://lorempixel.com/250/250/nature/3"></a>
		    <a class="carousel-item" href="article.php?id=4"><img src="https://lorempixel.com/250/250/nature/4"></a>
		    <a class="carousel-item" href="article.php?id=5"><img src="https://lorempixel.com/250/250/nature/5"></a>
		</div>
    </main>

<?php
    require_once('./inc/footer.inc.php');
?>