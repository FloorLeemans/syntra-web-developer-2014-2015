Eindwerk Syntra VDO Web Developer 2014 - 2015
=============================================

# Planning

Tegen 26/3:
- Individuele planning invullen: https://docs.google.com/spreadsheets/d/1aOf7pineH3G13K16rJO9ly2VWYrlCPvF1UWpKKN4Rn0/edit?usp=sharing
- Alle stappen van de strategie TOT effectieve uitwerking moeten afgewerkt zijn -> anders niet beginnen programmeren.
- Mag vroeger aan programmeren beginnen MITS goedkeuring

Na 26/3
- Uitwerking van de applicatie
- Inhoudelijke begeleiding is mogelijk, maar moeilijk -> tijdsspanne van 1 dag: niet veel!
- Kom VOORBEREID!
- Individuele milestones -> tegen volgende meeting

# Vereisten eindwerk

## Bundel
- +/- 10-tal pagina’s.
- Bevat
 - Mock-ups
 - Functionele analyse
 - Print-out van de database
 - User test van minstens 2 personen
 - Minstens twee stukken code met uitleg
   - Wat doet de code
   - Hoe gebeurt dit?

## Digitale Webshop

### Onderdelen

#### Navigatiemenu (sectie)
 - Producten
 - Over ons
 - Contact
 - Winkelmandje
 - Inloggen
 - Producten
- Hier worden de categorieën opegesomd
- Bij het aanklikken van een categorie wordt een overzicht gegeven van alle producten
 - Een foto, de titel en de prijs van het product zijn voldoende in dit overzicht
 - Wanneer men op een product klikt, komt men op de detailpagina van het productterecht

#### Zoekfunctie (sectie)
- Lijst de producten op met de zoekterm die voorkomt in de naam of beschrijving
- De resultaten verwijzen door naar de detail-pagina’s.
 - Toon een gepaste boodschap wanneer er niets gevonden werd.

#### Producten: overzicht (pagina)
- Hier wordt een overzicht getoond van alle mogelijk producten
- Je moet de producten per categorie kunnen opvragen

#### Producten: detail (pagina)

- Hier wordt het volledige product weergegeven, inclusief een koop knop
- Wanneer op de koop-knop wordt geklikt wordt het product toegevoegd aan het winkelmandje
- Het product kan enkel aan het winkelmandje toegevoegd worden als de gebruiker ingelogd is
- Is de gebruiker niet ingelogd, toon dan de login-pagina.
- Een product heeft:
  - categorie
  - titel
  - foto
  - beschrijving
  - prijs

#### Over ons (pagina)

- een statische pagina met wat meer informatie over de winkel

#### Contact

- Een contactformulier waarmee je een vraag kan stellen aan de winkelen

#### Winkelmandje (pagina)
- Toont een inlogscherm wanneer de gebruiker nog niet is ingelogd
- Hier worden de producten getoond die de gebruiker aan het winkelmandje heeft toegevoegd
- Betalen-knop
 - Wanneer de gebruiker op deze knop klikt, wordt er een finaal overzicht van de bestelling gegeven
- De gebruiker heeft de mogelijkheid om deze bestelling te bevestigen
- Wanneer de bestelling bevestigd wordt, wordt er een mail gestuurd naar de klant met daarin een overzicht van de bestelling, een unieke betaalcode en een rekeningnummer
- De winkeleigenaar krijgt een mail met een overzicht van de bestelling
- Deze bestelling wordt ook aan de database toegevoegd(absolute minimum= datum,
totaalprijs, unieke code , klant & status)

#### Inloggen (pagina)
- Deze pagina bevat een inlogformulier
- Wanneer de gebruiker nog geen account heeft, bestaat er de mogelijkheid om te registeren
- Een klant heeft de volgende gegevens:
 - Email
 - Naam
 - Voornaam
 - Telefoonnummer
 - Straat
 - Postcode
 - Gemeente
 - Land
- Wanneer de gebruiker ingelogd is, wordt het navigatiemenu "inloggen" vervangen door "persoonlijke gegevens"
 - Dit verwijst naar een pagina met een overzicht van de persoonlijke gegevens van de klant
 - Op deze pagina kan een klant zijn gegevens wijzigen

