<?php   
    
    session_start();
    
    require_once '../config.php';


    
    if(!isset($_SESSION['user']))
    {
        header('Location:../index.php');
        die();
    }


    
    if(!empty($_POST['current_pseudo']) && !empty($_POST['new_pseudo']) && !empty($_POST['new_pseudo_retype'])){
         
        $current_pseudo = htmlspecialchars($_POST['current_pseudo']);
        $new_pseudo = htmlspecialchars($_POST['new_pseudo']);
        $new_pseudo_retype = htmlspecialchars($_POST['new_pseudo_retype']);

        
        $check_pseudo  = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE id = :id');
        $check_pseudo->execute(array(
            "id" => $_SESSION['user']
        ));
        $data_pseudo = $check_pseudo->fetch();

        
        if(pseudo_verify($current_pseudo, $data_pseudo['pseudo']))
        {
            
            if($new_pseudo === $new_pseudo_retype){

                
                $cost = ['cost' => 12];
                $new_pseudo = pseudo_hash($new_pseudo, pseudo_BCRYPT, $cost);
               
                $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = :pseudo WHERE id = :id');
                $update->execute(array(
                    "pseudo" => $new_pseudo,
                    "id" => $_SESSION['user']
                ));
              
                header('Location: ../landing.php?err=success_pseudo');
                die();
            }
        }
        else{
            header('Location: ../landing.php?err=current_pseudo');
            die();
        }

    }
    else{
        header('Location: ../landing.php');
        die();
    }