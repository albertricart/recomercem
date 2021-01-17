
// - - - - - - - - - - - - - - - - - - - - - - - - showpwtopClick( aquest )

function showpwtopClick( aquest ) {

    var passwordtop = document.getElementById("passwordtop");
    var showpwtop = document.getElementById("showpwtop");

    if ( aquest.dataset.view == 1 ) {

        aquest.dataset.view = 0;
        passwordtop.type = "password";
        showpwtop.style.backgroundImage = "url('/images/visibility.svg')";
        //showpwtopView( aquest, 1 )

    } else {

        aquest.dataset.view = 1;
        passwordtop.type = "text";
        showpwtop.style.backgroundImage = "url('/images/visibility_off.svg')";
        //showpwtopView( aquest, 0 )

    }

}

// - - - - - - - - - - - - - - - - - - - - - - - - showpwtopView( aquest, viure )

function showpwtopView( aquest, viure ) {

    if (viure==1) {

        aquest.style.backgroundColor = "#a529254d";
        aquest.style.boxShadow = "0px 0px 1px 3px rgba(165, 41, 37, 0.3)";

    } else {

        showpwtop.style.boxShadow = "none";
        showpwtop.style.backgroundColor = "transparent";

    }

}


