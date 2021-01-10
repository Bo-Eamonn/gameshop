<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameShop | Games</title>
    <link rel="stylesheet" href="/healthone_mvc/assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
require_once "templates/nav.php";
?>
<main>
    <div class="content">
        
        <div class="container">

        <form action="" method="post">    
            <button class=" arts add" type="submit" name="showAddproduct">Toevoegen</button>
        </form>
            <div class="table">
                <?php                      
                            echo "<table>";
                            echo "<tr>";     
                                echo "<th>game</th>";                          
                                echo "<th>img</th>";                          
                                echo "<th>desc</th>";                          
                                echo "<th>Edit/delete</th>";                          
                            echo "</tr>";   
                            foreach ($result as $product) {
                                echo "<tr>";    
                                    echo "<td>" . $product->name . " </td>";
                                    echo "<td> <img src=" . /*  $product->img . */ "> </td>"; // Not working getting binary output maybe adding later
                                    echo "<td>" . $product->description . " </td>";
                                    echo "<td>" . "<form action='' method='post'>
                                    <button class='arts ud' type='submit' value='$product->id' name='showUpdateproduct' ><i class='fa fa-pen'></i></button>
                                    <button class='arts ud' type='submit' value='$product->id' name='deleteproduct' ><i class='fa fa-trash'></i></button>
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
