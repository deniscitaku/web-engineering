const buttons = document.getElementsByClassName('opens-modal');
const close = document.getElementById('close');
const modal = document.getElementById('modal');
for (let i = 0; i < buttons.length; i++) {
    let button = buttons[i];
    let modalHeader = button.getElementsByTagName('div')[0].textContent;
    let modalBody = button.getElementsByTagName('p')[0].textContent;
    let modalDate = button.getElementsByTagName('p')[1].textContent

    button.addEventListener('click', function (event) {
        event.preventDefault();
        modal.getElementsByTagName('h2')[0].textContent = modalHeader;
        modal.getElementsByTagName('h5')[0].textContent = modalDate;
        modal.getElementsByTagName('p')[0].textContent = " - " + modalBody;
        modal.style.display = 'block';
    });
}
close.addEventListener('click', function (event) {
    event.preventDefault();
    modal.style.display = 'none';
});