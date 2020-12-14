// - - - - - - - - - - - - - - - - - - - - viewMenu =>

function viewMenu() {

    var menuObj = document.getElementById("menuBox");

    if ( menuObj.className == menuObj.dataset.open ) {

        menuObj.className = menuObj.dataset.close;

    } else {

        menuObj.className = menuObj.dataset.open;

    }

}

// - - - - - - - - - - - - - - - - - - - - viewMenu //