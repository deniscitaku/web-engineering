const buttons = document.getElementsByClassName('opens-modal');
const close = document.getElementById('close');
const modal = document.getElementById('modal');
for (let i = 0; i < buttons.length; i++) {
    let button = buttons[i];
    let modalHeader = button.getElementsByTagName('figcaption')[0].textContent;
    let modalImage = button.getElementsByTagName('img')[0].src;

    button.addEventListener('click', function (event) {
        event.preventDefault();
        modal.getElementsByTagName('h3')[0].textContent = modalHeader;
        modal.getElementsByTagName('img')[0].src = modalImage;
        modal.style.display = 'block';
    });
}
close.addEventListener('click', function (event) {
    event.preventDefault();
    modal.style.display = 'none';
});