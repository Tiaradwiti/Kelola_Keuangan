<x-app-layout>
    <div class="min-h-screen bg-[#F0FDF4] py-10">

        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            <!-- HEADER -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-[#245437]">
                        Riwayat Transaksi
                    </h1>

                    <p class="text-emerald-600 mt-1">
                        Semua catatan pengeluaran kamu 🌿
                    </p>
                </div>

                <a href="{{ route('dashboard') }}"
                   class="px-5 py-3 bg-white border border-emerald-200 text-[#245437] rounded-2xl font-semibold shadow-sm hover:bg-emerald-50 transition">
                    ← Kembali
                </a>

            </div>

            <!-- CARD -->
            <div class="bg-white rounded-[2rem] shadow-[0_10px_30px_rgba(36,84,55,0.05)] overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-emerald-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-bold text-emerald-700">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-bold text-emerald-700">
                                    Nama Transaksi
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-bold text-emerald-700">
                                    Jumlah
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-bold text-emerald-700">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-center text-sm font-bold text-emerald-700">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($transactions as $transaction)

                                <tr class="border-b border-emerald-100 hover:bg-emerald-50 transition">

                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4 font-semibold text-[#245437]">
                                        {{ $transaction->description }}
                                    </td>

                                    <td class="px-6 py-4 text-red-500 font-bold">
                                        Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $transaction->transaction_date->format('d M Y H:i') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-2">

                                            <!-- BUTTON DELETE -->
                                            <button
                                                type="button"
                                                onclick="openDeleteModal('{{ route('transactions.destroy', $transaction->id) }}')"
                                                class="px-4 py-2 bg-red-100 text-red-600 rounded-xl text-sm font-semibold hover:bg-red-200 transition">

                                                Hapus

                                            </button>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5"
                                        class="text-center py-10 text-emerald-500 font-medium">

                                        Belum ada transaksi 🌱

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <!-- POPUP DELETE -->
    <div id="deleteModal"
         class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white rounded-3xl p-8 w-[90%] max-w-md shadow-2xl">

            <div class="text-center">

                <div class="text-5xl mb-4">
                    🗑️
                </div>

                <h2 class="text-2xl font-bold text-[#245437] mb-2">
                    Hapus Transaksi?
                </h2>

                <p class="text-gray-500 mb-6">
                    Data transaksi yang dihapus tidak bisa dikembalikan.
                </p>

                <div class="flex justify-center gap-3">

                    <!-- BUTTON BATAL -->
                    <button onclick="closeDeleteModal()"
                            class="px-5 py-3 rounded-2xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition">

                        Batal

                    </button>

                    <!-- FORM DELETE -->
                    <form id="deleteForm" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="px-5 py-3 rounded-2xl bg-red-500 text-white font-semibold hover:bg-red-600 transition">

                            Ya, Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>
        function openDeleteModal(action) {

            document.getElementById('deleteModal').classList.remove('hidden');

            document.getElementById('deleteModal').classList.add('flex');

            document.getElementById('deleteForm').action = action;
        }

        function closeDeleteModal() {

            document.getElementById('deleteModal').classList.add('hidden');

            document.getElementById('deleteModal').classList.remove('flex');
        }
    </script>

</x-app-layout>