<?php
global $hesk_settings, $hesklang;

// Pastikan skrip tidak diakses secara langsung
if (!defined('IN_SCRIPT')) {
    die();
}

// Memuat Header dari folder tema ini sendiri
require_once(__DIR__ . '/header.php');

?>

<div class="w-full bg-emerald-900 text-white overflow-hidden py-2 shadow-md mb-6">
    <div class="whitespace-nowrap animate-marquee inline-block">
        <span class="mx-4 font-semibold tracking-wide">
            📢 Portal Pelayanan Unit Pelayanan Terpadu Teknologi Informasi dan Pangkalan Data — IAIN Manado
        </span>
        <span class="mx-4 font-semibold tracking-wide">
            📢 Portal Pelayanan Unit Pelayanan Terpadu Teknologi Informasi dan Pangkalan Data — IAIN Manado
        </span>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

    <div class="mb-6">
        <?php hesk_show_messages(); ?>
    </div>

    <div class="text-center py-10">
        <h1 class="text-4xl font-extrabold text-emerald-800 mb-2">
            Pusat Bantuan Akademik
        </h1>
        <p class="text-lg text-gray-600">
            Unit Teknologi Informasi & Pangkalan Data (UTIPD) IAIN Manado
        </p>
        <div class="mt-4 w-24 h-1 bg-emerald-500 mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        
        <a href="index.php?a=add" class="group relative block p-8 bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl hover:border-emerald-500 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-emerald-600 transition-colors">
                        Kirim Aduan Baru
                    </h3>
                    <p class="mt-3 text-gray-500">
                        Punya masalah dengan SIAKAD atau Akun? Ajukan tiket bantuan di sini.
                    </p>
                </div>
                <div class="p-4 bg-emerald-100 rounded-full group-hover:bg-emerald-600 transition-colors">
                    <svg class="w-8 h-8 text-emerald-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="view.php" class="group relative block p-8 bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                        Cek Status Tiket
                    </h3>
                    <p class="mt-3 text-gray-500">
                        Pantau progres aduan yang sudah Anda kirim sebelumnya.
                    </p>
                </div>
                <div class="p-4 bg-blue-100 rounded-full group-hover:bg-blue-600 transition-colors">
                    <svg class="w-8 h-8 text-blue-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </a>
    </div>

    <?php if ($hesk_settings['kb_enable']): ?>
    
    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <svg class="w-6 h-6 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            Pusat Pengetahuan (FAQ)
        </h2>

        <div class="mb-8">
            <?php require_once(HESK_PATH . 'inc/show_search_form.inc.php'); ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <?php if ($hesk_settings['kb_top']): ?>
            <div>
                <h4 class="font-semibold text-emerald-700 mb-4 border-b pb-2">🌟 Artikel Populer</h4>
                <ul class="space-y-2">
                    <?php
                    foreach ($hesk_settings['kb_top'] as $topic) {
                        echo '
                        <li>
                            <a href="knowledgebase.php?article='.$topic['id'].'" class="flex items-start text-gray-600 hover:text-emerald-600 transition-colors">
                                <span class="mr-2 mt-1 text-emerald-400">➤</span>
                                '.$topic['subject'].'
                            </a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if ($hesk_settings['kb_latest']): ?>
            <div>
                <h4 class="font-semibold text-emerald-700 mb-4 border-b pb-2">🆕 Artikel Terbaru</h4>
                <ul class="space-y-2">
                    <?php
                    foreach ($hesk_settings['kb_latest'] as $topic) {
                        echo '
                        <li>
                            <a href="knowledgebase.php?article='.$topic['id'].'" class="flex items-start text-gray-600 hover:text-emerald-600 transition-colors">
                                <span class="mr-2 mt-1 text-emerald-400">➤</span>
                                '.$topic['subject'].'
                            </a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
            <?php endif; ?>
            
        </div>
        
        <div class="mt-6 text-center">
            <a href="knowledgebase.php" class="inline-block px-6 py-2 bg-white border border-emerald-500 text-emerald-600 rounded-full hover:bg-emerald-50 transition-colors font-medium text-sm">
                Lihat Semua Artikel &raquo;
            </a>
        </div>

    </div>
    <?php endif; ?>

</div>

<style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-marquee {
        display: inline-block;
        animation: marquee 25s linear infinite;
        padding-left: 100%; /* Memulai dari luar layar */
    }
</style>

<?php
// Memuat Footer dari folder tema ini sendiri
require_once(__DIR__ . '/footer.php');
?>