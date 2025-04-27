<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5.0.0-beta.1/daisyui.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.min.css"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Itim&display=swap"
        rel="stylesheet" />
    <title>Document</title>
</head>

<body class="">
    
<div
    id="sidebar"
    class="flex flex-col justify-between p-3 fixed left-0 shadow-md h-full text-white bg-gray-900 w-64 lg:w-52 md:flex transform transition-transform duration-300 ease-in-out -translate-x-full md:translate-x-0 z-50">
    <div class="flex flex-col gap-6">
        <div class="flex justify-between">
            <div class="flex items-center gap-2 text-md">
                <i class="ri-funds-fill text-xl"></i>
                <span class="font-medium">gestion school</span>
            </div>
            <div class="lg:hidden" id="sidebar-close">
                <i class="ri-layout-right-line text-lg font-semibold"></i>
            </div>
        </div>
            <nav>
                <ul>
                    <li class="py-2 px-4 <?= $page === 'dashboard' ? 'bg-orange-600 text-white shadow' : 'hover:bg-gray-700' ?> rounded-3xl">
                        <a
                            href="<?= WEBROOT ?>controller=rp&page=dashboard"
                            class="font-medium gap-3 flex items-center text-sm">
                            <i class="ri-home-3-line text-lg"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="py-2 px-4 <?= $page === 'classes' ? 'bg-orange-600 text-white shadow' : 'hover:bg-gray-700' ?> rounded-3xl">
                        <a
                            href="<?= WEBROOT ?>controller=rp&page=classes"
                            class="font-medium gap-3 flex items-center text-sm">
                            <i class="ri-group-line text-lg"></i>
                            <span>Classes</span>
                        </a>
                    </li>
                    <li class="py-2 px-4 <?= $page === 'professeurs' ? 'bg-orange-600 text-white shadow' : 'hover:bg-gray-700' ?> rounded-3xl">
                        <a
                            href="<?= WEBROOT ?>controller=rp&page=professeurs"
                            class="font-medium gap-3 flex items-center text-sm">
                            <i class="ri-user-line text-lg"></i>
                            <span>Professeurs</span>
                        </a>
                    </li>
                    <li class="py-2 px-4 <?= $page === 'cours' ? 'bg-orange-600 text-white shadow' : 'hover:bg-gray-700' ?> rounded-3xl">
                        <a
                            href="<?= WEBROOT ?>controller=rp&page=cours"
                            class="font-medium gap-3 flex items-center text-sm">
                            <i class="ri-book-open-line text-lg"></i>
                            <span>Cours</span>
                        </a>
                    </li>
                </ul>
            </nav>
    </div>
    <a href="<?= WEBROOT ?>controllers=security&page=deconnexion">
        <button
            class="px-2 py-2 hover:bg-gray-700 hover:rounded-3xl font-medium rounded w-full">
            <span>Deconnexion</span>
            <i class="ri-logout-box-line"></i>
        </button>
    </a>
    </div>

    <script src="javascript/security.js"></script>
</body>

</html>
