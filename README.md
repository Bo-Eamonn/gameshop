# Gameshop

#### Opbouw

De applicatie is opgebouwd in het MVC structuur. Dit houd in dat alles gescheiden staat. Alles wat met de database te maken heeft staat in de Model folder. Verder hebben we een Controller folder wat er voor zorgt dat de input van een gebruiker doorgestuurd word naar model die het resultaat naar de view stuurt. De View folder heeft een lijst met Pagina's die weergegeven worden zodra daar om gevraagd word.
De folder templates behoud alle weergavens.

De Applicatie is gemaakt in **Visual Studio Code** met als Apache server **XAMPP**.

------------

#### assets folder
In de folder assets is de styling te vinden even als de images en javascript bestanden.
De styling is gedaan door middel van SASS met de vs code plugin sass watcher omgezet naar css.

###### Database

Ook zit er een db folder in de assets folder. Hier zitten 2 SQL bestanden in. een uitdraai van de database inhoud na opzetten en een final uitdraai. Die laatste is nodig om de applicatie voledig te kunnen laten werken.

------------

#### Inloggen
Hier onder zijn de inlog gegevens te vinden voor de verschillende gebruikers momenteel. Er zijn twee gebruikers standaard gemaakt voor het testen van de applicatie. 

###### admin
De ene gebruiker heeft als role Admin, hij/zij die inlogt met deze credentials zal alles kunnen gebruiken wat op de site te vinden is. 
###### customer
De andere gebruiker heeft als role Customer, indien dit verder uitgewerkt word zal hij/zij dingen kunnen toevoegen aan een winkel mandje.

| User Name | Password | Role |
|-----------|----------|-------|
| admin | admin | admin |
| klant | klant | customer |

### Quick note

Momenteel kan iedereen zien welke opties er beschikbaar zijn. Het feit dat dit zichtbaar is heeft niks met de functionaliteit te maken. Is meer een questie van niet af kunnen maken. Even als dat sommige dingen niet 100% werken. De reden dat er ook geen icoontje te vinden is voor een shoppingcard is omdat het niet in gedachten kwam hoe we dit mooit konden maken. Dit was meer iets wat we uitstelde tot er geen tijd meer voor was. Net als dat je je niet kan registreren als nieuwe gebruiker. Dit kan alleen een gebruiker met de role ADMIN.

###### Bugs 

1. Er is een kleine bug opgedoken met het toevoegen van een nieuw product via de applicatie zelf. De categorie en beschrijving worden omgedraait weergegeven. Zowel in de database als op de pagina zelf.

2. De navigatie klapt automatisch open dit heeft als gevolg dat bij de users page de dingen niet zichtbaar zijn, het staat er wel maar zitten onder de navigatie dus die dicht klappen het het is zo goed als.
