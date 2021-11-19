<?php

if(isset($_SERVER['HTTP_ORIGIN'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['raison']) && empty($_POST['raison'])){
            if(!preg_match('!^ *$!s', $_POST['nom']) && !preg_match('!^ *$!s', $_POST['prenom']) && !preg_match('!^ *$!s', $_POST['mail']) && !preg_match('!^ *$!s', $_POST['sujet']) && !preg_match('!^ *$!s', $_POST['message'])){
                $mail_mail = htmlspecialchars($_POST['mail']);

                if(!filter_var($mail_mail, FILTER_VALIDATE_EMAIL){
                    header('location:../index.html');
                }else{

                    $mail_to = "harela@pwtg.fr";
                    $mail_nom = htmlspecialchars($_POST['nom']);
                    $mail_prenom = htmlspecialchars($_POST['prenom']);
                    $mail_sujet = htmlspecialchars($_POST['sujet']);
                    $mail_content = htmlspecialchars($_POST['message']);



                    $to = "$mail_to";
                    $from = "$mail_nom $mail_prenom";

                    $subject = "Contact web : $mail_sujet";
                    $message = "Bonjour, 
                                $mail_nom $mail_prenom vous a envoyé un message,
                                son mail : $mail_mail
                                Le sujet de son message : $mail_sujet
                                Son message : $mail_content";

                                $headers ="from : webmaster@lacapsule.bzh" . "\r\n" .
                                'Reply-To: ' . $mail_mail . "\r\n" . 
                                'X-Mailer : PHP/' . phpversion();

                                mail($to, $subject, $message, $headers);

                                header ('location:index.html');
                    
                }
            }else{
                header ('location: index.html');
            }
        }
    }
}

?>