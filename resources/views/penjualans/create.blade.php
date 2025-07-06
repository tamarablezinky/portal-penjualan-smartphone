<x-app-layout>
    @if ($errors->has('produk_id'))
        <script>
            alert("{{ $errors->first('produk_id') }}");
        </script>
    @endif
    <x-slot name="header">
        <h2 class="text-xl font-bold text-pink-800 text-center">Input Data Penjualan</h2> {{-- mb-8 untuk jarak lebih besar --}}
    </x-slot>

    <div class="p-6 max-w-xl mx-auto bg-white rounded shadow mt-4"> {{-- mt-4 supaya form turun sedikit --}}
        <form action="{{ route('penjualans.store') }}" method="POST">
            @csrf

            {{-- Produk --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700 mb-1">Produk</label>
                <select name="produk_id"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->merek }} - {{ $produk->tipe }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Waktu --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700 mb-1">Tanggal</label>
                <select name="waktu_id"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200">
                    @foreach ($waktus as $waktu)
                        <option value="{{ $waktu->id }}">{{ $waktu->tanggal }} ({{ $waktu->bulan }}
                            {{ $waktu->tahun }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Toko --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700 mb-1">Toko</label>
                <select name="toko_id"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200">
                    @foreach ($tokos as $toko)
                        <option value="{{ $toko->id }}">{{ $toko->nama_toko }} - {{ $toko->kota }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Jumlah Terjual --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700 mb-1">Jumlah Terjual</label>
                <input type="number" name="jumlah_terjual" required
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200" />
            </div>

            {{-- Total Pendapatan --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700 mb-1">Total Pendapatan</label>
                <input type="number" name="total_pendapatan" required
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200" />
            </div>

            <button type="submit"
                class="bg-pink-800 text-white px-4 py-2 rounded hover:bg-pink-900 transition duration-150">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
