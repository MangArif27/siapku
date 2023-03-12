<script type="text/javascript" src="{{ asset('/apk/scripts/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/apk/scripts/custom.js') }}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
    const picker = document.getElementById('form6');
    picker.addEventListener('input', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([6, 0].includes(day)) {
            e.preventDefault();
            this.value = '';
            alert('Silahkan Pilih Senin-Jumat');
        }
    });
</script> -->