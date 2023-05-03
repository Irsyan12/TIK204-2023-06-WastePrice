const searchTask = document.getElementById('inputSearch');
searchTask.addEventListener('keyup', function (e) {
    const searchString = e.target.value.toLowerCase();
    const tableRows = document.querySelectorAll('.card-sampah');

    let foundRows = false;

    tableRows.forEach((row) => {
        const kategori = row.querySelector('.kategori').textContent.toLowerCase();
        const jenis = row.querySelector('.jenis').textContent.toLowerCase();
        const keterangan = row.querySelector('.keterangan').textContent.toLowerCase();
        const harga = row.querySelector('.harga').textContent.toLowerCase();

        if (kategori.indexOf(searchString) !== -1 || jenis.indexOf(searchString) !== -1 ||
            keterangan.indexOf(searchString) !== -1 || harga.indexOf(searchString) !== -1) {
            row.classList.remove('d-none');
            foundRows = true;
        } else {
            row.classList.add('d-none');
        }
    });

    if (!foundRows) {
        document.getElementById('noDataMessage').classList.remove('d-none');
    } else {
        document.getElementById('noDataMessage').classList.add('d-none');
    }
});