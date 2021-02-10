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
    <div class="productContainer">
        <?php                      
        foreach ($result as $product) {
            echo '<div class="card">';
                echo'<img src="/gameshop/assets/images/products/'.$product->name.'.png" alt="'.$product->name.'" style="width:100%" 
                onerror="this.src=\'/gameshop/assets/images/placeholder/missing_img.png\'">';
                echo '<div class="productContentWrap">';
                    echo '<h2>'.$product->name.'</h2>';
                    echo '<div class="two">';
                        echo '<p class="price">prijs € '.$product->price.'</p>';
                        echo '<p class="stock">Voorraad: '.$product->stock.'</p>';
                    echo '</div> <br>';
                    echo '<p class="desc">'.$product->description.'</p>';
                    echo '<p><button>Add to Cart</button></p>';
                    echo '<div class="edit">';
                        echo "<form action='' method='post'>
                        <button type='submit' value='$product->id' name='showUpdateProduct' ><i class='fa fa-pen'></i></button>
                        <button type='submit' value='$product->id' name='deleteProduct' ><i class='fa fa-trash'></i></button>
                        </form>";
                    echo'</div>';
                echo '</div>';
            echo '</div>';
            }

        ?>
    </div>
</main>
<?php
require_once "templates/footer.php";