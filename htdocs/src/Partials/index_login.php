
<!--Formulaire Connexion Utilisateur-->
    <form action="index.php" method ='POST' class = "mt-3 ml-3 text-center ">  
           <label for="user_name">Nom d'utilisateur :</label>
           <input id="user_name" name="user_name" type="text" placeholder="Nom d'utilisateur" required><br>

         <section class = "m-3">
             <button class="m-2 btn btn-lg btn-success" id = "button">Envoyer</button>
            <button class="m-2 btn btn-lg btn-success" type="reset">Annuler</button>
         </section>
    </form>

<?php
    // if (isset($_POST['user_name'])){
    //     setcookie('user_name',$_POST['user_name'], time() + 3600); //Cookie 1h

    // }

/* if $_POST['user_name'] n'est pas dans BDD insert into */
?>
