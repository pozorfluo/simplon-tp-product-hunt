<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="./public/css/style.css">
            <title>Product Hunt</title>
            
</head>
<body> 
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
		
			<a class="navbar-brand" href="index.php">
			<img src="./public/images/icons/product-hunt.png" >
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

		
            
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
			<?php if (isset($_COOKIE['user_name'])){?>
                    
            	  	<div class="col-5 justify-content-center p-0">
						
					 	 <form class="form-inline">
            	          <input class="form-control form-control-sm " type="search" placeholder="Search" aria-label="Search">
            	          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form> 
						
					</div>

					<div class="col-4 d-flex justify-content-center  p-0 mr-4 mt-0">
						<?php if (isset($_COOKIE['user_name'])){?>

							<div class="pl-3 ">
								
								<div class="row">

                                    
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
							</div>
						<?php } ?>
					</div>
					<div class="col-3 d-flex justify-content-center  p-0">
						<form  method="post" action="index.php"> 

							<select name="catégorie_list" id="catégorie_list">
								<?php 
								$categorie = $producthunt_api->getCategories();
								for ($i=0; $i <count($categorie) ; $i++) { 
									echo ("<option value=".$categorie[$i]['category_id'].">".$categorie[$i]['name']."</option>");
								}?>
	
							</select>
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Choisir</button>
						</form>
					</div>

			<?php }?>
            </div>
		
            <div class="collapse navbar-collapse m-0 justify-content-end " id="navbarSupportedContent">
              	<div class="align-items-end flex-column">
				  <?php if (isset($_COOKIE['user_name'])){?>
                      <a class="nav-link" href="?controller=Home&action=Logout" ><h4>Deconnexion</h4></a>
                    <?php } ?>
            	</div>  
			</div>            
        
        </nav>    
	</header>
	
	