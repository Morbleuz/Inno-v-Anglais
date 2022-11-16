// Will remove the blur of the background image on load
function blurRemove() {
    element = document.styleSheets[1].cssRules[7].style;
    console.log(element);
    element.removeProperty('-webkit-filter');
    element.removeProperty('-moz-filter');
    element.removeProperty('-o-filter');
    element.removeProperty('-ms-filter');
    element.removeProperty('filter');
}

window.onload = blurRemove();