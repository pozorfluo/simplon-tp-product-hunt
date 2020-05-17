<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
            <?php readfile(ROOT . 'resources/fonts/font-ibmplexsans.min.html');?>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="./public/css/style.css">
            <title>Product Hunt</title>
            
</head>
<body class="pt-5 mt-5"> 
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
		
			<a class="navbar-brand" href="index.php">
			<img src="./public/images/icons/product-hunt.png" >
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

		
            
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
			<?php if (isset($_COOKIE['user_name'])){?>
                    
            	  	<div class="col-5 justify-content-center p-0">
						
					 	 <form class="form-inline input-group">
            	          <input class="form-control " type="text" placeholder="..." aria-label="Search">
                          
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Search</button>
                            </div>
						</form> 
                        

					</div>

					<div class="col-4 d-flex justify-content-center  p-0 mr-4 mt-0">
						<?php if (isset($_COOKIE['user_name'])){?>

							<div class="pl-3 ">
								
								<div class="row">

									<a href='#' onclick='document.getElementById("created_at").submit()'>Fresh</a>
									<form  method="post" id="created_at" action="index.php"> 
                                        <input type="hidden" name="orderBy" value="created_at"/> 
                                    </form> 
                                    <span class="mx-2">|</span>
                                    <a href='#' onclick='document.getElementById("up_vote").submit()'>Popular</a>
                                    <form  method="post" id="up_vote" action="index.php"> 
                                        <input type="hidden" name="orderBy" value="up_vote"/> 
                                    </form> 
                                           
								</div>
							</div>
						<?php } ?>
                    </div>


<div class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    Categories<span class="caret"></span>
</a>
<ul class="dropdown-menu">
<?php 

    $categorie = $producthunt_api->getCategories();
    for ($i=0; $i <count($categorie) ; $i++) { 
        echo '<a class="dropdown-item" href="?category='.$categorie[$i]['category_id'].'">'.$categorie[$i]['name'].'</a>';
    }
?>
</ul>
</div>


			<?php }?>
            </div>
		
            <div class="collapse navbar-collapse m-0 justify-content-end " id="navbarSupportedContent">
              	<div class="align-items-end flex-column">
				  <?php if (isset($_COOKIE['user_name'])){?>
                      <a class="nav-link" href="?controller=Home&action=Logout">
                          <?= $_COOKIE['user_name']?>
                          <h5 class="d-flex justify-content-end">Sign Out</h5>
                      </a>
                    <?php } ?>
            	</div>  
			</div>            
        
        </nav>    
	</header>
	
	