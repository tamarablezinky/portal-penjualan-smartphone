<x-app-layout>
    @if ($errors->has('produk_id'))
        <script>
            alert("{{ $errors->first('produk_id') }}");
        </script>
    @endif
    <x-slot name="header">
        <h2 class="text-xl font-bold text-pink-800 text-center">Edit Data Penjualan</h2>
    </x-slot>

    <div class="p-6 max-w-xl mx-auto bg-white rounded shadow mt-4">
        <form action="{{ route('penjualans.update', $penjualan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Produk --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700">Produk</label>
                <select name="produk_id"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" {{ $penjualan->produk_id == $produk->id ? 'selected' : '' }}>
                            {{ $produk->merek }} - {{ $produk->tipe }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Waktu --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700">Tanggal</label>
                <select name="waktu_id"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200">
                    @foreach ($waktus as $waktu)
                        <option value="{{ $waktu->id }}" {{ $penjualan->waktu_id == $waktu->id ? 'selected' : '' }}>
                            {{ $waktu->tanggal }} ({{ $waktu->bulan }} {{ $waktu->tahun }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Toko --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700">Toko</label>
                <select name="toko_id"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200">
                    @foreach ($tokos as $toko)
                        <option value="{{ $toko->id }}" {{ $penjualan->toko_id == $toko->id ? 'selected' : '' }}>
                            {{ $toko->nama_toko }} - {{ $toko->kota }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Jumlah --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700">Jumlah Terjual</label>
                <input type="number" name="jumlah_terjual" value="{{ $penjualan->jumlah_terjual }}"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200" />
            </div>

            {{-- Pendapatan --}}
            <div class="mb-4">
                <label class="block font-semibold text-pink-700">Total Pendapatan</label>
                <input type="number" name="total_pendapatan" value="{{ $penjualan->total_pendapatan }}"
                    class="w-full border border-pink-300 rounded p-2 focus:border-pink-600 focus:ring focus:ring-pink-200" />
            </div>

            <button type="submit"
                class="bg-pink-800 text-white px-4 py-2 rounded hover:bg-pink-900 transition duration-150">Perbarui</button>
        </form>
    </div>
</x-app-layout>
