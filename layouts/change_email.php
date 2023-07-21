<?php   
    
    session_start();
    
    require_once '../config.php';


    
    if(!isset($_SESSION['user']))
    {
        header('Location:../index.php');
        die();
    }


    
    if(!empty($_POST['current_email']) && !empty($_POST['new_email']) && !empty($_POST['new_email_retype'])){
        
        $current_email = htmlspecialchars($_POST['current_email']);
        $new_email = htmlspecialchars($_POST['new_email']);
        $new_email_retype = htmlspecialchars($_POST['new_email_retype']);

        
        $check_email  = $bdd->prepare('SELECT email FROM utilisateurs WHERE id = :id');
        $check_email->execute(array(
            "id" => $_SESSION['user']
        ));
        $data_email = $check_email->fetch();

        
        if(email_verify($current_email, $data_email['email']))
        {
            
            if($new_email === $new_email_retype){

              
                $cost = ['cost' => 12];
                $new_email = email_hash($new_email, email_BCRYPT, $cost);
               
                $update = $bdd->prepare('UPDATE utilisateurs SET email = :email WHERE id = :id');
                $update->execute(array(
                    "email" => $new_email,
                    "id" => $_SESSION['user']
                ));
               
                header('Location: ../landing.php?err=success_email');
                die();
            }
        }
        else{
            header('Location: ../landing.php?err=current_email');
            die();
        }

    }
    else{
        header('Location: ../landing.php');
        die();
    }