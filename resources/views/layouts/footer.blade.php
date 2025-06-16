<!-- ================> Footer section start here <================== -->
<footer class="footer" style="background-image:url(assets/images/footer/bg.png) ; display: none !important;">
    <div class="footer__wrapper padding-top padding-bottom">
        <div class="container">
            <div class="footer__content text-center">
                <a class="mb-4 d-inline-block" href="index.html">
                <img src="{{url('images/logo/logo.png')}}" alt="logo">
                </a>
                <ul class="social justify-content-center">
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-facebook-f"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="container">
            <div class="text-center py-4">
                <p class=" mb-0">© 2023 | All Rights Reserved </p>
            </div>
        </div>
    </div>
</footer>
<!-- ================> Footer section end here <================== -->



<!-- vendor plugins -->
<script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('js/all.min.js')}}"></script>
<script src="{{url('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('js/swiper-bundle.min.js')}}"></script>
<script src="{{url('js/aos.js')}}"></script>
<script src="{{url('js/countdown.min.js')}}"></script>
<script src="{{url('js/lightcase.js')}}"></script>
<script src="{{url('js/purecounter_vanilla.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#usersTable').DataTable();

        let playerCount = 1;
        document.getElementById('add-player').addEventListener('click', () => {
            const container = document.getElementById('player-invitations');
            const html = `
            <div class="mb-3">
                <label for="players[${playerCount}][name]" class="form-label">Player Name</label>
                <input type="text" name="players[${playerCount}][name]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="players[${playerCount}][email]" class="form-label">Player Email</label>
                <input type="email" name="players[${playerCount}][email]" class="form-control" required>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', html);
            playerCount++;
        });
    });
</script>
</body>

</html>