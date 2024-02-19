let searchBtn = document.querySelector('.searchBtn');
let closeBtn = document.querySelector('.closeBtn');
let searchBox = document.querySelector('.searchBox');
let navigation = document.querySelector('.navigation');
let menuToggle = document.querySelector('.menuToggle');
let header = document.querySelector('Header');

searchBtn.onclick = function () {
    searchBox.classList.add('active');
    closeBtn.classList.add('active');
    searchBtn.classList.add('active');
    menuToggle.classList.add('hide');
    header.classList.remove('open');
}
closeBtn.onclick = function () {
    searchBox.classList.remove('active');
    closeBtn.classList.remove('active');
    searchBtn.classList.remove('active');
    menuToggle.classList.remove('hide')
    
}

menuToggle.onclick = function () {
    header.classList.toggle('open')
    searchBox.classList.remove('active');
    closeBtn.classList.remove('active');
    searchBtn.classList.remove('active');
}

console.log('hello');

let eyeicon = document.querySelector("#eyeicon");
let eyeicon2 = document.querySelector("#eyeicon2");
let password = document.querySelector("#password");
let passConf = document.querySelector("#passConf");

if (eyeicon) {
    eyeicon.onclick = function() {
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }}
if (eyeicon2) {
    eyeicon2.onclick = function() {
        if (passConf.type === "password") {
            passConf.type = "text";
        } else {
            passConf.type = "password";
        }
    }}

    
    $(document).ready(function () {
        $('#carouselExample').on('slide.bs.carousel', function (event) {
            let currentIndex = event.from;
            let nextIndex = event.to;
            
            // Hide labels and tags of the current image
            $('.carousel-item').eq(currentIndex).find('.image-details').hide();
            
            // Show labels and tags of the next image
            $('.carousel-item').eq(nextIndex).find('.image-details').show();
        });
    });
    
    