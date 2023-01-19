/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
// 
// Scripts
// // 

// window.addEventListener('DOMContentLoaded', event => {

//     // Toggle the side navigation
//     const sidebarToggle = document.body.querySelector('#sidebarToggle');
//     if (sidebarToggle) {
//         // Uncomment Below to persist sidebar toggle between refreshes
//         // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
//         //     document.body.classList.toggle('sb-sidenav-toggled');
//         // }
//         sidebarToggle.addEventListener('click', event => {
//             event.preventDefault();
//             document.body.classList.toggle('sb-sidenav-toggled');
//             localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
//         });
//     }

// });


const nav_form = document.querySelector("#nav-form");
const nav_form_input = document.querySelector("#nav-form_input");
const nav_form_datalist = document.querySelector("#nav-form_datalist");

const nav_form_input_suggestion = ["All", "Players", "Grand Slams", "Participations"];

nav_form.addEventListener("submit", event => {
    event.preventDefault();

    const search_query = nav_form_input.value.replace(" ", "_");

    if (search_query && search_query.length) {
        window.location.href = `/tables/${search_query}`;
    }

});

nav_form_input.addEventListener("input", () => {

    document.querySelectorAll(".suggestion").forEach(el => el.remove());

    let new_sugges;

    nav_form_input_suggestion.forEach(suggestion => {

        if (nav_form_input.value.length && suggestion.startsWith(nav_form_input.value)) {
            new_sugges = document.createElement("option");
            new_sugges.setAttribute("value", suggestion);
            new_sugges.setAttribute("class", "suggestion");
            nav_form_datalist.appendChild(new_sugges);
        }
    })

})

