<?php

$pageTitle = "Game Discounts | reComercem: El teu comerç de proximitat al barri";

$pageDescription = "'Game Discounts' et permetrà guanyar Tickets de Descompte per utilitzar a les nostres botigues";

$pageKeywords = "Game, Discounts, win, discount, tickets, stores, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought";

$sectionTitle = "Jocs Descomptes";

$sectionDescription = "";

$jsonTraslate = '{
    "hola":"Hola @@nombre",
    "obtenido":"@@expresion !!! ... en el joc \"@@juego\" no has obtingut punts",
    "almacenado":"El total acumulat és de @@total punts.",
    "jugados":"Encara no has jugat a tots els jocs disponibles (@@jugados).",
    "suficiente":"La quantitat de punts obtinguts encara no és suficient per obtenir el Tiquet de descompte. Intenta noves partides per superar els @@points2ticket punts.",
    "getticket":"Demana el Tiquet de Descompte",
    "resumen":"El resum actual de les teves partides és:"
}';

$jsonChange = '{"expresion":["Ups", "Bé", "Felicitats"],
    "obtenido":"@@expresion !!! ... en el joc \"@@juego\" has obtingut @@ punts punts",
    "jugados":"Ja has jugat a tots els jocs disponibles (@@jugados).",
    "suficiente":"La quantitat de punts obtinguts és suficient per obtenir el Tiquet de descompte. Pots obtenir-lo en el teu email pressionant el següent botó.",
    "enviado":"La quantitat de punts obtinguts és suficient per obtenir el Tiquet de descompte però el mateix ja ha estat enviat per email. Si no us ha arribat o tens algun problema, si us plau envia\'ns un email a incidencias@recomercem.es."
}';

$msgEmailTicket = 'var msgEmailTicket = [
    "T\'hem enviat un correu a l\'correu registrat amb el Tiquet de descompte. Recorda que tens 7 dies per utilitzar-lo. Que ho gaudeixis !!!", 
    "Hi ha un error amb la identificació de l\'usuari. Si tens algun dubte o vols informar d\'una incidència, si us plau, escriu-nos a incidencias@recomercem.es. Gràcies.",
    "La puntuuación encara no és suficient per obtenir el tiquet. Si tens algun dubte o vols informar d\'una incidència, si us plau, escriu-nos a incidencias@recomercem.es. Gràcies.",
    "El tiquet ja va ser enviat amb anterioritat. Si tens algun dubte o vols informar d\'una incidència, si us plau, escriu-nos a incidencias@recomercem.es. Gràcies."
    ];';

?>
