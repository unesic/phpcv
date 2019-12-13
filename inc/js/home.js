window.onload = function() {
    let section = document.querySelector("#content");
    let sidebar = document.querySelector("#sidebar");
    let main = document.querySelector("#main");

    if (section.classList.contains("container")) {
        section.classList.replace("container", ["container-fluid", "p-0"]);
    }

    sidebar.style.height = window.innerHeight + 'px';
    main.style.height = window.innerHeight + 'px';
};