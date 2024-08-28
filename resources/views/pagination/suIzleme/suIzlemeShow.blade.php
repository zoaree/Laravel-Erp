@extends('layouts.vertical', ['title' => '', 'sub_title' => 'Önizleme', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.28/"></script>
    <style>
        @media print {

            header,
            footer,
            nav,
            .hide-on-print {
                display: none;
            }

            body {
                background: none !important;
            }

            * {
                color: black !important;
                background: transparent !important;
                box-shadow: none !important;
            }

            .bg-red-500,
            .bg-yellow-500,
            .bg-blue-500,
            .bg-green-500,
            .bg-orange-900,
            .bg-blue-900,
            .bg-blue-700,
            .bg-blue-300,
            .bg-blue-100 {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .bg-red-500 {
                background-color: #f56565 !important;
            }

            .bg-yellow-500 {
                background-color: #ecc94b !important;
            }

            .bg-blue-500 {
                background-color: #4299e1 !important;
            }

            .bg-green-500 {
                background-color: #48bb78 !important;
            }

            .bg-orange-900 {
                background-color: #7b341e !important;
            }

            .bg-blue-900 {
                background-color: #2a4365 !important;
            }

            .bg-blue-700 {
                background-color: #2b6cb0 !important;
            }

            .bg-blue-300 {
                background-color: #63b3ed !important;
            }

            .bg-blue-100 {
                background-color: #ebf8ff !important;
            }

            .bg-orange-900,
            .bg-orange-700,
            .bg-orange-300 {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .bg-orange-900 {
                background-color: #7b341e !important;
                color: white !important;
            }

            .bg-orange-700 {
                background-color: #c05621 !important;
                color: white !important;
            }

            .bg-orange-300 {
                background-color: #fbd38d !important;
                color: black !important;
            }
        }

        @page {
            margin: 0;
        }
        }
    </style>
@endsection

@section('content')


    <div class="card p-6">
        <!-- Grid -->
        <div class="flex justify-between">
            <h1 class="text-m font-semibold text-primary dark:text-white">MITTO CONSULTANCY DANIŞMANLIK A.Ş.</h1>
            <img class="h-6" src="/images/logo-dark.png" alt="Logo">
        </div>

        <!-- Form Bilgileri -->
        <div class="mt-4">
            <table class="table-auto w-full border-collapse border border-black">
                <tbody>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Firma/Proje:</td>
                        <td class="border p-1 adjust-text"> {{ $suIzleme->company->companyName ?? 'Bilinmiyor' }}</td>
                        <td class="border p-1 font-bold">Firma Mühendisi:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->company_person ?? '--' }}</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Numune Alan:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->user->name ?? '--' }}</td>
                        <td class="border p-1 font-bold">Alınış Amacı:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->purpose ?? '--' }}</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Numune No:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->specimen ?? '--' }}</td>
                        <td class="border p-1 font-bold">Türü/Tipi:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->type ?? '--' }}</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Koordinat:</td>
                        <td class="border p-1 adjust-text">X: {{ $suIzleme->coord_x ?? '--' }}</td>
                        <td class="border p-1 adjust-text">Y: {{ $suIzleme->coord_y ?? '--' }}</td>
                        <td class="border p-1">ED50 / UTM</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Hava Durumu:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->weather ?? '--' }}</td>
                        <td class="border p-1 font-bold">Hava Sıcaklığı:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->temp ?? '--' }} °C</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Alınış Şekli:</td>
                        <td class="border p-1 adjust-text">

                            @if ($suIzleme->alinis_sekli != null)
                                @foreach ($suIzleme->alinis_sekli as $item)
                                    {{ $item }} /
                                @endforeach
                            @endif
                        </td>
                        <td class="border p-1 font-bold">Alınış Tarihi:</td>
                        <td class="border p-1">
                            {{ $suIzleme->created_at ? $suIzleme->created_at->timezone('Europe/Istanbul')->format('d-m-Y H:i') : '--' }}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="mt-4">
            <h2 class="text-m font-semibold text-gray-800 dark:text-gray-200">{{ $suIzleme->extent ?? '--' }}</h2>
            <table class="table-auto w-full border-collapse border border-black">
                <tbody>
                    <tr class="border">
                        <td class="border p-1 w-1/8 font-bold">Tip:</td>
                        <td class="border p-1 w-1/8 adjust-text">{{ $suIzleme->tip ?? '--' }}</td>
                        <td class="border p-1 w-2/3" rowspan="7"><img
                                src="{{ $suIzleme->image_path ? asset($suIzleme->image_path) : '--' }}"
                                alt="work-thumbnail" style=" height: 250px; width: 100%; object-fit: cover;"
                                class="rounded-lg">
                        </td>
                    </tr>
                    @php
                        $ph = $suIzleme->ph ?? null;
                        $colorClass = '';

                        if ($ph !== null) {
                            if ($ph > 11) {
                                $colorClass = 'bg-red-500 text-white'; // pH > 11 için kırmızı
                            } elseif ($ph >= 8.5 && $ph <= 11) {
                                $colorClass = 'bg-yellow-500 text-black'; // pH 8.5 - 11 için sarı
                            } elseif ($ph >= 6.5 && $ph < 8.5) {
                                $colorClass = 'bg-blue-500 text-white'; // pH 6.5 - 8.5 için mavi
                            } elseif ($ph >= 4 && $ph < 6.5) {
                                $colorClass = 'bg-yellow-500 text-black'; // pH 4 - 6.5 için sarı
                            } elseif ($ph < 4) {
                                $colorClass = 'bg-red-500 text-white'; // pH < 4 için kırmızı
                            }
                        }
                    @endphp
                    <tr class="border {{ $colorClass }}">
                        <td class="border p-1 font-bold">pH:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->ph ?? '--' }}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Sıcaklık °C:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->head ?? '--' }}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Eh mv:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->eh ?? '--' }}</td>
                    </tr>
                    @php
                        $ec = $suIzleme->ec ?? null;
                        $colorClass = '';

                        if ($ec !== null) {
                            if ($ec > 1000) {
                                $colorClass = 'bg-yellow-500 text-black'; // Sarı
                            } elseif ($ec >= 400 && $ec <= 1000) {
                                $colorClass = 'bg-green-500 text-white'; // Yeşil
                            } elseif ($ec < 400) {
                                $colorClass = 'bg-blue-500 text-white'; // Mavi
                            }
                        }
                    @endphp
                    <tr class="border {{ $colorClass }}">
                        <td class="border p-1 font-bold">EC μS/cm:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->ec ?? '--' }}</td>
                    </tr>
                    @php
                        $tds = $suIzleme->tds ?? null;
                        $colorClass = '';

                        if ($tds !== null) {
                            if ($tds >= 180 && $tds <= 300) {
                                $colorClass = 'bg-blue-900 text-white'; // Çok Sert Su
                            } elseif ($tds >= 120 && $tds < 180) {
                                $colorClass = 'bg-blue-700 text-white'; // Sert Su
                            } elseif ($tds >= 60 && $tds < 120) {
                                $colorClass = 'bg-blue-500 text-white'; // Orta Sert Su
                            } elseif ($tds >= 17 && $tds < 60) {
                                $colorClass = 'bg-blue-300 text-black'; // Az Sert Su
                            } elseif ($tds >= 0 && $tds < 17) {
                                $colorClass = 'bg-blue-100 text-black'; // Yumuşak Su
                            }
                        }
                    @endphp
                    <tr class="border {{ $colorClass }}">
                        <td class="border p-1 font-bold">TDS mg/l:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->tds ?? '--' }}</td>
                    </tr>
                    @php
                        $salt = $suIzleme->salt ?? null;
                        $colorClass = '';

                        if ($salt !== null) {
                            if ($salt >= 5 && $salt <= 15) {
                                $colorClass = 'bg-orange-900 text-white'; // Çok Acı Su
                            } elseif ($salt >= 1 && $salt < 5) {
                                $colorClass = 'bg-orange-700 text-white'; // Acı Su
                            } elseif ($salt >= 0 && $salt < 1) {
                                $colorClass = 'bg-orange-300 text-black'; // Tatlı Su
                            }
                        }
                    @endphp
                    <tr class="border {{ $colorClass }}">
                        <td class="border p-1 font-bold">Tuzluluk ‰:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->salt ?? '--' }}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Direnç kΩ.cm:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->resistance ?? '--' }}</td>
                        <td class="border p-1" rowspan="7" id="map">
                            <div id="mapViewDiv" style="height: 250px; width: 100%;"></div>
                        </td>


                    </tr>
                    @php
                        $oxygen = $suIzleme->oxygen ?? null;
                        $colorClass = '';

                        if ($oxygen !== null) {
                            if ($oxygen < 3) {
                                $colorClass = 'bg-red-500 text-white'; // Kırmızı
                            } elseif ($oxygen >= 3 && $oxygen < 6) {
                                $colorClass = 'bg-yellow-500 text-black'; // Sarı
                            } elseif ($oxygen >= 6 && $oxygen < 8) {
                                $colorClass = 'bg-green-500 text-white'; // Yeşil
                            } elseif ($oxygen >= 8) {
                                $colorClass = 'bg-blue-500 text-white'; // Mavi
                            }
                        }
                    @endphp
                    <tr class="border {{ $colorClass }}">
                        <td class="border p-1 font-bold">Çöz. Oksijen mg/l:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->oxygen ?? '--' }}</td>
                    </tr>
                    @php
                        $oxygenS = $suIzleme->oxygenS ?? null;
                        $colorClass = '';

                        if ($oxygenS !== null) {
                            if ($oxygenS < 40) {
                                $colorClass = 'bg-red-500 text-white'; // Kırmızı
                            } elseif ($oxygenS >= 40 && $oxygenS < 70) {
                                $colorClass = 'bg-yellow-500 text-black'; // Sarı
                            } elseif ($oxygenS >= 70 && $oxygenS < 90) {
                                $colorClass = 'bg-green-500 text-white'; // Yeşil
                            } elseif ($oxygenS >= 90) {
                                $colorClass = 'bg-blue-500 text-white'; // Mavi
                            }
                        }
                    @endphp
                    <tr class="border {{ $colorClass }}">
                        <td class="border p-1 font-bold">Oksijen Doy. %:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->oxygenS ?? '--' }}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Debi l/sn:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->flow ?? '--' }}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Su Seviyesi l/sn:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->water ?? '--' }}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Debi (Çeşme) l/sn:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->fountain ?? '--' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex flex-wrap text-xs">
            <!-- Notlar Bölümü -->
            <div class="w-full md:w-1/6 mb-4 md:mb-0">
                <h3 class="text-xs font-semibold text-gray-800 dark:text-gray-200">Notlar:</h3>
                <p class="text-xxs">{{ $suIzleme->notes ?? '--' }}</p>
            </div>

            <!-- Legend Bölümü -->
            <div class="w-full md:w-5/6 flex flex-wrap pl-2 justify-end">
                <img src="{{ asset('su_izleme/su_izleme_legand.png') }}" alt="Su İzleme Legend" class="w-3/4 h-auto">
            </div>

            <div class="mt-8 flex items-center justify-between print:hidden">
                <div class="flex gap-2 items-center print:hidden">
                    <a href="javascript:window.print()" class="btn bg-primary text-white">
                        <i class="mgc_print_line text-lg me-1"></i> Print
                    </a>
                </div>
            </div>
        </div>
        <style>
            @media print {

                header,
                footer,
                nav,
                .hide-on-print {
                    display: none;
                }

                body {
                    background: none !important;
                }

                * {
                    color: black !important;
                    background: transparent !important;
                    box-shadow: none !important;
                }

                @page {
                    margin: 0;
                }
            }
        </style>
    @endsection
    @section('script')
        <script src="https://js.arcgis.com/4.28/"></script>
        <script>
            require([
                "esri/Map",
                "esri/views/MapView",
                "esri/Graphic",
                "esri/layers/GraphicsLayer"
            ], function(Map, MapView, Graphic, GraphicsLayer) {

                var map = new Map({
                    basemap: "hybrid"
                });

                var view = new MapView({
                    container: "mapViewDiv",
                    map: map,
                    center: [{{ $suIzleme->coord_y }}, {{ $suIzleme->coord_x }}],
                    zoom: 15,
                    constraints: {
                        rotationEnabled: false,
                        minScale: 5000,
                        maxScale: 5000,
                    },
                    ui: {
                        components: ["attribution"]
                    }
                });

                view.when(function() {
                    var point = {
                        type: "point",
                        longitude: {{ $suIzleme->coord_y }},
                        latitude: {{ $suIzleme->coord_x }}
                    };

                    var markerSymbol = {
                        type: "simple-marker",
                        color: [226, 119, 40],
                        outline: {
                            color: [255, 255, 255],
                            width: 1
                        }
                    };

                    var textSymbol = {
                        type: "text",
                        color: "black",
                        haloColor: "white",
                        haloSize: "1px",
                        text: "Numune Noktası",
                        xoffset: 0,
                        yoffset: -25,
                        font: {
                            size: 12,
                            family: "sans-serif"
                        }
                    };

                    var pointGraphic = new Graphic({
                        geometry: point,
                        symbol: markerSymbol
                    });

                    var labelGraphic = new Graphic({
                        geometry: point,
                        symbol: textSymbol
                    });

                    var graphicsLayer = new GraphicsLayer();
                    graphicsLayer.add(pointGraphic);
                    graphicsLayer.add(labelGraphic);
                    map.add(graphicsLayer);
                });
            });
        </script>
    @endsection
