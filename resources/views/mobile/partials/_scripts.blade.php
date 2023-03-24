<script type="text/javascript" src="{{ asset('/apk/scripts/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/apk/scripts/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('/apk/jquery.autocomplete.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Selector input yang akan menampilkan autocomplete.
        $("#buah").autocomplete({
            serviceUrl: "/Apk/Autocomplete", // Kode php untuk prosesing data
            dataType: "JSON", // Tipe data JSON
            onSelect: function(suggestion) {
                $("#buah").val("" + suggestion.buah);
            }
        });
    })
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $('.cari').select2({
        placeholder: 'Pilih Warga Binaan Pemasyarakatan',
        ajax: {
            url: '/Apk/Autocomplete',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.nama,
                            id: item.nama
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
<script type="text/javascript">
    const picker = document.getElementById('tanggal');
    picker.addEventListener('input', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([5, 0].includes(day)) {
            e.preventDefault();
            this.value = '';
            alert('Silahkan Pilih Senin-Kamis dan Jumat');
        }
    });
    picker.addEventListener('input', function(d) {
        var day = new Date(this.value).getUTCDay();
        if ([6].includes(day)) {
            $('#Sesi').prop('hidden', false);
            $('#SesiSabtu').prop('hidden', false);
            $('#SesiBiasa').prop('hidden', true);
        }
    });
    picker.addEventListener('input', function(c) {
        var day = new Date(this.value).getUTCDay();
        if ([1, 2, 3, 4].includes(day)) {
            $('#Sesi').prop('hidden', false);
            $('#SesiSabtu').prop('hidden', true);
            $('#SesiBiasa').prop('hidden', false);
        }
    });
</script>