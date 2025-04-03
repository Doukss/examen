<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <main class="p-6">
        <h1 class="text-3xl font-bold text-gray-700 text-center mb-6">LISTE DES PROFESSEURS</h1>
        
        <!-- Barre de recherche et bouton d'ajout -->
         <div class="shadow-md border border-gray-200 p-4 rounded-md mb-6">
         <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <!-- Champ de recherche -->
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input 
                    type="text" 
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                    placeholder="Rechercher..."
                    disabled
                    title="Fonctionnalité de recherche non implémentée en version statique">
            </div>
            
            <!-- Bouton d'ajout -->
            <a href="#addModal" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300 text-center">
                + Nouveau
            </a>
        </div>
        
        <!-- Liste des classes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Classe 1 -->
            <?php foreach ($professeurs as $professeur): ?>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-orange-500">
                <h2 class="text-xl font-semibold text-gray-800">Spécialité:<?= htmlspecialchars($professeur['specialite']) ?></h2>
                <p class="text-gray-600 mt-2"><strong>Nom: </strong><?= htmlspecialchars($professeur['nom']) ?></p>
                <p class="text-gray-600"><strong>Prenom: </strong><?= htmlspecialchars($professeur['prenom']) ?></p>
                <p class="text-gray-600"><strong>Grade: </strong><?= htmlspecialchars($professeur['garde']) ?></p>
                <div class="flex space-x-2 mt-4">
                    <a href="#editModal" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-sm">
                        Modifier
                    </a>
                    <a href="#deleteModal" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 text-sm">
                        Supprimer
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- Classe 2 -->
            
            
        </div>
       <!-- pagination -->
        <div class="flex justify-center mt-6">
            <nav class="flex space-x-2">
                <a href="#" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">&laquo;</a>
                <a href="#" class="px-3 py-1 bg-blue-500 hover:bg-blue-500 text-white rounded-md">1</a>
                <a href="#" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">2</a>
                <a href="#" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">3</a>
                <a href="#" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">&raquo;</a>
            </nav>
        </div>
    <!-- Modals (identique à la version précédente) -->
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Ajouter une classe</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Libellé</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Filière</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Niveau</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
            <div class="flex justify-end space-x-3 mt-6">
                <a href="#" class="px-4 py-2 border rounded-md hover:bg-gray-100">
                    Annuler
                </a>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Modifier la classe</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Libellé</label>
                    <input type="text" value="Développement Web" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Filière</label>
                    <input type="text" value="Informatique" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Niveau</label>
                    <input type="text" value="Licence 1" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
            <div class="flex justify-end space-x-3 mt-6">
                <a href="#" class="px-4 py-2 border rounded-md hover:bg-gray-100">
                    Annuler
                </a>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Mettre à jour
                </button>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Confirmer la suppression</h2>
            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer cette classe ? Cette action est irréversible.</p>
            <div class="flex justify-end space-x-3">
                <a href="#" class="px-4 py-2 border rounded-md hover:bg-gray-100">
                    Annuler
                </a>
                <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Supprimer
                </button>
            </div>
        </div>
    </div>
         </div>
    </main>
</body>
</html>