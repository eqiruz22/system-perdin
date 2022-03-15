var meals_allowance = document.getElementById('meals_allowance');
meals_allowance.addEventListener('keyup', function (e) {
    meals_allowance.value = formatRupiah(this.value, '');
});

var hardship = document.getElementById('hardship');
hardship.addEventListener('keyup', function (e) {
    hardship.value = formatRupiah(this.value, '');
});

var rental_house_allowance = document.getElementById('rental_house_allowance');
rental_house_allowance.addEventListener('keyup', function (e) {
    rental_house_allowance.value = formatRupiah(this.value, '');
});

var pulsa_allowance = document.getElementById('pulsa_allowance');
pulsa_allowance.addEventListener('keyup', function (e) {
    pulsa_allowance.value = formatRupiah(this.value, '');
});

var hardship_allowance = document.getElementById('hardship_allowance');
hardship_allowance.addEventListener('keyup', function (e) {
    hardship_allowance.value = formatRupiah(this.value, '');
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
