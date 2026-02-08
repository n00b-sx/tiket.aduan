<?php
global $hesk_settings, $hesklang;

// Pastikan skrip tidak diakses secara langsung
if (!defined('IN_SCRIPT')) {
    die();
}

// 1. Memuat Custom Header
require_once(__DIR__ . '/header.php');
?>

<style>
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

    /* --- CSS OVERRIDE UNTUK FOOTER HESK ASLI --- */
    /* Kita sembunyikan border dan atur warna footer asli (lisensi) agar menyatu */
    .footer, table[style*="border-top"] {
        background-color: #064e3b !important; /* Emerald 900 */
        color: #6ee7b7 !important; /* Emerald 300 */
        width: 100% !important;
        border: none !important;
        padding: 15px 0 !important;
        text-align: center !important;
        font-size: 11px !important;
    }
    .footer a {
        color: #fff !important;
        text-decoration: underline !important;
        opacity: 0.8;
    }
</style>

<div class="w-full bg-emerald-900 text-white overflow-hidden py-3 shadow-md mb-6 relative z-10">
    <div class="animate-marquee font-medium tracking-wide text-sm md:text-base">
        📢 Selamat Datang di Portal Pelayanan Unit Pelayanan Terpadu Teknologi Informasi dan Pangkalan Data (UTIPD) IAIN Manado. Kami siap melayani kebutuhan akademik Anda. 
        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; 
        🕒 Jam Operasional: Senin - Jumat (08.00 - 16.00 WITA)
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

    <?php
    if (isset($_SESSION['HESK_MESSAGE']) && is_array($_SESSION['HESK_MESSAGE']) && count($_SESSION['HESK_MESSAGE']) > 0) {
        foreach ($_SESSION['HESK_MESSAGE'] as $msg) {
            $colorClass = 'bg-blue-100 border-blue-500 text-blue-700';
            if (strpos(strtolower($msg['type']), 'success') !== false) {
                $colorClass = 'bg-green-100 border-green-500 text-green-700';
            } elseif (strpos(strtolower($msg['type']), 'error') !== false) {
                $colorClass = 'bg-red-100 border-red-500 text-red-700';
            }
            echo '<div class="mb-6 border-l-4 p-4 rounded shadow-sm ' . $colorClass . '" role="alert"><p>' . $msg['message'] . '</p></div>';
        }
        unset($_SESSION['HESK_MESSAGE']);
    }
    ?>

    <div class="text-center py-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-emerald-900 mb-4 tracking-tight">
            Pusat Bantuan Akademik
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Unit Pelayanan Terpadu Teknologi Informasi dan Pangkalan Data<br>
            <span class="font-semibold text-emerald-600">IAIN Manado</span>
        </p>
        <div class="mt-6 w-24 h-1.5 bg-yellow-400 mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <a href="index.php?a=add" class="group relative block p-8 bg-white border border-gray-200 rounded-3xl shadow-xl hover:shadow-2xl hover:border-emerald-400 transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:bg-emerald-100 transition-colors"></div>
            <div class="relative flex flex-col items-center text-center">
                <div class="p-5 bg-emerald-600 text-white rounded-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 group-hover:text-emerald-700 transition-colors">Buat Aduan Baru</h3>
                <p class="mt-3 text-gray-500 text-sm">Laporkan kendala SIAKAD atau akun akademik Anda.</p>
            </div>
        </a>

        <a href="ticket.php" class="group relative block p-8 bg-white border border-gray-200 rounded-3xl shadow-xl hover:shadow-2xl hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-50 rounded-full group-hover:bg-blue-100 transition-colors"></div>
            <div class="relative flex flex-col items-center text-center">
                <div class="p-5 bg-blue-600 text-white rounded-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 group-hover:text-blue-700 transition-colors">Cek Status Tiket</h3>
                <p class="mt-3 text-gray-500 text-sm">Lihat balasan teknisi mengenai laporan Anda.</p>
            </div>
        </a>
    </div>

    <?php if ($hesk_settings['kb_enable']): ?>
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-8 border border-gray-200 mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Pusat Pengetahuan</h2>
        <div class="mb-8">
            <form action="knowledgebase.php" method="get" class="relative">
                <input type="text" name="search" class="w-full pl-4 pr-12 py-3 rounded-xl border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none" placeholder="Cari solusi...">
                <button type="submit" class="absolute right-4 top-3 text-emerald-600 font-bold">CARI</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

</div>

<div class="bg-white border-t border-gray-200 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div>
                <div class="flex items-center gap-2 mb-4">
                <a href="index.php" class="flex items-center gap-3 group">
                    <img src="<?php echo HESK_PATH; ?>theme/mytheme/customer/img/logo-tipd.png" 
                        alt="Logo UTIPD" 
                        class="h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    
                    <div class="flex flex-col">
                        <span class="font-bold text-xl text-emerald-900 leading-tight">Helpdesk</span>
                        <span class="text-xs text-gray-500 font-medium tracking-wide">UPT TIPD</span>
                    </div>
                </a>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Sistem layanan pengaduan terpadu untuk civitas akademika IAIN Manado. Kami berdedikasi memberikan solusi teknologi terbaik.
                </p>
            </div>

            <div>
                <h4 class="font-bold text-gray-800 mb-4 uppercase text-xs tracking-wider">Hubungi Kami</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Jl. Dr. S.H. Sarundajang Kawasan Ring Road I, Manado</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>tipd@iain-manado.ac.id</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-gray-800 mb-4 uppercase text-xs tracking-wider">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="https://tipd.iain-manado.ac.id" class="text-emerald-600 hover:text-emerald-800 transition-colors">Website TIPD IAIN Manado</a></li>
                    <li><a href="https://siska.iain-manado.ac.id/" class="text-emerald-600 hover:text-emerald-800 transition-colors">SIAKAD Terpadu</a></li>
                    <li><a href="knowledgebase.php" class="text-emerald-600 hover:text-emerald-800 transition-colors">FAQ / Panduan</a></li>
                </ul>
            </div>
            
        </div>
    </div>
</div>

</main>

<?php
// 5. FOOTER ASLI SISTEM (Wajib Ada)
// CSS di atas akan mengubah warnanya jadi hijau tua agar "seamless"
require_once(HESK_PATH . 'inc/footer.inc.php');
?>