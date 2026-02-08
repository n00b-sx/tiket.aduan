<?php
// Pastikan tidak diakses langsung
if (!defined('IN_SCRIPT')) {
    die();
}
?>

<style>
    /* Override warna footer bawaan HESK agar hijau tua menyatu */
    .footer, table[style*="border-top"] {
        background-color: #064e3b !important; /* Emerald 900 */
        color: #d1fae5 !important; /* Emerald 100 */
        width: 100% !important;
        border: none !important;
        padding: 15px 0 !important;
        text-align: center !important;
        font-size: 11px !important;
    }
    .footer a {
        color: #34d399 !important; /* Emerald 400 */
        text-decoration: none !important;
        font-weight: bold;
    }
    
    /* Animasi Teks Berjalan */
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-marquee {
        display: inline-block;
        white-space: nowrap;
        animation: marquee 25s linear infinite;
        padding-left: 100%;
    }
    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>

<div class="w-full bg-emerald-900 text-white overflow-hidden py-3 shadow-md mb-6 relative z-10">
    <div class="animate-marquee font-medium tracking-wide text-sm md:text-base">
        📢 Selamat Datang di Portal Pelayanan Unit Pelayanan Terpadu Teknologi Informasi dan Pangkalan Data (UTIPD) IAIN Manado.
        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; 
        🕒 Jam Operasional: Senin - Jumat (08.00 - 16.00 WITA)
    </div>
</div>

<div class="max-w-xl mx-auto px-4 py-12 min-h-[50vh]">

    <div class="mb-6">
        <?php hesk_handle_messages(); ?>
    </div>

    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 rounded-full mb-4 shadow-sm">
            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Cek Status Tiket</h1>
        <p class="text-gray-500 mt-2 text-sm">Pantau progres laporan akademik Anda secara realtime.</p>
    </div>

    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden relative z-20">
        <div class="p-8">
            <form action="ticket.php" method="get" name="form1" id="form1" class="space-y-6">
                
                <div>
                    <label for="track" class="block text-sm font-bold text-gray-700 mb-2">Nomor Tiket (Tracking ID)</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-400 font-bold">#</span>
                        </div>
                        <input type="text" name="track" id="track" value="<?php echo htmlspecialchars($trackingID); ?>" 
                               class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-8 py-3 sm:text-sm border border-gray-300 rounded-xl bg-gray-50 placeholder-gray-400 transition-colors" 
                               placeholder="Contoh: ABC-123-XYZZ" required>
                    </div>
                </div>

                <?php if ($hesk_settings['email_view_ticket']): ?>
                <div>
                    <label for="e" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input type="email" name="e" id="e" value="<?php echo htmlspecialchars($email); ?>" 
                               class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 py-3 sm:text-sm border border-gray-300 rounded-xl bg-gray-50 placeholder-gray-400 transition-colors" 
                               placeholder="Email saat melapor">
                    </div>
                </div>
                
                <div class="flex items-center">
                    <input id="r" name="r" type="checkbox" value="Y" <?php if ($remember_email) {echo 'checked';} ?> 
                           class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded cursor-pointer">
                    <label for="r" class="ml-2 block text-sm text-gray-500 cursor-pointer">
                        Ingat alamat email saya
                    </label>
                </div>
                <?php endif; ?>

                <div>
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all transform hover:-translate-y-1">
                        LIHAT STATUS
                    </button>
                </div>

                <div class="text-center pt-2">
                    <a href="index.php?a=forgot_tid" class="text-sm text-emerald-600 hover:text-emerald-800 font-medium underline">
                        Lupa nomor tiket Anda?
                    </a>
                </div>

            </form>
        </div>
        
        <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-500">
                Belum punya tiket? <a href="index.php?a=add" class="text-emerald-700 font-bold hover:underline">Buat Aduan Baru</a>
            </p>
        </div>
    </div>
    
    <div class="text-center mt-8 mb-4">
         <a href="index.php" class="inline-flex items-center text-gray-500 hover:text-emerald-600 transition-colors text-sm font-medium">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>
    </div>

</div>

<div class="bg-white border-t border-gray-200 py-12 mt-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="bg-emerald-700 text-white font-bold p-2 rounded-lg">UT</div>
                    <span class="text-xl font-bold text-gray-800">UTIPD Helpdesk</span>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Sistem layanan pengaduan terpadu untuk civitas akademika IAIN Manado.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 mb-4 uppercase text-xs tracking-wider">Hubungi Kami</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li class="flex items-start">
                         <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Jl. Dr. S.H. Sarundajang, Manado</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>otipd@iain-manado.ac.id</span>
                    </li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 mb-4 uppercase text-xs tracking-wider">Tautan</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="https://iain-manado.ac.id" class="text-emerald-600 hover:underline">Website IAIN</a></li>
                    <li><a href="https://siakad.iain-manado.ac.id" class="text-emerald-600 hover:underline">SIAKAD</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</main>

<script>
// Auto focus pada input pertama saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    var trackInput = document.getElementById('track');
    if(trackInput) { trackInput.focus(); }
});
</script>