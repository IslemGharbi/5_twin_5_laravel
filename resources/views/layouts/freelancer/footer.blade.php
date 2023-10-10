<footer class="footer section section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row" style="justify-content: center">
            <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
                <!-- About -->
                <div class="block about">
                    <!-- footer logo -->
                    <img src="{{ url('images/logo-footer.png') }}" alt="">
                    <!-- description -->
                    <p class="alt-color">Opportunity ® is a registered Trademark of Opportunity Technology Pty
                        Limited
                    </p>
                    <p>
                        Copyright ©
                        <script>
                            var CurrentYear = new Date().getFullYear()
                            document.write(CurrentYear)
                        </script> Opportunity Technology Pvt Limited</p>
                </div>
            </div>
            <!-- Link list -->
            <div class="col-lg-2 offset-lg-1 col-md-3">
                <div class="block">
                    <h4>Contact</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <!-- Link list -->
            <div class="col-lg-2 col-md-7 offset-md-1 offset-lg-0">
                <div class="block">
                    <h4>Social</h4>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Insragram</a></li>
                        <li><a href="#">Github</a></li>
                        <li><a href="#">Youtube</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12">
                <!-- Copyright -->
                <div class="copyright">
                    <span style="color: white">
                        <script>
                            var CurrentYear = new Date().getFullYear()
                            document.write(CurrentYear)
                        </script>.
                        All Rights Reserved </span><a class="text-primary"
                        href="{{ route('gig.list') }}">Opportunity</a>
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <!-- Social Icons -->
                <ul class="social-media-icons text-right">
                    <li><a class="fa fa-facebook" href="#" target="_blank"></a></li>
                    <li><a class="fa fa-twitter" href="#" target="_blank"></a></li>
                    <li><a class="fa fa-github" href="#" target="_blank"></a>
                    </li>
                    <li><a class="fa fa-instagram" href="#"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
        <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
