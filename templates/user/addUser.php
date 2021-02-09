<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gameshop | Toevoegen User</title>
    <link rel="stylesheet" href="/gameshop/assets/css/normaliz.css">
    <link rel="stylesheet" href="/gameshop/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
?>
<div id="userAddModal" class="modal">
    <div class="userModal-container">
        <div>
            <form action="" method="post">
                <button type="submit" name="cancelUser" class="close" title="Sluiten">
                    <i class="fa fa-times-circle"></i>
                </button>
            </form>
            <form action="" method="POST">
                <table>
                    <input type="hidden" name="id" value='' />
                    <tr>
                        <th><label for="uname">Gebruikersnaam</label></th>
                        <th><Label for="pswrd">Wachtwoord</Label></th>
                        <th><label for="role">Gebruikers Role</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" required placeholder="Gebruikersnaam" autocomplete="off" name="uname" value='' /></td>
                        <td><input type="text" required placeholder="Wachtwoord" autocomplete="off" name="pswrd" value='' /></td>
                        
                        <td>
                            <select required name="role">
                                <option value="" disabled selected>Maak een keuze</option>
                                <option value="admin" >admin</option>
                                <option value="customer" >customer</option>
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td><input onclick="" type='submit' name='toevoegenUser' value='opslaan'></td>
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