#### Admin (pagina)
- Deze pagina is niet zichtbaar voor buitenstaanders (komt niet voor in navigatie-menu)
- Een winkeleigenaar kan op deze pagina inloggen
- Registratie hoeft niet
- Op deze adminpagina komen de volgende functionaliteiten:
 - Product wijzigen
 - Product toevoegen
 - Bestellingen	

##### Product overzicht (admin-pagina)
Bevat dezelfde structuur als de publieke Product-pagina.
- Bij het overzicht van de producten per categorie, staat nu ook een knop "wijzigen"
- Wanneer de winkeleigenaar op deze knop klikt, kan hij de gegevens van het product aanpassen (product wijzigen)

##### Product wijzigen (admin-pagina)
- Bevat een overzicht van alle bestellingen
- Bestellingen bevatten minstens:
 - datum
 - Totaalprijs
 - unieke code
 - Klant
 - Status
- De bestellingen zijn gerangschikt per status: besteld, betaald, verstuurd
- De winkeleigenaar heeft de mogelijkheid om de bestelling van status te veranderen OF te verwijderen

##### Product toevoegen (admin-pagina)
- Bevat een formulier waarop een product toegevoegd kan worden
- Een product heeft:
 - categorie
 - titel
 - foto
 - beschrijving
 - prijs

## Algemeen

Bundel en eindwerk worden digitaal afgeleverd
- Bundel: digitaal formaat is voldoende
- Webshop: alle code, inclusief correcte SQL-export
- Mag op CD-Rom/USB/Dropbox-link
- voorzie voor elk jury-lid een kopie (niets met doorgeven)


# Strategie

- Onderzoek/laat je inspireren:
 - http://www.coolblue.be
 - http://www.bol.com
 - http://www.etsy.com

- Schrijf uit wat er op jouw webshop allemaal kan

- Letterlijk een scenario uitschrijven voor klant en voor admin

- Teken een site map voor jouw webshop uit [https://www.gliffy.com/_ui/images/examples/example_sitemap_large.png]

- Beschrijf de functionaliteiten die nodig zijn voor elke pagina
 - Bv. inlogfunctie, uitlogfunctie, producten ophalen uit de database, producten printen in html, …
 - Let goed op welke functionaliteiten terugkomen (classes?)

- Schrijf een schema uit voor de database

- Maak mockups van hoe elke pagina er zal uitzien (bv. balsamiq, tekenen, …)

- Leg de mockups voor aan iemand uit je omgeving en vraag om advies

- Bepaal de technologie die je nodig hebt
 - Bv. CodeIgniter, Bootstrap, jQuery, …

- Pas na de bovenstaande stappen aan design beginnen

- Gebruik van CSS-framework zoals Bootstrap/SASS/LESS is aan te raden, maar niet verplicht

- Zoek een goede balans tussen designen en coderen -> verspeel niet teveel tijd met het design. Functionaliteit primeert.

- Leg het design voor aan iemand uit je omgeving en vraag om advies

- Pas daarna beginnen met programmeren
 - Begin bij producten toevoegen/wijzigen pagina in adminmodule
 - Stap dan over naar het webshop gedeelte
 - Als dat klaar is kan het klant-gedeelte ingezet worden
 - Als laatste het bestellingsoverzicht voor de admin

- Volg de stappen die een normale klant volgt en werk deze stappen programmatorisch chronologisch uit.

# Examen: voorstelling eindproef

- Duurt maximum 15 á 20 minuten!

- Korte intro ( presentatie! )

- Live demonstratie van de webshop

- Uitleg over de functionaliteiten

- Focus op de dingen die werken (Niet: "Dit werkt wel nog niet", ...)

- Leg de nadruk op wat je geleerd hebt ("Dit bleek eerst niet te werken, maar na opzoeking heb ik het zo en zo kunnen oplossen.", ...)

- TEST , TEST, TEST en herhaal de TEST. Falen tijdens een live demo is desastreus!


# Beoordeling:

- Door enkele juryleden (waaronder Pascal)

- Minimumfunctionaliteit zoals beschreven in dit document (60%)
 - Correctheid van de code
 - Efficiëntie
 - Hoeveelheid van functionaliteiten
 - Eventuele extra functionaliteiten

- Evolutie (10%)
 - Denkt na over methodiek
 - Doet onderzoek
 - Ziet eigen fouten in en verbeterd deze waar mogelijk
 
- Permanente evaluatie doorheen de eindwerkbegeleiding (20%)

- Presentatie + bundel (10%)
