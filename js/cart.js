// const decreaseButtons = document.querySelectorAll('.btn-decrease');
// const increaseButtons = document.querySelectorAll('.btn-increase');

// function updateTotalHarga() {
//     let totalHarga = 0;
//     const rows = document.querySelectorAll('.card-sampah');
//     rows.forEach(row => {
//         const jumlahSampah = parseInt(row.querySelector('.form-control').value);
//         const hargaSampah = parseInt(row.querySelector('.harga').innerText.replace(/[^0-9]/g, ''));
//         totalHarga += jumlahSampah * hargaSampah;
//     });
//     document.querySelector("#totalHarga").innerText = "Rp " + totalHarga.toLocaleString('id-ID');
// }

// decreaseButtons.forEach(btn => {
//     btn.addEventListener('click', () => {
//         const inputNumber = document.querySelector(btn.dataset.target);
//         if (inputNumber.value > 0) {
//             inputNumber.value = parseInt(inputNumber.value) - 1;
//             updateTotalHarga();
//         }
//     });
// });



// increaseButtons.forEach(btn => {
//     btn.addEventListener('click', () => {
//         const inputNumber = document.querySelector(btn.dataset.target);
//         inputNumber.value = parseInt(inputNumber.value) + 1;
//         updateTotalHarga();
//     });
// });


const cart = document.getElementById('cart');
const decreaseButtons = document.querySelectorAll('.btn-decrease');
const increaseButtons = document.querySelectorAll('.btn-increase');
// cart.classList.add('d-none')

function addToCart(product_id, product_name, quantity, price) {
    let item = {
        'product_id': product_id,
        'product_name': product_name,
        'quantity': quantity,
        'price': price
    };
    cart.push(item);
    console.log(cart); // Tampilkan isi array ke dalam console (opsional)
}

function updateTotalHarga() {
    let totalHarga = 0;
    const rows = document.querySelectorAll('.card-sampah');
    rows.forEach(row => {
        const jumlahSampah = parseInt(row.querySelector('.form-control').value);
        const hargaSampah = parseInt(row.querySelector('.harga').innerText.replace(/[^0-9]/g, ''));
        totalHarga += jumlahSampah * hargaSampah;
    });
    if (totalHarga > 0) {
        cart.classList.remove('d-none');
    } else {
        cart.classList.add('d-none');
    }
    document.querySelector("#totalHarga").innerText = "Rp " + totalHarga.toLocaleString('id-ID');
}


decreaseButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const inputNumber = document.querySelector(btn.dataset.target);
        if (inputNumber.value > 0) {
            inputNumber.value = parseInt(inputNumber.value) - 1;
            updateTotalHarga();
        }
    });
});



increaseButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const inputNumber = document.querySelector(btn.dataset.target);
        inputNumber.value = parseInt(inputNumber.value) + 1;
        updateTotalHarga();
    });
});
