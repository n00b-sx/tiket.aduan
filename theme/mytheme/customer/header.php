<?php
/* Check if this is a valid include */
if (!defined('IN_SCRIPT')) {die('Invalid attempt');}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (isset($hesk_settings['hesk_title']) ? $hesk_settings['hesk_title'] : 'Help Desk'); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: { 
            extend: { 
                colors: { 
                    emerald: { 
                        50: '#ecfdf5', 
                        600: '#059669', 
                        900: '#064e3b' } 
                    } 
                } 
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
    <script src="<?php echo HESK_PATH; ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo HESK_PATH; ?>js/hesk_javascript.js"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen text-gray-800">

<nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
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
            <div class="flex items-center space-x-4">
                <a href="index.php" class="text-sm font-medium hover:text-emerald-600">Beranda</a>
                <a href="index.php?a=add" class="px-4 py-2 text-sm text-white bg-emerald-600 rounded-full hover:bg-emerald-700 transition">+ Aduan</a>
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow">