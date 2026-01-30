</main>

<footer class="bg-emerald-900 text-emerald-100 mt-auto print:hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div>
                <h5 class="text-white font-bold text-lg mb-4">UTIPD IAIN Manado</h5>
                <p class="text-sm opacity-80 leading-relaxed">
                    Unit Pelayanan Terpadu Teknologi Informasi dan Pangkalan Data.<br>
                    Melayani civitas akademika dengan sepenuh hati.
                </p>
            </div>

            <div>
                <h5 class="text-white font-bold text-lg mb-4">Akses Cepat</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="https://iain-manado.ac.id" target="_blank" class="hover:text-white hover:underline transition-all">🌐 Website Utama</a></li>
                    <li><a href="https://siakad.iain-manado.ac.id" target="_blank" class="hover:text-white hover:underline transition-all">🎓 SIAKAD</a></li>
                    <li><a href="index.php?a=add" class="hover:text-white hover:underline transition-all">📝 Buat Aduan Baru</a></li>
                </ul>
            </div>

            <div class="text-center md:text-right">
                <div class="mb-4">
                    <span class="inline-block bg-emerald-800 rounded-lg px-3 py-1 text-xs font-semibold text-white">
                        HESK v<?php echo (isset($hesk_settings['hesk_version']) ? $hesk_settings['hesk_version'] : '3.x'); ?>
                    </span>
                </div>
                <p class="text-xs opacity-60">
                    &copy; <?php echo date('Y'); ?> <?php echo (isset($hesk_settings['hesk_title']) ? $hesk_settings['hesk_title'] : 'Help Desk'); ?>.<br>
                    All rights reserved.
                </p>
                
                <p class="mt-6 text-[10px] text-emerald-400 opacity-60 hover:opacity-100 transition-opacity">
                    Powered by <a href="https://www.hesk.com" title="Help Desk Software">Help Desk Software</a> HESK
                </p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>