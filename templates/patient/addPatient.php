<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthOne | Toevoegen Patient</title>
    <link rel="stylesheet" href="/HealthOne_MVC/assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
require_once "templates/nav.php";
?>
<div id="patientAddModal" class="modal">
    <div class="patientModal-container">
        <div>
            <form action="" method="post">
                <button type="submit" name="cancelPatient" class="close" title="Sluiten">
                    <i class="fa fa-times-circle"></i>
                </button>
            </form>
            <form action="" method="POST">
                <table>
                    <input type="hidden" name="id" value='' />
                    <tr>
                        <th><label for="naam">Patient naam</label></th>
                        <th><Label for="huidigeMed">Huidige Medicijnen</Label></th>
                        <th><label for="medHis">Medicijn Geschiedenis</label></th>
                        <th><label for="notes">Notities</label></th>
                        <th><label for="adres">Adres</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" required autocomplete="off" name="naam" value='' /></td>
                        <td><input type="text" autocomplete="off" name="huidigeMed" value='' /></td>
                        <td><input type="text" autocomplete="off" name="medHis" value='' /></td>
                        <td><input type="text" autocomplete="off" name="notes" value='' /></td>
                        <td><input type="text" required autocomplete="off" name="adres" value='' /></td>
                    </tr>
                    <tr>
                        <th><label for="woonplaats">Woonplaats</label></th>
                        <th><label for="zknummer">Zorg Nummer</label></th>
                        <th><label for="geboortedatum">Geboorte datum</label></th>
                        <th><label for="soortVerzekering">Verzekering</label></th>
                    </tr>
                    
                    <tr>
                        <td><input type="text" required autocomplete="off" name="woonplaats" value='' /></td>
                        <td><input type="text" required autocomplete="off" name="zknummer" value='' /></td>
                        <td><input type="date" required autocomplete="off" name="geboortedatum" value='' /></td>
                        <td>
                            <select required name="soortVerzekering">
                                <option value="" disabled selected>Maak een keuze</option>
                                <option value="Basis Budget">Basis Budget</option>
                                <option value="Basis Zeker">Basis Zeker</option>
                                <option value="Basis Exclusief">Basis Exclusief</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td><input onclick="" type='submit' name='toevoegenPatient' value='opslaan'></td>
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