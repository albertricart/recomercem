var menuOpts = document.querySelectorAll(".js-menu-opt");
var previousTab;

for (var x = 0; x < menuOpts.length; x++) {
  menuOpts[x].addEventListener("click", function () {
    var tabName = this.dataset.tab;
    var tab = document.querySelector(tabName);

    if (previousTab != null && previousTab != tab) {
      previousTab.classList.remove("animate__fadeInLeft");
      previousTab.classList.add("animate__fadeOutRight");
    }
    previousTab = tab;

    tab.classList.add("show");
    tab.classList.remove("animate__fadeOutRight");
    tab.classList.add("animate__fadeInLeft");
  });
}
