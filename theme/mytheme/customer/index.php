<?php
global $hesk_settings, $hesklang;

// Pastikan skrip tidak diakses secara langsung
if (!defined('IN_SCRIPT')) {
    die();
}

// Memuat Header
require_once(__DIR__ . '/header.php');

?>

<style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-marquee {
        display: inline-block;
        white-space: nowrap;
        animation: marquee 25s linear infinite;
        padding-left: 100%; /* Memulai dari kanan layar */
    }
    /* Stop animasi saat mouse diarahkan agar mudah dibaca */
    .animate-marquee:hover {
        animation-play-state: paused;
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
            // Tentukan warna berdasarkan tipe pesan (SUCCESS = Hijau, ERROR = Merah)
            $colorClass = 'bg-blue-100 border-blue-500 text-blue-700'; // Default
            if (strpos(strtolower($msg['type']), 'success') !== false) {
                $colorClass = 'bg-green-100 border-green-500 text-green-700';
            } elseif (strpos(strtolower($msg['type']), 'error') !== false) {
                $colorClass = 'bg-red-100 border-red-500 text-red-700';
            }
            
            echo '
            <div class="mb-6 border-l-4 p-4 rounded shadow-sm ' . $colorClass . '" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">Notifikasi</p>
                        <p class="text-sm">' . $msg['message'] . '</p>
                    </div>
                </div>
            </div>';
        }
        // Hapus pesan setelah ditampilkan agar tidak muncul terus
        unset($_SESSION['HESK_MESSAGE']);
    }
    ?>
    <div class="text-center py-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-emerald-900 mb-4 tracking-tight">
            Pusat Bantuan Akademik
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Unit Pelayanan Terpadu Teknologi Informasi dan Pangkalan Data (UTIPD)<br>
            <span class="font-semibold text-emerald-600">IAIN Manado</span>
        </p>
        <div class="mt-6 w-24 h-1.5 bg-yellow-400 mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        
        <a href="index.php?a=add" class="group relative block p-8 bg-white border border-gray-200 rounded-3xl shadow-xl hover:shadow-2xl hover:border-emerald-400 transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:bg-emerald-100 transition-colors"></div>
            
            <div class="relative flex flex-col items-center text-center">
                <div class="p-5 bg-emerald-600 text-white rounded-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 group-hover:text-emerald-700 transition-colors">
                    Buat Aduan Baru
                </h3>
                <p class="mt-3 text-gray-500 text-sm leading-relaxed">
                    Laporkan kendala SIAKAD, jaringan internet, atau akun akademik Anda disini.
                </p>
            </div>
        </a>

        <a href="view.php" class="group relative block p-8 bg-white border border-gray-200 rounded-3xl shadow-xl hover:shadow-2xl hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-50 rounded-full group-hover:bg-blue-100 transition-colors"></div>
            
            <div class="relative flex flex-col items-center text-center">
                <div class="p-5 bg-blue-600 text-white rounded-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 group-hover:text-blue-700 transition-colors">
                    Cek Status Tiket
                </h3>
                <p class="mt-3 text-gray-500 text-sm leading-relaxed">
                    Lihat balasan dari teknisi kami mengenai laporan yang sudah Anda kirim.
                </p>
            </div>
        </a>
    </div>

    <?php if ($hesk_settings['kb_enable']): ?>
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-8 border border-gray-200">
        <div class="flex items-center mb-6">
            <div class="bg-white p-2 rounded-lg shadow-sm mr-4 text-emerald-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Pusat Pengetahuan</h2>
        </div>

        <div class="mb-8">
            <form action="knowledgebase.php" method="get" class="relative">
                <input type="text" name="search" class="w-full pl-12 pr-4 py-4 rounded-xl border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm transition-all" placeholder="Cari solusi cepat (misal: Lupa Password)...">
                <button type="submit" class="absolute left-4 top-4 text-gray-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
             <a href="knowledgebase.php" class="text-emerald-700 font-semibold hover:underline">Lihat Semua Artikel Bantuan &rarr;</a>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php
// Memuat Footer
require_once(__DIR__ . '/footer.php');
?>