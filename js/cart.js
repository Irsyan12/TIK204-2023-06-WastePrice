let cart = [];

const decreaseButtons = document.querySelectorAll('.btn-decrease');
const increaseButtons = document.querySelectorAll('.btn-increase');
const cartElement = document.getElementById('cart');
const totalHargaElement = document.getElementById('totalHarga');

function updateTotalHarga() {
    const totalHargaElem = document.querySelector('#totalHarga');
    let totalHarga = 0;

    cart.forEach(item => {
        item.subtotal = item.harga_sampah * item.jumlah;
        totalHarga += item.subtotal;
    });

    totalHargaElem.textContent = `Rp ${totalHarga.toLocaleString()}`;

    if (totalHarga > 0) {
        cartElement.classList.remove('d-none');
    } else {
        cartElement.classList.add('d-none');
    }
}

function removeItemFromCart(id) {
    cart = cart.filter(item => item.id_sampah !== id);
}


const jumlahSampahInputs = document.querySelectorAll('.form-jumlah');

jumlahSampahInputs.forEach(input => {
    input.addEventListener('input', () => {
        const card = input.closest('.card-sampah');
        const idSampah = card.dataset.id;
        const index = cart.findIndex(item => item.id_sampah === idSampah);

        if (index !== -1) {
            const jumlahSampah = parseInt(input.value);
            if (jumlahSampah === 0) {

                removeItemFromCart(idSampah); // remove item with matching id from cart
            } else {
                cart[index].jumlah = jumlahSampah;
            }
        }
        updateTotalHarga();
    });
});



decreaseButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const inputNumber = document.querySelector(btn.dataset.target);
        if (inputNumber.value > 0) {
            inputNumber.value = parseInt(inputNumber.value) - 1;

            const card = btn.closest('.card-sampah');
            const idSampah = card.dataset.id;
            const index = cart.findIndex(item => item.id_sampah === idSampah);

            if (index !== -1) {
                const inputNumber = document.querySelector(btn.dataset.target);
                const jumlahSampah = parseInt(inputNumber.value);
                if (jumlahSampah === 0) {
                    removeItemFromCart(idSampah); // remove item with matching id from cart
                } else {
                    cart[index].jumlah = jumlahSampah;
                }
            }

            updateTotalHarga();
        }
    });
});

increaseButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const inputNumber = document.querySelector(btn.dataset.target);
        inputNumber.value = parseInt(inputNumber.value) + 1;

        const card = btn.closest('.card-sampah');
        const idSampah = card.dataset.id;
        const jenisSampah = card.querySelector('.jenis').textContent.trim();
        const hargaSampah = parseInt(card.querySelector('.harga').textContent.trim().substring(3).replace(/\./g, ''));
        const jumlahSampah = parseInt(card.querySelector('.form-jumlah').value);

        const dataSampah = { id_sampah: idSampah, jenis_sampah: jenisSampah, harga_sampah: hargaSampah, jumlah: jumlahSampah };

        // Check if the item already exists in cart
        const index = cart.findIndex(item => item.jenis_sampah === jenisSampah);
        if (index !== -1) {
            // Item already exists in cart, update quantity
            const jumlahSampah = parseInt(inputNumber.value);
            cart[index].jumlah = jumlahSampah;
        } else {
            // Item doesn't exist in cart, add new item
            cart.push(dataSampah);
        }

        updateTotalHarga();
    });
});


// const btnLanjut = document.querySelector('.btn-lanjut');

// btnLanjut.addEventListener('click', function () {
//     console.table(cart);
//     const query = '?cart=' + JSON.stringify(cart);
//     window.location.href = 'checkout' + query;
// });

const form = document.getElementById('cartForm');
const cartInput = document.querySelector('#cartInput');

form.addEventListener('submit', () => {
    cartInput.value = JSON.stringify(cart);
});