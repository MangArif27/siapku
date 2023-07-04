<script type="text/javascript" src="{{ asset('/apk/scripts/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/apk/scripts/custom.js') }}"></script>
<script type="text/javascript">
    const picker = document.getElementById('tanggal');
    picker.addEventListener('input', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([6, 0].includes(day)) {
            e.preventDefault();
            this.value = '';
            alert('Silahkan Pilih Senin-Jumat');
        }
    });
</script>