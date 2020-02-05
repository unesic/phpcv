$(function() {
    let section = document.querySelector("#content");
    let sidebar = document.querySelector("#sidebar");
    let main = document.querySelector("#main");

    if (section.classList.contains("container")) {
        section.classList.remove('container');
        section.classList += "d-flex container-fluid p-0";
    }

    sidebar.style.height = window.innerHeight + 'px';
    main.style.height = window.innerHeight + 'px';
});