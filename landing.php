<?php 
    session_start();
    require_once 'config.php'; 
   
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace membre</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
            <div class="col-md-12">
                <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


<div class="text-center">
    <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
    <hr />
    <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 10px;">
        <img class="vipers-image" src="img/Vipers%20PNG.png" alt="Vipers Image" style="width: 400px; height: auto;">
    </div>

    
    <div class="dropdown" style="margin-bottom: 20px;">
        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Paramètres du compte
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           
            <button type="button" class="btn btn-info btn-lg dropdown-item" data-toggle="modal" data-target="#change_pseudo">Modifier mon nom</button>
            
            <button type="button" class="btn btn-info btn-lg dropdown-item" data-toggle="modal" data-target="#change_password">Changer mon mot de passe</button>
            
            <button type="button" class="btn btn-info btn-lg dropdown-item" data-toggle="modal" data-target="#change_email">Modifier mon email</button>
        </div>
    </div>

    
    <a href="accueil.php" class="btn btn-success btn-lg">Accéder à la compta</a>

    
    <button type="button" class="btn btn-dark btn-lg">Déposer des items</button>
</div>



            </div>
        </div>    

       




        <!-- Modal change email (non fonctionnel après validation)-->
        <div class="modal fade" id="change_email" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_email.php" method="POST">
                                    <label for='current_email'>email actuel</label>
                                    <input type="email" id="current_email" name="current_email" class="form-control" required/>
                                    <br />
                                    <label for='new_email'>Nouvel email</label>
                                    <input type="email" id="new_email" name="new_email" class="form-control" required/>
                                    <br />
                                    <label for='new_email_retype'>Re tapez le nouvel email</label>
                                    <input type="email" id="new_email_retype" name="new_email_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
        

                                
        <!-- Modal change password -->
        <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_password.php" method="POST">
                                    <label for='current_password'>Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password'>Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                

            


            <!-- Modal change pseudo (non fonctionnel après validation) -->
        <div class="modal fade" id="change_pseudo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon pseudo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_pseudo.php" method="POST">
                                    <label for='change_pseudo'>Pseudo actuel</label>
                                    <input type="pseudo" id="current_pseudo" name="current_pseudo" class="form-control" required/>
                                    <br />
                                    <label for='new_pseudo'>Nouveau pseudo</label>
                                    <input type="pseudo" id="new_pseudo" name="new_pseudo" class="form-control" required/>
                                    <br />
                                    <label for='new_pseudo_retype'>Re tapez le nouveau pseudo</label>
                                    <input type="pseudo" id="new_pseudo_retype" name="new_pseudo_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            
                

            


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>