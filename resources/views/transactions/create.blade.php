<x-app-layout>
    <div class="min-h-screen bg-[#F0FDF4] pb-12">
        <div class="max-w-4xl mx-auto pt-8 px-6">
            
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('dashboard') }}" class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-[#245437] shadow-sm hover:bg-emerald-50 transition-all">
                    ←
                </a>
                <div>
                    <h2 class="font-display text-2xl text-[#245437]">Catat Pengeluaran</h2>
                    <p class="text-emerald-600 text-sm">Pilih kategori dan masukkan nominal jajanmu.</p>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-emerald-50 mb-8">
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-emerald-700 mb-4 text-center">Pilih Petak Kebutuhan</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label class="cursor-pointer group">
                                <input type="radio" name="category" value="makan" class="hidden peer" required>
                                <div class="p-4 rounded-3xl border-2 border-emerald-50 bg-emerald-50/30 text-center peer-checked:border-[#4fa35f] peer-checked:bg-emerald-50 transition-all group-hover:scale-105">
                                    <span class="text-3xl block mb-2">🍱</span>
                                    <span class="text-xs font-bold text-[#245437]">Makan</span>
                                </div>
                            </label>
                            
                            <label class="cursor-pointer group">
                                <input type="radio" name="category" value="transport" class="hidden peer">
                                <div class="p-4 rounded-3xl border-2 border-emerald-50 bg-emerald-50/30 text-center peer-checked:border-[#4fa35f] peer-checked:bg-emerald-50 transition-all group-hover:scale-105">
                                    <span class="text-3xl block mb-2">🚗</span>
                                    <span class="text-xs font-bold text-[#245437]">Transport</span>
                                </div>
                            </label>

                            <label class="cursor-pointer group">
                                <input type="radio" name="category" value="hiburan" class="hidden peer">
                                <div class="p-4 rounded-3xl border-2 border-emerald-50 bg-emerald-50/30 text-center peer-checked:border-[#4fa35f] peer-checked:bg-emerald-50 transition-all group-hover:scale-105">
                                    <span class="text-3xl block mb-2">🍿</span>
                                    <span class="text-xs font-bold text-[#245437]">Hiburan</span>
                                </div>
                            </label>

                            <label class="cursor-pointer group">
                                <input type="radio" name="category" value="lainnya" class="hidden peer">
                                <div class="p-4 rounded-3xl border-2 border-emerald-50 bg-emerald-50/30 text-center peer-checked:border-[#4fa35f] peer-checked:bg-emerald-50 transition-all group-hover:scale-105">
                                    <span class="text-3xl block mb-2">🎁</span>
                                    <span class="text-xs font-bold text-[#245437]">Lainnya</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-emerald-700 ml-2 mb-2">Nominal Pengeluaran</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 font-bold text-[#245437]">Rp</span>
                            <input type="number" name="amount" class="w-full pl-12 pr-6 py-4 rounded-2xl border-emerald-100 bg-emerald-50/30 focus:ring-[#4fa35f] focus:border-[#4fa35f] font-bold text-lg" placeholder="0">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 bg-[#245437] text-white rounded-2xl font-bold text-lg shadow-lg shadow-emerald-900/20 hover:bg-[#1a3d28] transition-all">
                        Simpan Pengeluaran 🌱
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-emerald-50">
                <h3 class="font-display text-xl text-[#245437] mb-6">Riwayat Pengeluaran Hari Ini</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-600/50 border-b border-emerald-50">
                                <th class="pb-4">Kategori</th>
                                <th class="pb-4">Nominal</th>
                                <th class="pb-4 text-right">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-emerald-50/50">
                                <td class="py-4 flex items-center gap-2">
                                    <span class="text-lg">🍱</span>
                                    <span class="font-bold text-[#245437]">Makan Siang</span>
                                </td>
                                <td class="py-4 font-bold text-red-400">Rp 25.000</td>
                                <td class="py-4 text-right text-emerald-600/60">12:30</td>
                            </tr>
                            <tr>
                                <td class="py-4 flex items-center gap-2">
                                    <span class="text-lg">🚗</span>
                                    <span class="font-bold text-[#245437]">Grab/Gojek</span>
                                </td>
                                <td class="py-4 font-bold text-red-400">Rp 15.000</td>
                                <td class="py-4 text-right text-emerald-600/60">08:15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>