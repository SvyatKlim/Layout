let menuBtn = document.querySelector('.menu-btn');
let menuItems = document.querySelector('.menu__items')

menuBtn.addEventListener('click', function(){
    menuBtn.classList.toggle('active');
    menuItems.classList.toggle('active');
})