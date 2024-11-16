<!-- Edit Modal -->
<div id="edit-modal-{{ $user->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 max-w-lg w-full mx-4 sm:mx-auto">
        <div class="flex justify-between items-center border-b pb-4 mb-4 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 text-left">Düzenle: {{ $user->name }}
            </h3>
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100" data-fc-dismiss
                type="button">
                <span class="material-symbols-rounded">close</span>
            </button>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 text-left">İsim:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-200 text-left">
            </div>
            <div class="mb-4">
                <label for="email"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 text-left">Mail:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-200 text-left">
            </div>
            <div class="mb-4">
                <label for="role"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 text-left">Yetki:</label>
                <select name="role" id="role"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-left">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200 text-left">Şifre
                    (Opsiyonel):</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-200 text-left">
            </div>
            <div class="mb-4">
                <label for="password_confirmation"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 text-left">Şifre Onaylama:</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-200 text-left">
            </div>
            <div class="flex justify-end gap-4">
                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md"
                    data-fc-dismiss>Kapat</button>
                <button type="submit" class="bg-primary text-white py-2 px-4 rounded-md">Kaydet</button>
            </div>
        </form>
    </div>
</div>
