

<main class="bg-gradient-to-r from-gray-900 to-green-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-5xl p-8 bg-white shadow-2xl rounded-3xl">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Tableau de Bord</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-6 rounded-2xl shadow-lg text-center">
                <h3 class="text-xl font-semibold text-gray-800">Nombre de Classes</h3>
                <p class="text-4xl font-bold text-blue-600 mt-2"><?= $class["nb_class"] ?></p>
            </div>
            <div class="bg-green-100 p-6 rounded-2xl shadow-lg text-center">
                <h3 class="text-xl font-semibold text-gray-800">Nombre de Professeurs</h3>
                <p class="text-4xl font-bold text-green-600 mt-2"><?= $profs["nb_profs"] ?></p>
            </div>
            <div class="bg-yellow-100 p-6 rounded-2xl shadow-lg text-center">
                <h3 class="text-xl font-semibold text-gray-800">Nombre d'Inscrits</h3>
                <p class="text-4xl font-bold text-yellow-600 mt-2"><?= $inscrit["nb_inscrit"] ?></p>
            </div>
        </div>
        
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Répartition des Professeurs</h3>
                <div class="w-full h-4 bg-blue-300 mt-2 rounded-full overflow-hidden">
                    <div class="h-4 bg-blue-600 rounded-full" style="width: 70%"></div>
                </div>
                <p class="text-gray-600 text-sm mt-2">70% des classes ont un professeur attitré</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Taux d'Inscription</h3>
                <div class="w-full h-4 bg-green-300 mt-2 rounded-full overflow-hidden">
                    <div class="h-4 bg-green-600 rounded-full" style="width: 85%"></div>
                </div>
                <p class="text-gray-600 text-sm mt-2">85% des étudiants prévus sont inscrits</p>
            </div>
        </div>
    </div>

 </main>