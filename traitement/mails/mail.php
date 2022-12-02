    <?php

    if(isset($_SERVER['HTTP_ORIGIN'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['raison']) && empty($_POST['raison'])){
                if(!preg_match('!^ *$!s', $_POST['nom']) && !preg_match('!^ *$!s', $_POST['email']) && !preg_match('!^ *$!s', $_POST['sujet']) && !preg_match('!^ *$!s', $_POST['message'])){
                    $mail_mail = htmlspecialchars($_POST['email']);


                        $mail_to = "reponse@lacapsule.org";
                        $mail_nom = htmlspecialchars($_POST['nom']);
                        $mail_sujet = htmlspecialchars($_POST['sujet']);
                        $mail_content = htmlspecialchars($_POST['message']);



                        $to = "$mail_to";
                        $from = "$mail_nom $mail_prenom";

                        $subject = "Contact web : $mail_sujet";
                        $message = "
                                    <style>
                                    * {
                                    margin: 0;
                                    padding: 0;
                                    box-sizing: border-box;
                                    overflow: hidden;
                                    font-size: 16px;
                                    font-family: 'ubuntu', verdana, 'sans-sérif';
                                    }
                                
                                    body {
                                        overflow: hidden;
                                        min-height: 70vh;
                                        background: rgba(198, 202, 240, .7);
                                        border-radius: 15px;
                                        box-shadow: 0 1rem 2rem rgba(0,0,0,.3);
                                        display: flex;
                                        flex-flow: column nowrap;
                                        justify-content: space-between;
                                        align-items: center;
                                    }
                                    .header {
                                        width: 100%;
                                        height: 10vh;
                                        background: rgb(224,105,14);
                                        display: flex;
                                        flex-flow: row no-wrap;
                                        justify-content: space-around;
                                        align-items: center;
                                    }
                                    .header .logo {
                                        width: 2rem;
                                        height: auto;
                                    }
                                    .header h1 {
                                        font-size: 24px;
                                        font-weight: bold;
                                        font-style: italic;
                                        text-align:center;
                                        color: rgb(1989,202,240);
                                    }
                                    .mail-content{
                                        position: relative;
                                        width: 98%;
                                        height: auto;
                                        display: flex;
                                        flex-flow: column nowrap;
                                        align-items: flex-start;
                                        justify-content: center;
                                    }
                                    p{
                                        display: flex;
                                        flex-flow: row wrap;
                                        justify-content: flex-start;
                                        align-items: center;
                                        margin: 1rem;
                                    }
                                    span{
                                        font-weight: bold;
                                        color: rgb(244,105,14);
                                        margin-right: 5px;
                                    }

                                    
                                    </style>
                                    <div class='header'>
                                        <h1>Nouveau contact mail</h1> 
                                        <img class='logo' src='https://www.lacapsule.bzh/media/img/capsule.png'>
                                    </div>
                                    
                                    <div class='mail-content'>
                                        <p>Bonjour,</p></br>
                                        </br>
                                        <p><span>$mail_nom </span> vous a envoyé un message,</p></br>
                                        </br>
                                        <p><span>Son mail :</span> $mail_mail</p></br>
                                        </br>
                                        <p><span>Le sujet de son message :</span> $mail_sujet </p></br>
                                        </br>
                                        <p><span>Son message :</span> $mail_content</p>
                                    </div>
                                    <footer>
                                        <div>
                                        </div>
                                    </footer>";

                                    $headers ="from : webmaster@lacapsule.bzh" . "\r\n" .
                                    'Reply-To: ' . $mail_mail . "\r\n" . 
                                    'X-Mailer : PHP/' . phpversion() . "\r\n" . 
                                    "Content-Type: text/html; charset=UTF-8";

                                    mail($to, $subject, $message, $headers);

                                    header ('location:https://www.lacapsule.bzh');
                        
                }else{
                    header ('location:https://www.lacapsule.bzh');
                }
            }else{
                http_response_code(405);
                echo 'Requête non autorisée !';
            }
        }
    }

    ?>





