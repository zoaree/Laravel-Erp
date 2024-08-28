<!DOCTYPE html>
<html lang="tr">

<head>
    @include('layouts.shared/title-meta', ['title' => 'Hata 404'])

    @include('layouts.shared/head-css')
</head>

<body>

    <div>

        <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">
            <div class="h-screen w-screen flex justify-center items-center">
                <div class="flex flex-col justify-center text-center gap-6">
                    <a href="/" class="flex justify-center mx-auto">
                        <img class="h-6 block dark:hidden" src="/images/logo-dark.png" alt="Logo">
                        <img class="h-6 hidden dark:block" src="/images/logo-light.png" alt="Logo">
                    </a>
                    <p class="text-3xl font-semibold text-primary">404!</p>
                    <h1 class="text-4xl font-bold tracking-tight dark:text-gray-100">Sayfa bulunamadı.</h1>
                    <p class="text-base text-gray-600 dark:text-gray-300">Üzgünüz, aradığınız sayfayı bulamadık.</p>
                    <a href="/" class="text-base font-medium text-primary">Ana sayfaya dön</a>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
