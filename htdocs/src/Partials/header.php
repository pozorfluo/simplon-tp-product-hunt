<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="/public/css/style.css">
            <title>Product Hunt</title>
            
</head>
<body> 
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex">
            <a class="navbar-brand" href="index.php"><h1>HOME</h1></a>
            <div class ="ml-5">
            <?php 
              if (isset($_COOKIE['user_name'])){?>

            <?php }
            ?>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button> 

            <div class="collapse row navbar-collapse liste d-flex" id="navbarSupportedContent">
              
              	<div class="col">
                    <form class="form-inline  ">
                      <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form> 
				</div>

				<div class="col">

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Trier par :</label>
                        <select class="form-control form-control-sm "  id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                
              </div> 
            </div>

            <div class="collapse navbar-collapse liste col justify-content-end " id="navbarSupportedContent">
              <div class="align-items-end flex-column">
                    <?php 
                        if (isset($_COOKIE['user_name'])){?>
                      <a class="nav-link row" href="index.php?logout" ><h3>Deconnexion</h3></a>
                      
                    <?php }
                    ?>
              </div>  
            </div>
        </nav>    
    </header>
