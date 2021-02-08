<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameShop | Games</title>
    <link rel="stylesheet" href="/gameshop/assets/css/normaliz.css">
    <link rel="stylesheet" href="/gameshop/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
?>
<main>
    <form action="" method="post">
        <button class="notVisible" type="submit" name="showAddProduct">Toevoegen</button>
    </form>
    <div class="table">
        <?php                      
        foreach ($result as $product) {
            echo "<div class='product'>";
            echo "<table>";  
            echo "<tr>";    
            echo "<td>" . $product->name . " </td>";
            echo "<td>" . $product->description . " </td>";
            echo "<td>€" . $product->price . " </td>";
            echo "<td class='notVisible'>" . "<form action='' method='post'>
            <button type='submit' value='$product->id' name='showUpdateproduct' ><i class='fa fa-pen'></i></button>
            <button type='submit' value='$product->id' name='deleteproduct' ><i class='fa fa-trash'></i></button>
            </form>" . " </td>";
            echo "</tr>";
            echo "</table>";     
            echo "</div>";
            }

        ?>
    </div>
</main>
<?php
require_once "templates/footer.php";