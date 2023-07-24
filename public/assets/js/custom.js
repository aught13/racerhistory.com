/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


window.onscroll = function () {  
    var nav = document.getElementById('scroll');
    if ( window.pageYOffset > 95 ) {
        nav.classList.remove("d-none");
        nav.classList.add("animate fade-in-up");
    } else {
        nav.classList.add("d-none");
        nav.classList.remove("animate fade-in-up");
    }
}
