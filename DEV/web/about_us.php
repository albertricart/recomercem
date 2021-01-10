<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'Game Discounts | reComercem: El teu comerç de proximitat al barri';
$pageDescription = '"Game Discounts" let you win discount tickets to use in our stores';
$pageKeywords = 'Game, Discounts, win, discount, tickets, stores, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array('about_us' => '/css/about_us.css'); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

?>

<article id="mainStores" class="artlBox">

    <h1 class="artlTitle">About US</h1>

    <div class="all">
        <div class="persona">
            <img src="/images/bitmojiAlbert.png" alt="bitmojiAlbert">
        </div>

        <div class="persona">
            <img src="/images/bitmojiMarcelo.png" alt="bitmojiMarcelo">
        </div>

        <div class="persona">
            <img src="/images/bitmojiMario.png" alt="bitmojiAlbert">
        </div>
    </div>
    <div class="nombres">
        <p class="nombre">Albert Ricart</p>
        <p class="nombre">Marcelo Goncevatt</p>
        <p class="nombre">Mario De La Torre</p>
    </div>

    <div class="text">
        <p>
            Somos un grupo de 3 alumnos del <b>Centre D'Estudis Politecnics</b>, que nos hemos juntado para crear este proyecto, "Recomerçem".
        </p>
        <br>
        <p>
            <b>Recomerçem</b> es un proyecto basado en el problema que muchos negocios de barrio han sufrido durante este 2020. Debido a la crisis del COVID, muchos negocios han tenido
            que cerrar, y los que aun se mantienen les esta costando ganar clientela. Los negocios online estan aumentando, mientras que los pequeños comercios estan en decaida.
            Gracias a Recomerçem, podemos dar a conocer todos estos negocios. Un añadido, es que los comercios pueden añadir sus ofertas, esto ayuda a que la gente que también
            han sufrido por esta crisis, pueda comprar mejores productos ayudando también al negocio.
        </p>
        <br>
        <p>
            About: <b>Albert Ricart</b>, 20 años, desarrollador de apps multiplataforma, nacido en Barcelona, España. Me apasiona crear aplicaciones de escritorio de Windows y el 
            desarrollo de aplicaciones de Android. Me gusta crear programas bien organizados y de alta calidad. Tengo experiencia trabajando en equipo ya que 
            desarrollé 2 proyectos importantes con otras personas, uno de ellos una aplicación que aparece en el Museo Nacional mNactec. Quieres saber más? Visita mi pagina:
            <a href="https://albert-ricart.jimdosite.com/" target="_blank">Albert Ricart</a>
        </p>
        <br>
        <p>
            About: <b>Marcelo Goncevatt</b>, Despues de años de dedicarme a la informática y particularmente a la programación, no he perdido el hábito de sentarme durante horas 
            para resolver el ultimo dilema presentado. Horas de idas y vueltas, de notas que no se leerán nunca pero sirver para perfilar, seccionar y rever. La sensación 
            de vacío, de desafío, de caminar para hacer camino hasta que se atisba uno. Es casi imperceptible, pero ya el cuerpo te lo dice, algo va bien encaminado. 
            Y el andar con paso cada vez más firme en el camino elegido. La inmensa satisfacción cuando finaliza un resultado que intenta equilibrar estetica, técnica, 
            efectividad, simpleza, información y eficiencia. Es intenso, dura poco, "un chute" de adrenalina que va bajando y una gran sorisa tonta... Vamos a por más
            <a href="http://magomo.es/" target="_blank">Marcelo Goncevatt</a>
        </p>
        <br>
        <p>
            About: <b>Mario De La Torre</b>, 22 años, nacido en Barcelona, España. Siempre me ha gustado mucho la informatica en general, desde que descubri la programación
            tuve bastante claro que me gustaria poder dedicarme a ello. Una de mis metas es poder acabar trabajando como frontend developer y dedicarme a la parte 
            visual de los proyectos. Empecé con un Grado Medio de informatica, el cual continue con 1 año de desarrollo de videojuegos y un Grado Superior de Desarrollo de
            Aplicaciones Multiplataforma. He hecho varios cursos de diseño grafico y he trabajado en otros 2 proyectos anteriores a este. Quieres conocerme mejor? Visita mi web:
            <a href="https://cptmario.github.io/" target="_blank">Mario De La Torre</a>
        </p>
    </div>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>