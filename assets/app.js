/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/app.js');


const items = document.getElementById("list").getElementsByClassName("nav-item");

for(let i=0; i<items.length;i++){
    items[i].addEventListener('click',function(){
        var current = document.getElementsByClassName("active");
        current[0].classList.replace("active","");
       this.classList.add("active");
    })

}


