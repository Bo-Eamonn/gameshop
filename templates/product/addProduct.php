<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameShop | Add new game</title>
    <link rel="stylesheet" href="/gameshop/assets/css/normaliz.css">
    <link rel="stylesheet" href="/gameshop/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
?>
<div id="gameAddModal" class="modal">
    <div class="gameModal-container">
        <div>
            <form action="" method="post">
                <button type="submit" name="cancelProduct" class="close" title="Sluiten">
                    <i class="fa fa-times-circle"></i>
                </button>
            </form>
            <form action="" method="POST">
                <table>
                    <input type="hidden" name="id" value='' />
                    <tr>
                        <th><label for="name">Game</label></th>
                        <th><Label for="description">Beschrijving</Label></th>
                        <th><label for="cat">Categorie</label></th>
                        <th><label for="price">prijs</label></th>
                        <th><label for="stock">Stock</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" required autocomplete="off" name="name" value='' /></td>
                        <td><input type="text" required autocomplete="off" name="description" value='' /></td>
                        <td>
                            <select required name="cat">
                                <option value="" disabled selected>Maak een keuze</option>
                                <option value="PC">PC</option>
                                <option value="PS4">PS4</option>
                                <option value="PS5">PS5</option>
                                <option value="Xbox">Xbox</option>
                                <option value="Mobile">Mobile</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" required name="price" min="0.01" value="" step=".01">
                        </td>
                        <td>
                            <input type="number" required name="stock" min="1" value="" step="1">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input onclick="" type='submit' name='toevoegenProduct' value='opslaan'></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
require_once "templates/footer.php";
?>