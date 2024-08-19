@extends('layouts.vertical', ['title' => 'Su İzleme', 'sub_title' => 'Genel', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')

    <!-- Grid.js ve teması için CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css">
@endsection

@section('content')
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0 sm:space-x-4">
                    <div class="flex space-x-2 w-full sm:w-auto">
                        <a id="add" class="btn btn-green text-white bg-green-600 hover:bg-green-700 w-full sm:w-auto text-center"
                           href="{{ route('pagination.suIzleme.store') }}">Ekle</a>
                        <button id="company" class="btn btn-blue text-white bg-blue-500 hover:bg-blue-600 w-full sm:w-auto text-center">
                            Müşteri Ekle / Listele
                        </button>
                    </div>
                    <div class="flex space-x-2 w-full sm:w-auto">
                        <button id="export-btn" class="btn btn-light text-gray-800 bg-gray-200 hover:bg-gray-300 w-full sm:w-auto text-center">
                            Dışa Aktar
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <p class="text-sm text-slate-700 dark:text-slate-400 mb-4">The most basic list group is an unordered list with list items and the proper classes. Build upon it with the options that follow, or with your own CSS as needed.</p>

                <div id="table-gridjs"></div>
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
    // Blade'den gelen veriyi JavaScript değişkenine atama
    const tableData = @json($data);

    class GridDatatable {
        init() {
            this.basicTableInit();
        }

        basicTableInit() {
            if (document.getElementById("table-gridjs")) {
                const grid = new gridjs.Grid({
                    columns: [{
                        name: 'Sıra',
                        formatter: (function (cell) {
                            return gridjs.html('<span class="fw-semibold">' + cell + '</span>');
                        })
                    },
                        "Firma",
                    {
                        name: 'Su',
                        formatter: (function (cell) {
                            return gridjs.html(cell);
                        })
                    },

                    {
                        name: 'İşlemler',
                        width: '120px',
                        formatter: (function (cell) {
                            return gridjs.html("<a href='#' class='text-reset text-decoration-underline'>" + "Details" + "</a>");
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
