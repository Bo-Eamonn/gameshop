<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthOne | Inloggen</title>
    <link rel="stylesheet" href="/HealthOne_MVC/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <div class="login">
    <img src="/healthone_MVC/assets/images/logo.png" alt="logo">
    <?php
     
    ?>
        
        <h1>login</h1>
        <form method="POST" method="/index.php/">
            <input type="text" placeholder="Gebruikersnaam" autocomplete="off" name="uname" required="required" id="uname">
            <div class="container"> 
                <input type="password" placeholder="Wachtwoord" autocomplete="off" name="pswrd" required="required" id="pswrd">
                    <i class="far fa-eye" id="pswrdToggle"></i>
            </div> 
            <button name="inloggen" type="submit">Inloggen</button>
        </form>
    </div>
    <script src="/healthone_mvc/assets/js/pswrdToggle.js"></script>
</body>

</html>