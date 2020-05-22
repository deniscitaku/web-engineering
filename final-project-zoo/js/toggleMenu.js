(function () {
    const button = document.getElementById('toggle-menu');
    console.log("Button: ", button)
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const menu = document.getElementById('main-menu');
        console.log("Menu: ", menu)
        menu.classList.toggle('is-open');
    });
})();