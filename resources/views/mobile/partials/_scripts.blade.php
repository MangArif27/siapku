<script type="text/javascript" src="{{ asset('/apk/scripts/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/apk/scripts/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('/apk/jquery.autocomplete.js') }}"></script>
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
</script>