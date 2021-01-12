<?php

$pageTitle = "Game Discounts | reComercem: Your local trade in the neighborhood";

$pageDescription = "'Game Discounts' let you win discount tickets to use in our stores";

$pageKeywords = "Game, Discounts, win, discount, tickets, stores, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought";

$sectionTitle = "Game Discounts";

$sectionDescription = "";

$jsonTraslate = '{
    "hola":"Hello @@nombre",
    "obtenido":"@@expresion !!! ... in the game \"@@juego\" you have not obtained points",
    "almacenado":"The accumulated total is @@total points.",
    "jugados":"You have not yet played all available games (@@jugados).",
    "suficiente":"The amount of points obtained is still not enough to obtain the Discount Ticket. Try new games to exceed @@points2ticket points.",
    "getticket":"Request your Discount Ticket",
    "resumen":"The current summary of your games is:"
}';

$jsonChange = '{"expresion":["Oops","Good","Congratulations"],
    "obtenido":"@@expresion !!! ... in the game thegame  \"@@juego\" you have obtained @@puntos points",
    "jugados":"You have already played all available games (@@jugados).",
    "suficiente":"The amount of points obtained is enough to obtain the Discount Ticket. You can obtain it in your email by pressing the following button.",
    "enviado":"The amount of points obtained is enough to obtain the Discount Ticket but it has already been sent by email. If it has not reached you or you have a problem, please send us an email to incidencias@recomercem.es."
}';

$msgEmailTicket = 'var msgEmailTicket = [
    "We have sent you an email to the registered email with the Discount Ticket. Remember that you have 7 days to use it. Enjoy it !!!", 
    "There is an error with the user identification. If you have any questions or want to report an incident, please write to us at incidencias@recomercem.es. Thank you.",
    "The score is still not enough to obtain the ticket. If you have any questions or want to report an incident, please write to us at incidencias@recomercem.es. Thank you.",
    "The ticket has already been sent previously. If you have any questions or want to report an incident, please write to us at incidencias@recomercem.es. Thank you."
    ];';

?>