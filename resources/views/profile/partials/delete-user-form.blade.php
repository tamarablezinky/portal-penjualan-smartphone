<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-pink-800">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-pink-600">
            {{ __('Setelah akun Anda dihapus, semua data dan sumber daya terkait akan dihapus secara permanen. Sebelum menghapus akun, silakan unduh data atau informasi yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-pink-700 hover:bg-pink-900 focus:ring-pink-500">
        {{ __('Hapus Akun') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-pink-800">
                {{ __('Apakah Anda yakin ingin menghapus akun ini?') }}
            </h2>

            <p class="mt-1 text-sm text-pink-600">
                {{ __('Setelah akun Anda dihapus, semua data dan sumber daya terkait akan dihapus secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi penghapusan akun.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Kata Sandi') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-3/4 border-pink-300 focus:border-pink-500 focus:ring-pink-500 rounded-md shadow-sm"
                    placeholder="{{ __('Kata Sandi') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-pink-600" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')"
                    class="border-pink-300 text-pink-700 hover:bg-pink-100 focus:ring-pink-500">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 bg-pink-700 hover:bg-pink-900 focus:ring-pink-500">
                    {{ __('Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
