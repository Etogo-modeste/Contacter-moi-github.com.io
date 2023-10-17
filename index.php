<?php 
    $firstname = $name = $email = $telephone = $message = ''; //intialisation des variables de récupération

    $firstnameError = $nameError = $emailError = $telephoneError = $messageError = '';

    $isSucess = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $firstname = verifyInput($_POST['firstname']);
        $name = verifyInput($_POST['name']);
        $email = verifyInput($_POST['email']);
        $telephone = verifyInput($_POST['telephone']);
        $message = verifyInput($_POST['message']);
        $isSucess = true;


        if(empty($firstname)){
            $firstnameError = 'Veuillez renseigner votre prénom';
            $isSucess = false;
        }
        if(empty($name)){
            $nameError = 'Veuillez renseigner votre nom';
            $isSucess = false;
        }
        if(empty($email)){
            $emailError = 'Veuillez renseigner votre email';
            $isSucess = false;
        }
        if(empty($telephone)){
            $telephoneError = 'Veuillez renseigner votre Numero de téléphone';
            $isSucess = false;
        }
        if(empty($message)){
            $messageError = 'Veuillez renseigner votre commentaire';
            $isSucess = false;
        }
        if(!isEmail($email)){
            $emailError = "Entrer une email valide !";
            $isSucess = false;
        }
        if(!isPhone($telephone)){
            $telephoneError = "renseigner un mobile valide !";
            $isSucess = false;
        }
    }

    function isPhone($var){
        return preg_match("/^[0-9 ]*$/", $var);
    }

    function isEmail($var){
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var){
       $var = trim($var);
       $var = stripslashes($var);
       $var = htmlspecialchars($var);

       return $var;
    }

   
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" width="width=divice=width, initial=scale=1">
        <title>Souscrire!</title>
        <link rel="stylesheet" href="assets/bootstrap.min.css">
        <link href="Css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="underline-dv"></div>
            <div class="heading">
                <h2>remplissez vos informations</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form" id="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                    <label for="firstname">Prénom<span class="blue"> *</span></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Votre Prénom" value="<?php echo $firstname;?>">
                                    <p class="comments"><?php echo $firstnameError;?> </p>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Nom<span class="blue"> *</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" value="<?php echo $name;?>">
                                <p class="comments"><?php echo $nameError;?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre Email" value="<?php echo $email;?>">
                                <p class="comments"><?php echo $emailError; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone">Téléphone</label>
                                <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Votre Téléphone" value="<?php echo $telephone;?>">
                                <p class="comments"><?php echo $telephoneError;?></p>
                            </div>

                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea name="message" id="message" class="form-control" placeholder="
                                Votre Commentaire"><?php echo $message;?></textarea>
                                <p class="comments"><?php echo $messageError; ?></p>
                            </div>
                            <div class="col-md-12">
                                <p class="blue"><strong>*Ces informations sont requises</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn1" value="Envoyer">
                            </div>
                        </div>
                        <p class="thank-you" style=" display: <?php if($isSucess){echo'block';}else{echo 'none';}?>;">Merci de nous avoir contacté :)</p>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/bootstrap.min.js"></script>
    </body>
</html>