function showList(elm){
    elm.nextElementSibling.style.animationName == 'drop' ?
    elm.nextElementSibling.style.animationName = 'close' :
    elm.nextElementSibling.style.animationName = 'drop';
}

function showMenu() {
    var menu = document.getElementById('account-menu');
    var img = document.getElementById('arrow');

    img.style.animationName == 'turn-up' ?
    img.style.animationName = 'turn-down' :
    img.style.animationName = 'turn-up';

    menu.style.animationName == 'drop1' ?
    menu.style.animationName = 'close1' :
    menu.style.animationName = 'drop1';
}

function switchInp(elm){
    if(elm.value == "dateEdition") {
        elm.nextElementSibling.setAttribute('type', 'date');
    } else {
        elm.nextElementSibling.setAttribute('type', 'text');
    }

}