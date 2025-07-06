<x-guest-layout>
    <div class="mb-4 text-sm text-pink-800">
        {{ __('Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan ke email Anda. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan ulang.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Tautan verifikasi baru telah dikirimkan ke alamat email yang Anda daftarkan.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-pink-700 hover:text-pink-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
