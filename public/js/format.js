var meals = document.getElementById('meals');
meals.addEventListener('keyup', function (e) {
    meals.value = formatRupiah(this.value, '');
});

var hardship = document.getElementById('hardship');
hardship.addEventListener('keyup', function (e) {
    hardship.value = formatRupiah(this.value, '');
});

var rental = document.getElementById('rental');
rental.addEventListener('keyup', function (e) {
    rental.value = formatRupiah(this.value, '');
});

var pulsa = document.getElementById('pulsa');
pulsa.addEventListener('keyup', function (e) {
    pulsa.value = formatRupiah(this.value, '');
});

var hardallowance = document.getElementById('hardallowance');
hardallowance.addEventListener('keyup', function (e) {
    hardallowance.value = formatRupiah(this.value, '');
});

function formatRupiah(number, prefix) {
    var number_string = number.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        remainder = split[0].length % 3,
        rupiah = split[0].substr(0, remainder),
        ribuan = split[0].substr(remainder).match(/\d{3}/gi);

    if (ribuan) {
        separator = remainder ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? '' + rupiah : '';
}
