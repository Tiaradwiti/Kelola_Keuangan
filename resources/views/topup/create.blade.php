<x-app-layout>

    <div class="min-h-screen bg-[#F0FDF4] py-10">

        <div class="max-w-2xl mx-auto px-6">

            <div class="bg-white rounded-[2rem] shadow-xl p-8 border border-emerald-100">

                <h1 class="text-3xl font-bold text-[#245437] mb-2">
                    Top Up Saldo 💰
                </h1>

                <p class="text-emerald-600 mb-8">
                    Tambahkan saldo ke akun finansialmu.
                </p>

                <form action="{{ route('topup.store') }}" method="POST">
                    @csrf

                    <!-- PILIH AKUN -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-[#245437] mb-2">
                            Pilih Akun
                        </label>

                        <select name="account_id"
                                class="w-full rounded-2xl border-emerald-200 focus:border-emerald-500 focus:ring-emerald-500">

                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">
                                    {{ $account->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- NOMINAL -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-[#245437] mb-2">
                            Nominal Top Up
                        </label>

                        <input type="number"
                               name="amount"
                               placeholder="Masukkan nominal"
                               class="w-full rounded-2xl border-emerald-200 focus:border-emerald-500 focus:ring-emerald-500 p-3">
                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="w-full py-4 bg-[#245437] hover:bg-[#1a3d28] transition-all rounded-2xl text-white font-bold shadow-lg shadow-emerald-900/20">

                        + Tambah Saldo

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>