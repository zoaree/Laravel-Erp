@extends('layouts.vertical', ['title' => '', 'sub_title' => 'Önizleme', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
<link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.28/"></script>
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
                        <td class="border p-1 adjust-text">{{ $suIzleme->company->company_person ?? '--' }}</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Numune Alan:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->user->name?? '--'}}</td>
                        <td class="border p-1 font-bold">Alınış Amacı:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->purpose?? '--'}}</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Numune No:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->specimen?? '--'}}</td>
                        <td class="border p-1 font-bold">Türü/Tipi:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->type?? '--'}}</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Koordinat:</td>
                        <td class="border p-1 adjust-text">X: {{ $suIzleme->coord_x?? '--'}}</td>
                        <td class="border p-1 adjust-text">Y: {{ $suIzleme->coord_y?? '--'}}</td>
                        <td class="border p-1">ED50 / UTM</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Hava Durumu:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->weather?? '--'}}</td>
                        <td class="border p-1 font-bold">Hava Sıcaklığı:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->temp?? '--'}} °C</td>
                    </tr>
                    <tr class="border flex flex-col sm:table-row">
                        <td class="border p-1 font-bold">Alınış Şekli:</td>
                        <td class="border p-1 adjust-text">

                            @if ($suIzleme->alinis_sekli!=null)


                        @foreach ($suIzleme->alinis_sekli as $item)
                            {{ $item}} /
                        @endforeach
                        @endif
                    </td>
                        <td class="border p-1 font-bold">Alınış Tarihi:</td>
                        <td class="border p-1">{{ $suIzleme->created_at ? $suIzleme->created_at->timezone('Europe/Istanbul')->format('d-m-Y H:i') : '--' }}</td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="mt-4">
            <h2 class="text-m font-semibold text-gray-800 dark:text-gray-200">{{ $suIzleme->extent?? '--'}}</h2>
            <table class="table-auto w-full border-collapse border border-black">
                <tbody>
                    <tr class="border">
                        <td class="border p-1 w-1/8 font-bold">Tip:</td>
                        <td class="border p-1 w-1/8 adjust-text">{{ $suIzleme->tip?? '--'}}</td>
                        <td class="border p-1 w-2/3" rowspan="7"><img src="{{ $suIzleme->image_path ? asset($suIzleme->image_path) : '--' }}" alt="work-thumbnail" style=" height: 250px; width: 100%; object-fit: cover;" class="rounded-lg">
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">pH:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->ph?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Sıcaklık °C:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->head?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Eh mv:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->eh?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">EC μS/cm:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->ec?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">TDS mg/l:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->tds?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Tuzluluk ‰:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->salt?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Direnç kΩ.cm:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->resistance?? '--'}}</td>
                        <td class="border p-1" rowspan="7" id="map" > <div id="mapViewDiv" style="height: 250px; width: 100%;"></div></td>


                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Çöz. Oksijen mg/l:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->oxygen?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Oksijen Doy. %:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->oxygenS?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Debi l/sn:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->flow?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Su Seviyesi l/sn:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->water?? '--'}}</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-1 font-bold">Debi (Çeşme) l/sn:</td>
                        <td class="border p-1 adjust-text">{{ $suIzleme->fountain?? '--'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Notlar -->
        <div class="mt-8">
            <h3 class="text-m font-semibold text-gray-800 dark:text-gray-200">Notlar:</h3>
             {{ $suIzleme->notes?? '--'}}
        </div>

        <div class="mt-8 flex items-center justify-between print:hidden">
            <div class="flex gap-2 items-center print:hidden">
                <a href="javascript:window.print()" class="btn bg-primary text-white"><i class="mgc_print_line text-lg me-1"></i> Print</a>
            </div>
        </div>
    </div>
    <style>
@media print {
    header, footer, nav, .hide-on-print {
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
