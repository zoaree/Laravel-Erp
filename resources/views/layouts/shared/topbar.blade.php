<!-- Topbar Start -->
<header class="app-header flex items-center px-4 gap-3">
    <!-- Sidenav Menu Toggle Button -->
    <button id="button-toggle-menu" class="nav-link p-2">
        <span class="sr-only">Menu Toggle Button</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="mgc_menu_line text-xl"></i>
        </span>
    </button>

    <!-- Topbar Brand Logo -->
    <a href="{{ route('any', 'index') }}" class="logo-box">
        <!-- Light Brand Logo -->
        <div class="logo-light">
            <img src="/images/logo-light.png" class="logo-lg h-6" alt="Light logo">
            <img src="/images/logo-sm.png" class="logo-sm" alt="Small logo">
        </div>

        <!-- Dark Brand Logo -->
        <div class="logo-dark">
            <img src="/images/logo-dark.png" class="logo-lg h-6" alt="Dark logo">
            <img src="/images/logo-sm.png" class="logo-sm" alt="Small logo">
        </div>
    </a>

    <!-- Topbar Search Modal Button -->
    <button type="button" data-fc-type="modal" data-fc-target="topbar-search-modal" class="nav-link p-2 me-auto">
        <span class="sr-only">Search</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="mgc_search_line text-2xl"></i>
        </span>
    </button>



    <!-- Fullscreen Toggle Button -->
    <div class="md:flex hidden">
        <button data-toggle="fullscreen" type="button" class="nav-link p-2">
            <span class="sr-only">Fullscreen Mode</span>
            <span class="flex items-center justify-center h-6 w-6">
                <i class="mgc_fullscreen_line text-2xl"></i>
            </span>
        </button>
    </div>

    <!-- Notification Bell Button -->
    <div class="relative md:flex hidden">
        <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2">
            <span class="sr-only">Bildirimler</span>
            <span class="flex items-center justify-center h-6 w-6">
                <i class="mgc_notification_line text-2xl"></i>
            </span>
        </button>
        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg">

            <div class="p-2 border-b border-dashed border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <h6 class="text-sm"> Bildirimler</h6>
                    <a href="javascript: void(0);" class="text-gray-500 underline">
                        <small>Hepsini Temizle</small>
                    </a>
                </div>
            </div>

            <div class="p-4 h-30" data-simplebar>


                <a href="javascript:void(0);" class="block mb-4">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex justify-center items-center h-9 w-9 rounded-full bg text-white bg-primary">
                                    <i class="mgc_message_3_line text-lg"></i>
                                </div>
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Datacorp <small
                                        class="font-normal text-gray-500 ms-1">1 min ago</small></h5>
                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="javascript:void(0);" class="block mb-4">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex justify-center items-center h-9 w-9 rounded-full bg-info text-white">
                                    <i class="mgc_user_add_line text-lg"></i>
                                </div>
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Admin <small
                                        class="font-normal text-gray-500 ms-1">1 hr ago</small></h5>
                                <small class="noti-item-subtitle text-muted">New user registered</small>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="javascript:void(0);" class="block mb-4">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img src="/images/users/avatar-2.jpg" class="rounded-full h-9 w-9" alt="">
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Cristina Pride <small
                                        class="font-normal text-gray-500 ms-1">1 day ago</small></h5>
                                <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next
                                    meeting</small>
                            </div>
                        </div>
                    </div>
                </a>


            </div>

            <a href="javascript:void(0);"
                class="p-2 border-t border-dashed border-gray-200 dark:border-gray-700 block text-center text-primary underline font-semibold">
                Hepsini Görüntüle
            </a>
        </div>
    </div>

    <!-- Light/Dark Toggle Button -->
    <div class="flex">
        <button id="light-dark-mode" type="button" class="nav-link p-2">
            <span class="sr-only">Aydınlık/Karanlık Mod</span>
            <span class="flex items-center justify-center h-6 w-6">
                <i class="mgc_moon_line text-2xl"></i>
            </span>
        </button>
    </div>

    <!-- Profile Dropdown Button -->
    <div class="relative">
        <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
            @php
                // Türkçe karakterleri İngilizce karşılıklarına çeviren fonksiyon
                function convertTurkishChars($string)
                {
                    $turkish = ['ş', 'Ş', 'ı', 'İ', 'ç', 'Ç', 'ü', 'Ü', 'ö', 'Ö', 'ğ', 'Ğ'];
                    $english = ['s', 'S', 'i', 'I', 'c', 'C', 'u', 'U', 'o', 'O', 'g', 'G'];
                    return str_replace($turkish, $english, $string);
                }

                // Kullanıcının adını al ve Türkçe karakterleri İngilizce karşılıklarına çevir
                $name = convertTurkishChars(auth()->user()->name);
                $a = strtoupper(substr($name, 0, 1));
                $b = '';

                // Kullanıcının soyadının baş harfini al
                if (strpos($name, ' ') !== false) {
                    $b = strtoupper(substr($name, strpos($name, ' ') + 1, 1));
                }
            @endphp

            <!-- Profil resmini göster veya varsayılan simgeyi göster -->
            <div class="flex items-center">
                @if (auth()->check() && auth()->user()->user_image)
                    <img src="{{ asset('storage/' . auth()->user()->user_image) }}" alt="user-image"
                        class="w-10 h-10 rounded-full object-cover">
                @else
                    <div class="w-10 h-10 flex justify-center items-center bg-success/25 rounded-full">
                        <span class="text-success text-xl">{{ $a }}{{ $b }}</span>
                    </div>
                @endif
            </div>
        </button>
        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
            @role('super-admin')
            <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="{{ route('user.index') }}">
                <i class="mgc_user_3_line  me-2"></i>
                <span>Kullanıcı Oluştur</span>
            </a>
            @endrole
            <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="{{ route('pagination.user.profil') }}">
                <i class="mgc_task_2_line  me-2"></i>
                <span>Profil Düzenle</span>
            </a>
            <hr class="my-2 -mx-2 border-gray-200 dark:border-gray-700">
            <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mgc_exit_line  me-2"></i>
                <span>Çıkış Yap</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</header>
<!-- Topbar End -->

<!-- Topbar Search Modal -->
<div>
    <div id="topbar-search-modal" class="fc-modal hidden w-full h-full fixed top-0 start-0 z-50">
        <div
            class="fc-modal-open:opacity-100 fc-modal-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-12 sm:mx-auto">
            <div
                class="mx-auto max-w-2xl overflow-hidden rounded-xl bg-white shadow-2xl transition-all dark:bg-slate-800">
                <div class="relative">
                    <div
                        class="pointer-events-none absolute top-3.5 start-4 text-gray-900 text-opacity-40 dark:text-gray-200">
                        <i class="mgc_search_line text-xl"></i>
                    </div>
                    <input type="search"
                        class="h-12 w-full border-0 bg-transparent ps-11 pe-4 text-gray-900 placeholder-gray-500 dark:placeholder-gray-300 dark:text-gray-200 focus:ring-0 sm:text-sm"
                        placeholder="Search...">
                </div>
            </div>
        </div>
    </div>
</div>