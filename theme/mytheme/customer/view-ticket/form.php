<?php
// Pastikan tidak diakses langsung
if (!defined('IN_SCRIPT')) {
    die();
}
?>

<style>
    /* Override warna footer bawaan HESK */
    .footer, table[style*="border-top"] {
        background-color: #064e3b !important; /* Emerald 900 */
        color: #d1fae5 !important; /* Emerald 100 */
        width: 100% !important;
        border: none !important;
        padding: 20px 0 !important;
        text-align: center !important;
    }
    .footer a {
        color: #34d399 !important; /* Emerald 400 */
        text-decoration: none !important;
        font-weight: bold;
    }
    /* Sembunyikan pesan error default HESK yang kurang rapi, kita ganti style di bawah */
    .hesk_error, .hesk_notice, .hesk_info { margin-bottom: 20px; }
</style>

<div class="max-w-xl mx-auto px-4 py-12 min-h-[60vh]">

    <?php hesk_handle_messages(); ?>

    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 rounded-full mb-4">
            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Cek Status Tiket</h1>
        <p class="text-gray-500 mt-2">Masukkan Nomor Tiket Anda untuk melihat progres pengerjaan.</p>
    </div>

    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="ticket.php" method="get" name="form1" id="form1" class="space-y-6">
                
                <div>
                    <label for="track" class="block text-sm font-medium text-gray-700 mb-1">Nomor Tiket (Tracking ID)</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-400 font-bold">#</span>
                        </div>
                        <input type="text" name="track" id="track" value="<?php echo htmlspecialchars($trackingID); ?>" 
                               class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-8 py-3 sm:text-sm border-gray-300 rounded-xl bg-gray-50" 
                               placeholder="Contoh: ABC-123-XYZZ" required>
                    </div>
                </div>

                <?php if ($hesk_settings['email_view_ticket']): ?>
                <div>
                    <label for="e" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input type="email" name="e" id="e" value="<?php echo htmlspecialchars($email); ?>" 
                               class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 py-3 sm:text-sm border-gray-300 rounded-xl bg-gray-50" 
                               placeholder="Email yang digunakan saat melapor">
                    </div>
                </div>
                
                <div class="flex items-center">
                    <input id="r" name="r" type="checkbox" value="Y" <?php if ($remember_email) {echo 'checked';} ?> 
                           class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                    <label for="r" class="ml-2 block text-sm text-gray-500">
                        Ingat alamat email saya
                    </label>
                </div>
                <?php endif; ?>

                <div>
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all transform hover:-translate-y-1">
                        LIHAT STATUS TIKET
                    </button>
                </div>

                <div class="text-center pt-2">
                    <a href="index.php?a=forgot_tid" class="text-sm text-emerald-600 hover:text-emerald-800 font-medium">
                        Lupa nomor tiket Anda?
                    </a>
                </div>

            </form>
        </div>
        
        <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-500">
                Butuh bantuan baru? <a href="index.php?a=add" class="text-emerald-700 font-bold hover:underline">Buat Aduan Disini</a>
            </p>
        </div>
    </div>
    
    <div class="text-center mt-8">
         <a href="index.php" class="inline-flex items-center text-gray-500 hover:text-emerald-600 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>
    </div>

</div>
<?php
/*******************************************************************************
The code below handles HESK licensing and must be included in the template.

Removing this code is a direct violation of the HESK End User License Agreement,
will void all support and may result in unexpected behavior.

To purchase a HESK license and support future HESK development please visit:
https://www.hesk.com/buy.php
*******************************************************************************/
$hesk_settings['hesk_license']('Qo8Zm9vdGVyIGNsYXNzPSJmb290ZXIiPg0KICAgIDxwIGNsY
XNzPSJ0ZXh0LWNlbnRlciI+UG93ZXJlZCBieSA8YSBocmVmPSJodHRwczovL3d3dy5oZXNrLmNvbSIgY
2xhc3M9ImxpbmsiPkhlbHAgRGVzayBTb2Z0d2FyZTwvYT4gPHNwYW4gY2xhc3M9ImZvbnQtd2VpZ2h0L
WJvbGQiPkhFU0s8L3NwYW4+PGJyPk1vcmUgSVQgZmlyZXBvd2VyPyBUcnkgPGEgaHJlZj0iaHR0cHM6L
y93d3cuc3lzYWlkLmNvbS8/dXRtX3NvdXJjZT1IZXNrJmFtcDt1dG1fbWVkaXVtPWNwYyZhbXA7dXRtX
2NhbXBhaWduPUhlc2tQcm9kdWN0X1RvX0hQIiBjbGFzcz0ibGluayI+U3lzQWlkPC9hPjwvcD4NCjwvZ
m9vdGVyPg0K',"\104", "a809404e0adf9823405ee0b536e5701fb7d3c969");
/*******************************************************************************
END LICENSE CODE
*******************************************************************************/
?>
<script>
document.getElementById('track').focus();
</script>