
let navbar = document.querySelector(".header .navbar");

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
}

var swiper = new Swiper(".gallery-slider", {
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    spaceBetween:20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0:{
            slidesPerView:1,
        },
        700:{
            slidesPerView:2,
        },
    }
})

document.getElementById('show-more-btn').addEventListener('click', function() {
    let hiddenElements = document.querySelectorAll('.initially-hidden');
    hiddenElements.forEach(function(element) {
        element.classList.toggle('initially-hidden');
    });
    this.innerHTML = this.innerHTML === 'Plus d\'animaux <i class="fa-solid fa-angles-right"></i>' ? 'Masquer <i class="fa-solid fa-angles-left"></i>' : 'Plus d\'animaux <i class="fa-solid fa-angles-right"></i>';
});