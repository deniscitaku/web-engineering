const editTiles = document.getElementsByClassName('opens-modal--edit');
const createTile = document.getElementById('opens-modal--create');
const close = document.getElementById('form-close');
const modal = document.getElementById('form-modal');

for (let i = 0; i < editTiles.length; i++) {
    let tile = editTiles[i];
    tile.addEventListener('click', function (event) {
        event.preventDefault();

        console.log(tile.getElementsByTagName('div'))
        let id = tile.getElementsByTagName('input')[0].value;
        let title = tile.getElementsByTagName('div')[1].innerText;
        let content = tile.getElementsByTagName('p')[1].innerText;

        document.getElementById('id-input').value = id;
        document.getElementById('title-input').value = title;
        document.getElementById('content-input').value = content;

        document.getElementById('btnUpdate').style.display = 'block'
        document.getElementById('btnDelete').style.display = 'block'
        modal.style.display = 'block';
    });
}

createTile.addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('btnInsert').style.display = 'block'
    resetInputs();
    modal.style.display = 'block';
});

close.addEventListener('click', function (event) {
    event.preventDefault();
    modal.style.display = 'none';
    document.getElementById('btnUpdate').style.display = 'none'
    document.getElementById('btnInsert').style.display = 'none'
    document.getElementById('btnDelete').style.display = 'none'
});

function resetInputs() {
    document.getElementById('title-input').value = '';
    document.getElementById('content-input').value = '';
    document.getElementById('image-input').value = '';
}