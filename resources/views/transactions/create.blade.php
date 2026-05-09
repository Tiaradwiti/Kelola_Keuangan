<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-[#eefaf1] text-slate-800">
    <div class="mx-auto max-w-5xl px-4 py-8" x-data="expenseForm()">
        <div class="mb-6 rounded-[32px] bg-white p-6 shadow-sm ring-1 ring-emerald-100">
            <a
                href="{{ route('dashboard') }}"
                class="mb-5 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-800 shadow-sm transition hover:border-emerald-300 hover:bg-emerald-100"
            >
                <span aria-hidden="true">←</span>
                <span>Kembali ke Dashboard</span>
            </a>
            <h1 class="text-3xl font-bold text-emerald-900">Tambah Pengeluaran</h1>
            <p class="mt-2 text-lg text-emerald-600">Alokasikan dana ke kebutuhan yang tepat.</p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <ul class="space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div x-show="clientError" x-transition class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 text-amber-800" x-text="clientError"></div>

        <form
            action="{{ \Illuminate\Support\Facades\Route::has('transactions.store') ? route('transactions.store') : '#' }}"
            method="POST"
            @submit.prevent="submitForm"
        >
            @csrf

            <input type="hidden" name="account_id" :value="selectedAccount">
            <input type="hidden" name="need_level" :value="selectedNeedLevel">
            <input type="hidden" name="category" :value="finalCategory">
            <input type="hidden" name="amount" :value="amountValue">
            <input type="hidden" name="note" :value="note">

            <div class="mb-6 rounded-[32px] bg-white p-6 shadow-sm ring-1 ring-emerald-100">
                <h2 class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-emerald-700">
                    Pakai Dana Dari Mana?
                </h2>

                <div class="grid gap-4 md:grid-cols-3">
                    <template x-for="account in accounts" :key="account.id">
                        <button
                            type="button"
                            @click="selectedAccount = account.id"
                            :class="selectedAccount === account.id
                                ? 'border-emerald-500 bg-emerald-50 text-emerald-900'
                                : 'border-emerald-100 bg-white text-emerald-800'"
                            class="rounded-3xl border-2 px-5 py-5 text-lg font-semibold transition"
                        >
                            <span x-text="account.name"></span>
                        </button>
                    </template>
                </div>
            </div>

            <div class="mb-6 rounded-[32px] bg-white p-6 shadow-sm ring-1 ring-emerald-100">
                <h2 class="mb-4 text-center text-sm font-bold uppercase tracking-[0.2em] text-emerald-700">
                    Tingkat Kebutuhan
                </h2>

                <div class="grid gap-4 md:grid-cols-3">
                    <template x-for="level in needLevels" :key="level.value">
                        <button
                            type="button"
                            @click="selectedNeedLevel = level.value"
                            :class="selectedNeedLevel === level.value ? level.activeClass : level.baseClass"
                            class="rounded-3xl px-5 py-5 text-base font-bold transition"
                        >
                            <span x-text="level.label"></span>
                        </button>
                    </template>
                </div>

                <div class="mt-5 rounded-2xl bg-emerald-50 p-4 text-sm leading-6 text-slate-700">
                    <p class="font-semibold text-emerald-800">Panduan sederhana:</p>
                    <ul class="mt-2 space-y-2">
                        <li><span class="font-semibold text-emerald-700">Primer</span>: kebutuhan wajib sehari-hari. Contoh: makan, listrik, air, obat, transport kerja.</li>
                        <li><span class="font-semibold text-blue-700">Sekunder</span>: kebutuhan pendukung yang berguna tapi masih bisa ditunda. Contoh: nongkrong, baju baru, hiburan.</li>
                        <li><span class="font-semibold text-violet-700">Tersier</span>: kebutuhan keinginan atau gaya hidup. Contoh: liburan mewah, gadget baru, koleksi.</li>
                    </ul>
                </div>
            </div>

            <div class="rounded-[32px] bg-white p-6 shadow-sm ring-1 ring-emerald-100">
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-bold text-emerald-700">Kategori</label>

                        <div class="flex flex-wrap gap-2">
                            <template x-for="category in categories" :key="category.value">
                                <button
                                    type="button"
                                    @click="selectCategory(category.value)"
                                    :class="selectedCategory === category.value
                                        ? 'border-emerald-600 bg-emerald-600 text-white'
                                        : 'border-emerald-100 bg-emerald-50 text-emerald-800'"
                                    class="rounded-full border px-4 py-2 text-sm font-medium transition"
                                >
                                    <span x-text="category.label"></span>
                                </button>
                            </template>
                        </div>

                        <div x-show="selectedCategory === 'lainnya'" x-transition class="mt-3">
                            <input
                                type="text"
                                x-model="customCategory"
                                placeholder="Tulis kategori sendiri, misalnya: servis motor"
                                class="w-full rounded-2xl border border-emerald-200 bg-white px-4 py-4 text-base text-slate-800 outline-none focus:border-emerald-400"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold text-emerald-700">Nominal</label>

                        <div class="mb-3 flex flex-wrap gap-2">
                            <template x-for="amount in quickAmounts" :key="amount">
                                <button
                                    type="button"
                                    @click="setAmount(amount)"
                                    :class="amountValue === amount
                                        ? 'border-emerald-600 bg-emerald-600 text-white'
                                        : 'border-emerald-200 bg-emerald-50 text-emerald-800'"
                                    class="rounded-full border px-4 py-2 text-sm font-semibold transition hover:bg-emerald-100"
                                >
                                    <span x-text="formatRupiah(amount)"></span>
                                </button>
                            </template>
                        </div>

                        <div class="flex items-center rounded-2xl border-2 border-emerald-400 bg-white px-4">
                            <span class="mr-3 text-2xl font-bold text-emerald-900">Rp</span>
                            <input
                                type="text"
                                x-model="amountDisplay"
                                @input="handleAmountInput($event)"
                                placeholder="0"
                                class="w-full border-none bg-transparent py-4 text-2xl font-semibold text-slate-900 outline-none"
                            >
                        </div>

                        <p class="mt-2 text-sm text-slate-500">
                            Pilih nominal cepat di atas atau ketik sendiri.
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="mb-2 block text-sm font-bold text-emerald-700">Catatan</label>
                    <textarea
                        x-model="note"
                        rows="4"
                        placeholder="Misal: beli sate depan komplek"
                        class="w-full rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-4 text-base text-slate-800 outline-none focus:border-emerald-400"
                    ></textarea>
                </div>

                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full rounded-[32px] bg-emerald-900 px-6 py-5 text-2xl font-bold text-white transition hover:bg-emerald-800"
                    >
                        Simpan Pengeluaran
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function expenseForm() {
            return {
                selectedAccount: '1',
                selectedNeedLevel: 'primer',
                selectedCategory: 'makan',
                customCategory: '',
                note: '',
                amountValue: 0,
                amountDisplay: '',
                finalCategory: 'makan',
                clientError: '',

                accounts: [
                    { id: '1', name: 'Cash Dompet' },
                    { id: '2', name: 'Rekening BCA' },
                    { id: '3', name: 'Dana' },
                ],

                needLevels: [
                    { value: 'primer', label: 'PRIMER', baseClass: 'bg-emerald-100 text-emerald-800', activeClass: 'bg-emerald-500 text-white shadow-sm' },
                    { value: 'sekunder', label: 'SEKUNDER', baseClass: 'bg-blue-100 text-blue-800', activeClass: 'bg-blue-500 text-white shadow-sm' },
                    { value: 'tersier', label: 'TERSIER', baseClass: 'bg-violet-100 text-violet-800', activeClass: 'bg-violet-500 text-white shadow-sm' },
                ],

                categories: [
                    { value: 'makan', label: 'Makan' },
                    { value: 'minum', label: 'Minum' },
                    { value: 'transport', label: 'Transport' },
                    { value: 'belanja_bulanan', label: 'Belanja Bulanan' },
                    { value: 'tagihan_listrik', label: 'Tagihan Listrik' },
                    { value: 'air', label: 'Air' },
                    { value: 'internet', label: 'Internet' },
                    { value: 'pulsa', label: 'Pulsa' },
                    { value: 'kesehatan', label: 'Kesehatan' },
                    { value: 'pendidikan', label: 'Pendidikan' },
                    { value: 'hiburan', label: 'Hiburan' },
                    { value: 'nongkrong', label: 'Nongkrong' },
                    { value: 'perawatan', label: 'Perawatan' },
                    { value: 'keluarga', label: 'Keluarga' },
                    { value: 'sedekah', label: 'Sedekah' },
                    { value: 'lainnya', label: 'Lainnya' },
                ],

                quickAmounts: [10000, 20000, 50000, 100000, 200000, 500000, 1000000],
                hasStoreRoute: @json(\Illuminate\Support\Facades\Route::has('transactions.store')),

                selectCategory(value) {
                    this.selectedCategory = value;
                    this.clientError = '';
                    if (value !== 'lainnya') {
                        this.customCategory = '';
                        this.finalCategory = value;
                    }
                },

                setAmount(amount) {
                    this.amountValue = amount;
                    this.amountDisplay = this.formatNumber(amount);
                    this.clientError = '';
                },

                handleAmountInput(event) {
                    const raw = event.target.value.replace(/\D/g, '');
                    this.amountValue = raw ? parseInt(raw, 10) : 0;
                    this.amountDisplay = raw ? this.formatNumber(raw) : '';
                    this.clientError = '';
                },

                formatNumber(value) {
                    return new Intl.NumberFormat('id-ID').format(value);
                },

                formatRupiah(value) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                },

                submitForm(event) {
                    if (!this.hasStoreRoute) {
                        this.clientError = 'Route penyimpanan transaksi belum dibuat, jadi data belum bisa disimpan.';
                        return;
                    }

                    this.finalCategory = this.selectedCategory === 'lainnya'
                        ? this.customCategory.trim()
                        : this.selectedCategory;

                    if (!this.finalCategory) {
                        this.clientError = 'Kategori lainnya belum diisi.';
                        return;
                    }

                    if (!this.amountValue || this.amountValue < 1) {
                        this.clientError = 'Nominal pengeluaran wajib diisi.';
                        return;
                    }

                    this.clientError = '';
                    event.target.submit();
                }
            }
        }
    </script>
</body>
</html>
