<br><br><br>
<br><br><br>
        <footer class="py-4 bg-primary w3-margin-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-right text-white">InfoNete S.A.</p>
                    </div>
                </div>   <!-- row -->
            </div>   <!-- container -->
        </footer>

        <script src="view/js/jquery-3.5.1.min.js"></script>
        <script src="view/js/bootstrap.min.js"></script>
        <script>
            var close = document.getElementsByClassName("closebtn");
            var i;
            for (i = 0; i < close.length; i++) {
                close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                }
            }
        </script>
    </body>
</html>