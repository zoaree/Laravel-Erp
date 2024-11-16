<!DOCTYPE html>
<html lang="tr">

<head>
    @include('layouts.shared/title-meta', ['title' => 'Hata 404 Alt'])

    @include('layouts.shared/head-css')
</head>

<body class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">

    <div class="flex wrapper">

        @include('layouts.shared/sidebar')

        <!-- ============================================================== -->
        <!-- Sayfa İçeriği Başlangıcı -->
        <!-- ============================================================== -->

        <div class="page-content">

            @include('layouts.shared/topbar')

            <main class="flex-grow p-6">

                <div class="flex h-full justify-center items-center">
                    <div class="flex flex-col justify-center text-center gap-6">
                        <a href="assets/" class="flex justify-center mx-auto">
                            <img class="h-6 block dark:hidden" src="/images/logo-dark.png" alt="Logo">
                            <img class="h-6 hidden dark:block" src="/images/logo-light.png" alt="Logo">
                        </a>
                        <p class="text-3xl font-semibold text-primary">404!</p>
                        <h1 class="text-4xl font-bold tracking-tight dark:text-gray-100">Sayfa bulunamadı.</h1>
                        <p class="text-base text-gray-600 dark:text-gray-300">Üzgünüz, aradığınız sayfayı bulamadık.</p>
                        <a href="assets/" class="text-base font-medium text-primary">Ana sayfaya dön</a>
                    </div>
                </div>
            </main>

            @include('layouts.shared/footer')

        </div>

        <!-- ============================================================== -->
        <!-- Sayfa İçeriği Bitişi -->
        <!-- ============================================================== -->

    </div>

    @include('layouts.shared/customizer')

    @include('layouts.shared/footer-scripts')

    @vite(['resources/js/app.js'])

</body>

</html>
