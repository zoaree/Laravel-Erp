@extends('layouts.vertical', ['title' => 'Su izleme', 'sub_title' => 'Genel', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Grid.js ve teması için CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css">
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-success/25 text-success text-sm rounded-md p-4 mb-4" role="alert">
            <span class="font-bold">Kaydedildi</span> {{ session('success') }}
        </div>
    @endif
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0 sm:space-x-4">
                    <div class="flex space-x-2 w-full sm:w-auto">
                        <a id="add"
                            class="btn btn-green text-white bg-green-600 hover:bg-green-700 w-full sm:w-auto text-center"
                            href="{{ route('pagination.suIzleme.store') }}">Ekle</a>
                        @hasanyrole('super-admin')
                            <button id="company"
                                class="btn bg-primary text-white bg-blue-500 hover:bg-blue-600 w-full sm:w-auto text-center"
                                data-fc-target="default-modal" data-fc-type="modal">
                                Müşteri Ekle / Listele
                            </button>
                        @endhasanyrole
                    </div>
                    <div class="flex space-x-2 w-full sm:w-auto">
                        <button id="export-btn"
                            class="btn btn-light text-gray-800 bg-gray-200 hover:bg-gray-300 w-full sm:w-auto text-center">
                            Dışa Aktar
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                {{-- <p class="text-sm text-slate-700 dark:text-slate-400 mb-4">Açıklama Yazılabilinir.</p> --}}

                <div id="table-gridjs"></div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div id="default-modal" class="w-full h-full mt-5 fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden">
        <div
            class="fc-modal-open:opacity-100 duration-500 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                    Müşteri Ekle / Listele
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <!-- İçerik için kaydırma çubuğu ekleyin -->
            <div class="px-4 py-8 overflow-y-auto max-h-96"> <!-- max-h-96 yüksekliği kontrol eder -->
                <form method="POST" action="{{ route('pagination.suIzleme.CompCreate') }}">
                    @csrf
                    <div class="flex rounded-md shadow-sm mb-6">
                        <input type="text" id="companyName" name="companyName" class="form-input" required>
                        <button type="submit" class="btn btn-sm bg-primary text-white rounded-e">
                            Ekle
                        </button>
                    </div>
                </form>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Firma
                            </th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company as $item)
                            <tr
                                class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:hover:bg-gray-700">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                    {{ $item->companyName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <form method="POST" action="{{ route('pagination.suIzleme.CompDelete') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit"
                                            class="text-primary hover:text-sky-700 bg-transparent border-0 p-0">
                                            Sil
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                <button
                    class="btn dark:text-gray-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                    data-fc-dismiss type="button">Çıkış</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Grid.js ve ilgili script için CDN -->
    <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>

    <script>

        const tableData = @json($data);

        class GridDatatable {
            init() {
                this.basicTableInit();
            }

            basicTableInit() {
                if (document.getElementById("table-gridjs")) {
                    const grid = new gridjs.Grid({
                        columns: [{
                                name: 'Numune No',
                                formatter: (function(cell) {
                                    return gridjs.html('<span class="fw-semibold">' + cell +
                                        '</span>');
                                })
                            },
                            "Firma",
                            {
                                name: 'Su',
                                formatter: (function(cell) {
                                    return gridjs.html(cell);
                                })
                            },
                            "Tarih",

                            {
                                name: 'İşlemler',
                                width: '90px',
                                formatter: (function(cell) {
                                    let routeUrl = '{{ route('pagination.suIzleme.show', ':id') }}';
                                    routeUrl = routeUrl.replace(':id', cell);

                                    return gridjs.html("<a href='" + routeUrl +
                                        "' class='me-0.5'> <i class='mgc_eye_line text-lg'></i> </a>"
                                        );

                                })
                            },
                        ],
                        pagination: {
                            limit: 100
                        },
                        sort: true,
                        search: true,
                        data: tableData,
                        language: {
                            'search': {
                                'placeholder': 'Ara...'
                            },
                            'pagination': {
                                'previous': 'Önceki',
                                'next': 'Sonraki',
                                'showing': 'Gösteriliyor',
                                'results': 'sonuç'
                            },
                            'sort': {
                                'asc': 'Artan',
                                'desc': 'Azalan'
                            },
                            'info': 'Gösteriliyor _START_ - _END_ arası _TOTAL_ sonuç',
                            'noRecords': 'Kayıt bulunamadı',
                            'loading': 'Yükleniyor...'
                        }
                    }).render(document.getElementById("table-gridjs"));

                    document.getElementById('export-btn').addEventListener('click', () => {
                        this.exportData(grid);
                    });
                }
            }

            exportData(grid) {
                const ws = XLSX.utils.json_to_sheet(grid.config.data);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
                XLSX.writeFile(wb, "data.xlsx");
            }
        }

        // Sayfa yüklendiğinde tabloyu başlat
        document.addEventListener("DOMContentLoaded", () => {
            const gridDatatable = new GridDatatable();
            gridDatatable.init();
        });
    </script>
@endsection
