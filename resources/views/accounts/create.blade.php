<x-app-layout>

    <div class="min-h-screen bg-[#F0FDF4] py-10">

        <div class="max-w-2xl mx-auto px-6">

            <div class="bg-white rounded-[2.5rem] shadow-xl p-8 border border-emerald-100">

                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-[#245437]">
                        Buat Akun Baru 🌻
                    </h1>

                    <p class="text-emerald-600 mt-2">
                        Tambahkan dompet atau rekening baru untuk mengatur keuanganmu.
                    </p>
                </div>

                <form action="{{ route('accounts.store') }}" method="POST">

                    @csrf

                    <!-- NAMA AKUN -->
                    <div class="mb-6">

                        <label class="block text-sm font-bold text-[#245437] mb-2">
                            Nama Akun
                        </label>

                        <input type="text"
                               name="name"
                               placeholder="Contoh: Dompet Utama"
                               class="w-full rounded-2xl border-emerald-200 focus:border-emerald-500 focus:ring-emerald-500 p-4">

                    </div>
<!-- TYPE AKUN -->
<div class="mb-6">

    <label class="block text-sm font-bold text-[#245437] mb-2">
        Type Akun
    </label>

    <select name="account_type_id"
            class="w-full rounded-2xl border-emerald-200 focus:border-emerald-500 focus:ring-emerald-500 p-4">

        @foreach($accountTypes as $type)

            <option value="{{ $type->id }}">
                {{ $type->name }}
            </option>

        @endforeach

    </select>

</div>
                    <!-- SALDO AWAL -->
                    <div class="mb-6">

                        <label class="block text-sm font-bold text-[#245437] mb-2">
                            Saldo Awal
                        </label>

                        <input type="number"
                               name="initial_balance"
                               placeholder="Masukkan saldo awal"
                               class="w-full rounded-2xl border-emerald-200 focus:border-emerald-500 focus:ring-emerald-500 p-4">

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="w-full py-4 bg-[#245437] hover:bg-[#1a3d28] transition-all rounded-2xl text-white font-bold shadow-lg shadow-emerald-900/20">

                        + Simpan Akun

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>