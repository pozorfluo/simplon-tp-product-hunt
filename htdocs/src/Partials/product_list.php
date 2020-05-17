<div></div>
<?php ###################################### Affiche La liste des produits ###########################################

function productDisplay ($products,$userId,$votesList){
    
         for ($i=0; $i < count($products) ; $i++) { 

            if (in_array($products[$i]["product_id"], $votesList)) {
                $voted = true;
               }else{
                $voted = false;
                   
               }
?>

        <div id="div-product" class="div-product border-0 row m-0 p-4"  data-toggle="modal" data-target=".bd-example-modal-xl"
             data-product-id='<?= $products[$i]["product_id"] ?>'
             data-product-name='<?= $products[$i]["name"] ?>'
             data-product-summary='<?= $products[$i]["summary"] ?>' 
             data-product-website='<?= $products[$i]["website"] ?>'
             data-product-img='<?= $products[$i]["thumbnail"] ?>'
        >
                
                <div class="col-12 col-md-2 align-items-center justify-content-center my-auto p-0 ">
                     <div class = "product-img">
                         <img src="<?=$products[$i]['thumbnail']?>">
                     </div>

                </div>
             
                <div class="col-12 col-md-8 text-left"> 

                    <h3 class="title" ><?=$products[$i]['name']?></h3><br>
                    <p class="summary" ><?=$products[$i]['summary']?></p>         
                    <hr>
                    <div  class="d-flex justify-content-around link_product">
                        <div class=" website" >
                            <a href ='<?=$products[$i]['website']?>'>
                                <img src="public/images/icons/website-link.svg" height="32" width="32"></img>
                                website
                            </a>
                        </div>
                        <div class="comment">
                            <p><?=$products[$i]['comments_count']?>
                            <img src="public/images/icons/comments.svg" height="32" width="32"></img>
                            </p>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-md-2 d-flex align-items-center justify-content-center">

                    <div class="up-vote border-0">
                    <button type="button" 
                            class="btn btn-outline-light p-0 border-0 btn-upvote"
                            data-user-id='<?= $userId ?>'
                            data-user-id-voted='<?= $voted ?>'

                            data-product-id='<?= $products[$i]["product_id"] ?>' 
                     >
                        <img src="public/images/icons/upvote.svg" height="48" width="48"></img>
                        <h4 class="voteCount"><?=$products[$i]['votes_count']?></h4>
                    </button>
                    </div>

                </div>
            </a>
        </div>
 
<?php  
        }//Fermeture FOR
    } //Fermeture Fonction
?>

<div class="row px-2 pb-2">

<a href='#' onclick='document.getElementById("created_at").submit()'>Récent</a>
<form  method="post" id="up_vote" action="index.php"> 
    <input type="hidden" name="orderBy" value="up_vote"/> 
</form> 

<a href='#' onclick='document.getElementById("up_vote").submit()'>| Populaire |</a>
<form  method="post" id="created_at" action="index.php"> 
    <input type="hidden" name="orderBy" value="created_at"/> 
</form> 

<a href='#' onclick='document.getElementById("catégorie").submit()'>Catégories</a>	
<form  method="post" id="catégorie" action="index.php"> 
    <input type="hidden" name="orderBy" value="catégorie"/> 
</form> 

</div>

<?php
    $userId = $producthunt_api->getUserbyName($_COOKIE['user_name']);
    $votesList = $producthunt_api->getUserVotes($userId['user_id']);
    

    if ((isset($_GET['category']) ) == null){
        //Affichage des produit par defaut
        if (isset($_POST['orderBy']) == null || $_POST['orderBy'] === 'default'){
 
        
            // $products = $producthunt_api->getProductsCollection(10);
            $products = $producthunt_api->getFreshProducts();

            productDisplay ($products, $userId['user_id'], $votesList);
        }
        //Affichage des produit par catégorie
        else if (isset($_POST['orderBy']) && $_POST['orderBy'] === 'catégorie'){ 
           $categorie = $producthunt_api->getCategories();
            for ($i=0; $i < count($categorie) ; $i++) { 
                echo '<h3>'."Catégorie : ".$categorie[$i]['name'].'</h3>';
                echo '<br>';
    
                $products = $producthunt_api->getProductsCollection($categorie[$i]['category_id']);

                    productDisplay ($products, $userId['user_id'], $votesList);
            }
        }
        //Affichage des produit par date de création
        else if (isset($_POST['orderBy']) && $_POST['orderBy'] === 'created_at'){ 
            $products = $producthunt_api->getFreshProducts();

            productDisplay ($products, $userId['user_id'], $votesList);
        }
        //Affichage des produit par Vote
        else if (isset($_POST['orderBy']) && $_POST['orderBy'] === 'up_vote') {
            $products = $producthunt_api->getPopularProducts();

            productDisplay ($products, $userId['user_id'], $votesList);
        }
        
        }else{//Affichage d'une catégorie de produit
             if (isset($_GET['category']) ) {
            
                $categorie = $producthunt_api->getCategory($_GET['category']);
                $products = $producthunt_api->getProductsCollection(intval($categorie['category_id']));
                productDisplay ($products, $userId['user_id'], $votesList);
            
            }
        }





?>

<!--productModal-->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
   
    </div>
  </div>
</div>
