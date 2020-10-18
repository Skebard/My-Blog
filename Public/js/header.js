
let menuBtn = document.getElementById("btn-menu");
let modalNavMenu = document.getElementById('modal-nav-menu-id')
let btnCloseMenu = document.getElementById("btn-close-modal-menu");
menuBtn.addEventListener('click',()=>{
    modalNavMenu.classList.remove('hidden');
    console.log('hi');
});
btnCloseMenu.addEventListener('click',()=>{
    modalNavMenu.classList.add('hidden');
});
modalNavMenu.addEventListener('click',()=>{
    modalNavMenu.classList.add('hidden');
});