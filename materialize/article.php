<?php 
	$file_dir_racine = '';
	
	$pageTitle = "Article";

    require_once('./inc/head.inc.php');
    require_once('./inc/header.inc.php');

    function user_cart_add($product) {
        if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if(!isset($_SESSION['cart'][$product])) {
            $_SESSION['cart'][$product] = 1;
        }
        else $_SESSION['cart'][$product] ++;

        echo '
             <script>
                    var $toastContent = $("<span>Vous avez ajouté l\'article n° '.$product.' a votre panier.</span>");
                    Materialize.toast($toastContent, 10000);
              </script>
        ';
        return 1;
    }

    if(count($_POST) && count($_GET)) {  // AJOUTER UN PRODUIT
        if(isset($_POST['post_add_cart']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
            $product = intval($_GET['id']);
            if($product > 0) {
                user_cart_add($product);
            }
        }
    }

    ?>

    <main>
       <div style="width: 50%; margin:0 auto;" >
       <form method="post" action="">
      
       <?php
           if(count($_GET)) {   // AFFICHER L'ARTICLE
               if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                   switch(intval($_GET['id'])) {
                       case 1 : {
                       ?>
                           <h2>Article 1</h2>
                           <hr />
                           <img src="https://lorempixel.com/250/250/nature/1" />
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, eum, cumque. Totam rem, explicabo beatae tenetur iste perspiciatis culpa quam asperiores saepe eum aliquid sed exercitationem, dicta recusandae temporibus sunt.</p>
                           <input name="post_add_cart" type="submit" class="waves-effect waves-blue btn align-right clearAft" value="Ajouter au panier">
                       <?php
                           break;
                       }
                       case 2 : {
                       ?>
                           <h2>Article 2</h2>
                           <hr />
                           <img src="https://lorempixel.com/250/250/nature/2" />
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, eum, cumque. Totam rem, explicabo beatae tenetur iste perspiciatis culpa quam asperiores saepe eum aliquid sed exercitationem, dicta recusandae temporibus sunt.</p>
                           <input name="post_add_cart" type="submit" class="waves-effect waves-blue btn align-right clearAft" value="Ajouter au panier">
                       <?php
                            break;
                       }
                       case 3 : {
                        ?>
                           <h2>Article 3</h2>
                           <hr />
                           <img src="https://lorempixel.com/250/250/nature/3" />
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, eum, cumque. Totam rem, explicabo beatae tenetur iste perspiciatis culpa quam asperiores saepe eum aliquid sed exercitationem, dicta recusandae temporibus sunt.</p>
                           <input name="post_add_cart" type="submit" class="waves-effect waves-blue btn align-right clearAft" value="Ajouter au panier">
                       <?php
                           break;
                       }
                       case 4 : {
                        ?>
                           <h2>Article 4</h2>
                           <hr />
                           <img src="https://lorempixel.com/250/250/nature/4" />
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, eum, cumque. Totam rem, explicabo beatae tenetur iste perspiciatis culpa quam asperiores saepe eum aliquid sed exercitationem, dicta recusandae temporibus sunt.</p>
                           <input name="post_add_cart" type="submit" class="waves-effect waves-blue btn align-right clearAft" value="Ajouter au panier">
                       <?php
                           break;
                       }
                       case 5 : {
                        ?>
                           <h2>Article 5</h2>
                           <hr />
                           <img src="https://lorempixel.com/250/250/nature/5" />
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, eum, cumque. Totam rem, explicabo beatae tenetur iste perspiciatis culpa quam asperiores saepe eum aliquid sed exercitationem, dicta recusandae temporibus sunt.</p>
                           <input name="post_add_cart" type="submit" class="waves-effect waves-blue btn align-right clearAft" value="Ajouter au panier">
                       <?php
                           break;
                       }
                       default : header('Location:index.php');
                   }
               }
           }
       ?>
       </form>

       <!-- AFFICHER LE PANIER -->
       <a class="waves-effect waves-light btn modal-trigger" href="#modal-cart">Voir le panier</a>
       </div> 

      <!-- AFFICHAGE DU PANIER -->
      <div id="modal-cart" class="modal">
        <div class="modal-content">
          <h4>Panier</h4>
          
          <?php
              if(!isset($_SESSION['cart'])) echo '<p>Vous n\'avez aucun produit dans votre panier.</p>';
              else {
                echo '<ul>';
                foreach ($_SESSION['cart'] as $key => $value) {
                    echo '<li><a href="article.php?id='.$key.'">Article n° '.$key.'</a> - Quantitée : '.$value.'</li>';
                }
                echo '</ul>';
              }
          ?>
        </div>
        <div class="modal-footer">
          <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
        </div>
      </div> 
    </main>

<?php
    require_once('./inc/footer.inc.php');
?>
            