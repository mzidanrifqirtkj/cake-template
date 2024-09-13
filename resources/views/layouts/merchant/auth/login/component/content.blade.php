<body>
    <main>
        <section id="auth-hero">
            <img src="{{ asset('img/sign-up-image.png') }}" alt="Image Sign Up" class="background">
            <div class="content">
                <h2 class="title">Selangkah Lebih Dekat Dengan Impianmu</h2>
                <p class="description">Sebuah layanan E-Learning gratis yang siap membantumu menjadi seorang ahli</p>
            </div>
        </section>
        <section id="auth-form">
            <a class="btn-back" href="/">
                <i class="fa-solid fa-arrow-left"></i>
                <p>Homepage</p>
            </a>
            <div class="header">
                <h1>Sign In</h1>
                <p>Persiapkan diri untuk masa depan yang penuh dengan bintang</p>
            </div>
            <form action="{{ route('merchant.login.store') }}" method="POST">
                @csrf
                <div class="input-group border-primary">
                    <label for="text">username</label>
                    <input type="text" class="placeholder-primary" id="username" name="identifier" placeholder="Your username" required>
                </div>
                <div class="input-group border-primary">
                    <label for="password">Password</label>
                    <input type="password" class="placeholder-primary" id="password" name="password" placeholder="Your password" required>
                </div>
                <button type="submit" class="btn-secondary btn-submit">Sign In</button>
                <p class="text-center">Don't have an account? <a href="signup" class="link">Sign Up</a></p>
            </form>
        </section>
    </main>

        @if(session('success'))
        <script>
            window.onload = function() {
                swal("Success", "Test Success Message", "success");
            };
        </script>
    @endif

    @if(session('error'))
        <script>
            window.onload = function() {
                swal("Error", "Test Error Message", "error");
            };
        </script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>
