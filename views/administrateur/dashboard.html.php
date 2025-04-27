<main class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-6xl p-8 bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Tableau de Bord</h1>
            <div class="text-sm text-gray-500"> <?= date('d/m/Y') ?></div>
        </div>
        
        <!-- Cartes de statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
            <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-xs hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Classes</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1"><?= $class["nb_class"] ?></p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-xs text-gray-500 flex items-center">
                    <span class="text-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        2% vs mois dernier
                    </span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-xs hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Professeurs</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1"><?= $profs["nb_profs"] ?></p>
                    </div>
                    <div class="p-3 rounded-full bg-green-50 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-xs text-gray-500 flex items-center">
                    <span class="text-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        5% vs mois dernier
                    </span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-xs hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Inscrits</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1"><?= $inscrit["nb_inscrit"] ?></p>
                    </div>
                    <div class="p-3 rounded-full bg-purple-50 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-xs text-gray-500 flex items-center">
                    <span class="text-green-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        12% vs mois dernier
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-800">Répartition des professeurs</h3>
                    <span class="text-xs px-2 py-1 bg-blue-50 text-blue-600 rounded-full">Mois en cours</span>
                </div>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Classes avec professeur</span>
                            <span>70%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-2 bg-blue-500 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Classes sans professeur</span>
                            <span>30%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-2 bg-gray-400 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-800">Taux d'inscription</h3>
                    <span class="text-xs px-2 py-1 bg-green-50 text-green-600 rounded-full">Objectif: 90%</span>
                </div>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Étudiants inscrits</span>
                            <span>85%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-2 bg-green-500 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Places restantes</span>
                            <span>15%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-2 bg-gray-400 rounded-full" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>