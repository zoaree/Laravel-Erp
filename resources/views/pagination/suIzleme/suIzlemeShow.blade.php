@extends('layouts.vertical', ['title' => '', 'sub_title' => 'Önizleme', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card p-6">
        <!-- Grid -->
        <div class="flex justify-between">
            <h1 class="text-m font-semibold text-primary dark:text-white">MITTO CONSULTANCY DANIŞMANLIK A.Ş.</h1>
            <img class="h-6" src="/images/logo-dark.png" alt="Logo">
        </div>

        <!-- Form Bilgileri -->
        <div class="mt-4">
            <table class="table-auto w-full border-collapse border border-gray-400">
                <tbody>
                    <tr class="border">
                        <td class="border p-1 font-bold">Firma/Proje:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                        <td class="border p-1 font-bold">Firma Mühendisi:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Numune Alan:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                        <td class="border p-1 font-bold">Alınış Amacı:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Numune No:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                        <td class="border p-1 font-bold">Türü/Tipi:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Koordinat:</td>
                        <td class="border p-1 adjust-text">X: kadir</td>
                        <td class="border p-1 adjust-text">Y: kadir</td>
                        <td class="border p-1">ED50 / 35 UTM</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Hava Durumu:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                        <td class="border p-1 font-bold">Hava Sıcaklığı:</td>
                        <td class="border p-1 adjust-text">kadir °C</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Alınış Şekli:</td>
                        <td class="border p-1 adjust-text">Numune/Fiziksel/Su Seviyesi/Alınamadı</td>
                        <td class="border p-1 font-bold">Alınış Tarihi:</td>
                        <td class="border p-1">__/__/202_</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Yerüstü Suyu Bilgileri -->
        <div class="mt-4">
            <h2 class="text-m font-semibold text-gray-800 dark:text-gray-200">Yerüstü Suyu</h2>
            <table class="table-auto w-full border-collapse border border-gray-400">
                <tbody>
                    <tr class="border">
                        <td class="border p-1 w-1/8 font-bold">Tip:</td>
                        <td class="border p-1 w-1/8 adjust-text">--</td>
                        <td class="border p-1 w-2/3" rowspan="7">fotoğraf</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">pH:</td>
                        <td class="border p-1 adjust-text">--</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Sıcaklık °C:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Eh mv:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">EC μS/cm:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">TDS mg/l:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Tuzluluk ‰:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Direnç kΩ.cm:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                        <td class="border p-1" rowspan="7">Harita</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Çöz. Oksijen mg/l:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Oksijen Doy. %:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Debi l/sn:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Su Seviyesi l/sn:</td>
                        <td class="border p-1 adjust-text">kadir</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Debi (Çeşme) l/sn:</td>
                        <td class="border p-2 adjust-text">kadir</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Notlar -->
        <div class="mt-8">
            <h3 class="text-m font-semibold text-gray-800 dark:text-gray-200">Notlar:</h3>
            <div class="mt-2 border border-gray-400 h-20"></div>
        </div>

        <div class="mt-8 flex items-center justify-between print:hidden">
            <div class="flex gap-2 items-center print:hidden">
                <a href="javascript:window.print()" class="btn bg-primary text-white"><i class="mgc_print_line text-lg me-1"></i> Print</a>
            </div>
        </div>
    </div>
    <style>
        @media print {
            [data-toggle="back-to-top"] {
                display: none;
            }
        }
    </style>
@endsection
