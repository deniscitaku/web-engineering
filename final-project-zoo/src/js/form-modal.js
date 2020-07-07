const buttons = document.getElementsByClassName('opens-modal');
const close = document.getElementById('form-close');
const modal = document.getElementById('form-modal');
for (let i = 0; i < buttons.length; i++) {
    let button = buttons[i];
    button.addEventListener('click', function (event) {
        event.preventDefault();
        modal.style.display = 'block';
    });
}
close.addEventListener('click', function (event) {
    event.preventDefault();
    modal.style.display = 'none';
});