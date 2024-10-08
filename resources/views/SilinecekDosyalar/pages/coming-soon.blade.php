<!DOCTYPE html>
<html lang="tr">

<head>
    @include('layouts.shared/title-meta', ['title' => 'Yakında Geliyor'])

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
                    <i class="mgc_rocket_line text-4xl text-gray-600 dark:text-gray-100 -rotate-45 my-4"></i>
                    <h1 class="text-2xl font-bold tracking-tight dark:text-gray-100">Takipte kalın, çok yakında başlıyoruz</h1>
                    <p class="text-base text-gray-600 dark:text-gray-300">Sistemi daha harika hale getiriyoruz.</p>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
