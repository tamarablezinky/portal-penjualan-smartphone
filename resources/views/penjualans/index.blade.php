<x-app-layout>
    @if ($errors->has('produk_id'))
        <script>
            alert("{{ $errors->first('produk_id') }}");
        </script>
    @endif
    <x-slot name="header">
        <h2 class="text-xl font-bold text-pink-800">Data Penjualan</h2>
    </x-slot>

    <div class="p-6">
        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('penjualans.index') }}" class="mb-4 flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari produk, tipe, tanggal, toko..."
                class="px-3 py-2 border border-pink-300 rounded w-full max-w-md focus:outline-none focus:ring-2 focus:ring-pink-300" />
            <button type="submit" class="bg-pink-700 text-white px-4 py-2 rounded hover:bg-pink-900 transition">
                Cari
            </button>
        </form>

        <!-- Tombol Tambah -->
        <a href="{{ route('penjualans.create') }}"
            class="mb-4 inline-block bg-pink-700 text-white px-4 py-2 rounded hover:bg-pink-900 transition">
            Tambah Data
        </a>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="text-green-700 mb-4">{{ session('success') }}</div>
        @endif

        <!-- Tabel Data Penjualan -->
        <table class="w-full table-auto border border-pink-300 rounded">
            <thead class="bg-pink-100">
                <tr>
                    <th class="p-2 border border-pink-300">Produk</th>
                    <th class="p-2 border border-pink-300">Tanggal</th>
                    <th class="p-2 border border-pink-300">Toko</th>
                    <th class="p-2 border border-pink-300">Jumlah</th>
                    <th class="p-2 border border-pink-300">Pendapatan</th>
                    <th class="p-2 border border-pink-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualans as $p)
                    <tr class="text-center border-t border-pink-200">
                        <td class="p-2">{{ $p->produk->merek }} {{ $p->produk->tipe }}</td>
                        <td class="p-2">{{ $p->waktu->tanggal }}</td>
                        <td class="p-2">{{ $p->toko->nama_toko }}</td>
                        <td class="p-2">{{ $p->jumlah_terjual }}</td>
                        <td class="p-2">Rp{{ number_format($p->total_pendapatan) }}</td>
                        <td class="p-2">
                            <a href="{{ route('penjualans.edit', $p->id) }}"
                                class="text-pink-700 underline hover:text-pink-900 transition">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-pink-400">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
