@extends('layouts.vertical', ['title' => 'Kullanıcı Ekle', 'sub_title' => 'Admin', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Grid.js ve teması için CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css">
    <style>
        .swal2-confirm {
            /* Yes, delete it! butonunun stilleri */
            background-color: #0d6efd !important;
            /* Tailwind'in bg-primary sınıfı */
            color: #fff !important;
            /* Tailwind'in text-white sınıfı */
            border-radius: .375rem !important;
            /* Tailwind'in rounded sınıfı */
            padding: .5rem 1rem !important;
            /* Tailwind'in py-2 px-4 sınıfı */
            margin-right: .5rem !important;
            /* Butonlar arasındaki boşluk */
        }

        .swal2-cancel {
            /* No, cancel! butonunun stilleri */
            background-color: #dc3545 !important;
            /* Tailwind'in bg-danger sınıfı */
            color: #fff !important;
            /* Tailwind'in text-white sınıfı */
            border-radius: .375rem !important;
            /* Tailwind'in rounded sınıfı */
            padding: .5rem 1rem !important;
            /* Tailwind'in py-2 px-4 sınıfı */
        }
    </style>
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
                <strong class="font-bold">Hata:</strong>
                <span class="block sm:inline">
                    {{ $error }}
                </span>
            </div>
        @endforeach
    @endif
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2" role="alert">
            <strong class="font-bold">Kaydedildi:</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex flex-col gap-6">
        <div class="flex space-x-2 w-full sm:w-auto">
            <button id="add" class="btn border-success text-success hover:bg-success hover:text-white"
                href="{{ route('pagination.suIzleme.store') }}" data-fc-target="default-modal" data-fc-behavior="static"
                data-fc-type="modal" type="button">Ekle</button>
        </div>



        <div class="card">
            <div class="card-header">
                <div class="flex flex-col space-y-4">

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        İsim</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Mail</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Yetki</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                        İşlemler</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $user->roles->pluck('name')->join(', ') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="flex items-center justify-end space-x-1">
                                                <button type="button" class="me-0.5"
                                                    data-fc-target="#edit-modal-{{ $user->id }}"
                                                    data-fc-behavior="static" data-fc-type="modal">
                                                    <i class="mgc_edit_line text-lg"></i>
                                                </button>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    data-confirm-delete>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="ms-0.5"
                                                        id="sweetalert-params-{{ $user->id }}">
                                                        <i class="mgc_delete_line text-xl"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('pagination.admin.edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- modall kısmı --}}

    <div id="default-modal" class="w-full h-full mt-5 fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden">
        <div
            class="fc-modal-open:opacity-100 duration-500 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                    Kullanıcı Ekle
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="px-4 py-8 overflow-y-auto">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">İsim:</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:bg-slate-700 dark:text-gray-200">
                    </div>

                    <div class="mb-4">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Mail:</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:bg-slate-700 dark:text-gray-200">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Şifre:</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Şifre
                            Onaylama:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="role"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Yetki:</label>
                        <select name="role" id="role" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                        <button
                            class="btn dark:text-gray-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                            data-fc-dismiss type="button">Kapat</button>
                        <button type="submit" class="btn bg-primary text-white">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 CDN -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteForms = document.querySelectorAll('form[data-confirm-delete]');

            deleteForms.forEach(function(form) {
                const button = form.querySelector('button[type="button"]');
                button.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Bu kullanıcıyı silmek istediğinizden emin misiniz?',
                        text: "Bu işlemi geri alamazsınız!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Evet, silinsin!',
                        cancelButtonText: 'Hayır, iptal!',
                        confirmButtonClass: 'btn bg-primary text-white w-xs me-2 mt-2',
                        cancelButtonClass: 'btn bg-danger text-white w-xs mt-2',
                        buttonsStyling: false,
                        showCloseButton: false
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
