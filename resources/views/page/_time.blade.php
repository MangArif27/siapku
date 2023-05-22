<!DOCTYPE html>
<html>

<head>
    <title>speak text to speech with Resvonsive Voice</title>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <script type="text/javascript">
        function play1() {
            responsiveVoice.speak(
                "Kunjungan, atas nama, Wahyu Bin Endin, kamar Charlie 2 4, Sudah Habis, Dipersilahkan Untuk Meninggalkan Ruang Kunjungan, Terima Kasih, Atas Kunjungan Anda",
                "Indonesian Male", {
                    pitch: 1,
                    rate: 1,
                    volume: 100
                }
            );
        }

        function stop() {
            responsiveVoice.cancel();
        }

        function pause() {
            responsiveVoice.pause();
        }

        function resume() {
            responsiveVoice.resume();
        }
    </script>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("May 20, 2023 11:10:10").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "Selesai";
                document.getElementById("MyDiv").style.display = "block";
            }
        }, 1000);
    </script>
</head>

<body>
    <p id="demo"></p>
    <button id="MyDiv" onclick="play1();" style="display:none">Play</button>
    <button onclick="stop2();">Stop</button>
    <button onclick="pause3();">Pause</button>
    <button onclick="resume5();">Resume</button>
</body>

</html>