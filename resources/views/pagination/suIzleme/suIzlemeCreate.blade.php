@extends('layouts.vertical', ['title' => 'Su İzleme', 'sub_title' => 'Genel', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')

    <!-- Grid.js ve teması için CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css">
@endsection

@section('content')
<div class="flex flex-col gap-6">
    <div class="card">

        <div class="p-6 rounded-lg shadow-md">
            @if ($errors->any())
            <div class="alert alert-danger mb-2.5">
                <ul>
                    @foreach ($errors->all() as $error)
                    <div class="bg-danger/25 text-danger text-sm rounded-md p-4 mb-2.5" role="alert"> <!-- Her hata mesajı arasında boşluk -->
                        <span class="font-bold">Hata: </span> {{ $error }}
                    </div>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Form Başlıkları -->
            <form method="POST" action="{{ route('pagination.suIzleme.create') }}" enctype="multipart/form-data">
                @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Firma/Proje:</label>
                    <select id="company_id" name="company_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">

                        @foreach ($company as $item)
                        <option value="{{ $item->id }}">{{ $item->companyName }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Firma Mühendisi:</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="company_person" name="company_person">
                </div>
            </div>

            <!-- Koordinatlar ve Diğer Alanlar -->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Numune Alan:</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="user_id" name="user_id" value="{{ $user->name }}" readonly>

                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Alınış Amacı:</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="purpose" name="purpose">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Koordinat:</label>
                    <div class="flex space-x-2 mt-1">
                        <input id="coord_x" name="coord_x" type="text" placeholder="X" class="w-1/2 border border-gray-300 rounded-md shadow-sm" readonly>
                        <input id="coord_y" name="coord_y" type="text" placeholder="Y" class="w-1/2 border border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Numune No:</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="specimen" name="specimen">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Türü / Tipi:</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="type" name="type">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Hava Durumu:</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="weather" name="weather">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Hava Sıcaklığı(°C):</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="temp" name="temp">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Kapsam:</label>
                    <div class="flex mt-1 space-x-4">
                        <label><input type="radio" name="extent" value="Yer Üstü" class="form-radio text-success"> Yer Üstü</label>
                        <label><input type="radio" name="extent" value="Yer Altı" class="form-radio text-success"> Yer Altı</label>
                        <label><input type="radio" name="extent" value="İçme" class="form-radio text-success">İçme</label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Alınış Şekli:</label>
                    <div class="flex mt-1 space-x-4">
                        <label>
                            <input type="checkbox" name="alinis_sekli[]" value="Numune" class="form-checkbox rounded-full text-success"> Numune
                        </label>
                        <label>
                            <input type="checkbox" name="alinis_sekli[]" value="Fiziksel" class="form-checkbox rounded-full text-success"> Fiziksel
                        </label>
                        <label>
                            <input type="checkbox" name="alinis_sekli[]" value="Su Seviyesi" class="form-checkbox rounded-full text-success"> Su Seviyesi
                        </label>
                        <label>
                            <input type="checkbox" name="alinis_sekli[]" value="Alınmadı" class="form-checkbox rounded-full text-success"> Alınmadı
                        </label>
                    </div>
                </div>
            </div>

            <!-- Yerüstü Suyu Alanı -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700">Su Bilgileri:</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tip:</label>
                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="tip" id="tip">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">pH:</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="ph" id="ph">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Sıcaklık(°C):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="head" id="head">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Eh(mv):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="eh" id="eh">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">EC(µS/cm):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="ec" id="ec">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">TDS(mg/l):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="tds" id="tds">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tuzluluk(‰):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="salt" id="salt">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Direnç (kΩ.cm):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="resistance" id="resistance">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Çöz. Oksijen (mg/l):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="oxygen" id="oxygen">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Oksijen Doy. (%):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="oxygenS" id="oxygenS">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Debi (l/sn):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="flow" id="flow">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Su Seviyesi (m):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="water" id="water">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Debi (Çeşme) (l/sn):</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" name="fountain" id="fountain">
                    </div>

                    <div >
                        <label class="block text-sm font-medium text-gray-700">Görsel Yükle:</label>
                        <input
                        type="file"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 cursor-pointer"
                        id="image_upload"
                        name="image_upload"
                        accept="image/*"
                    />
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700">Notlar:</label>
                <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" rows="4" name="notes" id="notes"></textarea>
            </div>
            <div class="mt-6">
                <button id="save" class="btn btn-light text-black-400 bg-blue-200 hover:bg-blue-300">Kaydet ve Görüntüle</button>
            </div>
        </div>
    </div>
</form>
</div>

@endsection

@section('script')
<script>
    document.getElementById('image-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewImage = document.getElementById('preview-image');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.src = '';
            previewImage.classList.add('hidden');
        }
    });
</script>
<script>

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }


    function showPosition(position) {

        document.getElementById("coord_x").value = position.coords.latitude;
        document.getElementById("coord_y").value = position.coords.longitude;
    }


    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("Kullanıcı konum erişimini reddetti.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Konum bilgisi alınamadı.");
                break;
            case error.TIMEOUT:
                alert("Konum alma işlemi zaman aşımına uğradı.");
                break;
            case error.UNKNOWN_ERROR:
                alert("Bilinmeyen bir hata oluştu.");
                break;
        }
    }

    // Sayfa yüklendiğinde otomatik olarak mevcut konumu al
    window.onload = getLocation;
</script>
@endsection
