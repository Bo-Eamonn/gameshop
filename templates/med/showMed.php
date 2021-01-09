<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthOne | Show Medicijnen</title>
    <link rel="stylesheet" href="/HealthOne_MVC/assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
require_once "templates/nav.php";
?>
<main>
    <div class="content">
        <img src="/healthone_mvc/assets/images/profilePicture/profilePlaceholder.png" alt="Profiel Foto">
        <?php
               echo "<h1>Welkom: " . $_SESSION['username'] . "</h1>";
        ?>
        <div class="container">

        <form action="" method="post">    
            <button class=" arts add" type="submit" name="showAddMed">Toevoegen</button>
        </form>
            <div class="table">
                <?php
                        
                            echo "<table>";
                            echo "<tr>";     
                                echo "<th>Naam</th>";                       
                                echo "<th>Categorie</th>";   
                                echo "<th>edit</th>";   
                            echo "</tr>";                       
                                foreach ($result as $med) {
                                echo "<tr>";    
                                    echo "<td id='" . $med->insured."'>" . $med->name . " </td>";
                                    echo "<td id='" . $med->insured."'>" . $med->cat . " </td>";
                                    echo "<td id='" . $med->insured."'>" . "<form action='' method='post'>
                                    <button class='arts ud' type='submit' value='$med->id' name='showUpdateMed' ><i class='fa fa-pen'></i></button>
                                    <button class='arts ud' type='submit' value='$med->id' name='deleteMed' ><i class='fa fa-trash'></i></button>
                                </form>" . " </td>";
                                echo "</tr>";
                            }
                            echo "</table>";     
                            
                    ?>
            </div>
        </div>
    </div>
</main>
<?php
require_once "templates/footer.php";
?>
