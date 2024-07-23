document.addEventListener('DOMContentLoaded', function() {
    var kursusSelect = document.getElementById('kursus_id');
    var hargaInput = document.getElementById('harga');

    kursusSelect.addEventListener('change', function() {
        var selectedOption = kursusSelect.options[kursusSelect.selectedIndex];
        var selectedHarga = selectedOption.getAttribute('data-harga');

        hargaInput.value = selectedHarga;
    });
});
