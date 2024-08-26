@extends('layouts.vertical', ['title' => 'Profil Düzenle', 'sub_title' => 'Genel', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Kaydedildi:</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Hata:</strong>
        <ul class="mt-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class=" mx-auto bg-white p-6 rounded-lg shadow-md">

        <form method="POST" action="{{ route('pagination.user.update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Profil Resmi -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2" for="user_image">Profil Resmi</label>




                <div class="flex items-center space-x-5 mb-5">
                    <div class="relative inline-flex  mr-5">
                        @if (auth()->user()->user_image)
                            <img class="w-12 h-12 rounded-full object-cover"
                                src="{{ asset('storage/' . auth()->user()->user_image) }}" alt="Profile Picture">
                        @else
                            <div class="w-12 h-12 justify-center items-center flex bg-success/25 rounded-full">
                                <span class="text-success text-xl"></span>
                            </div>
                        @endif
                        <div class="absolute end-0 m-1 h-3 w-3 rounded-full border border-white bg-gray-400"></div>
                    </div>
                    <input type="file" id="user_image" name="user_image" class="form-input" accept="image/*">
                </div>

                <!-- Kullanıcı Adı -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="name">Kullanıcı Adı</label>
                    <input type="text" id="name" name="name" class="form-input w-full" disabled=""
                        value="{{ old('name', auth()->user()->name) }}" required>
                </div>

                <!-- E-posta -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="email">E-posta</label>
                    <input type="email" id="email" name="email" class="form-input w-full" disabled=""
                        value="{{ old('email', auth()->user()->email) }}" required>
                </div>

                <!-- Güncelle Butonu -->
                <div class="flex justify-end">
                    <button type="submit" class="btn bg-primary text-white hover:bg-primary-dark">Güncelle</button>
                </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
