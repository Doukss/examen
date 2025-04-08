<main class="bg-gray-50 min-h-screen p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Gestion des Filières</h1>
            <div class="text-sm text-gray-500"><?= date('d/m/Y') ?></div>
        </div>

        <!-- Messages de succès/erreur -->
        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-6">
                <p class="text-green-700">La filière a été enregistrée avec succès.</p>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['deleted'])): ?>
            <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-6">
                <p class="text-green-700">La filière a été supprimée avec succès.</p>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-6">
                <p class="text-red-700">Une erreur est survenue lors de l'opération.</p>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Formulaire d'ajout/modification -->
            <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-lg font-medium text-gray-800 mb-4">
                    <?= isset($filiere['id']) ? 'Modifier' : 'Ajouter' ?> une filière
                </h2>
                
                <form method="post" action="?action=save_filiere" class="space-y-4">
                    <?php if (isset($filiere['id'])): ?>
                        <input type="hidden" name="id" value="<?= $filiere['id'] ?>">
                    <?php endif; ?>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Libellé</label>
                        <input type="text" name="libelle" value="<?= htmlspecialchars($filiere['libelle'] ?? '') ?>" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Ex: Informatique" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        <?= isset($filiere['id']) ? 'Mettre à jour' : 'Enregistrer' ?>
                    </button>
                    
                    <?php if (isset($filiere['id'])): ?>
                        <a href="?page=filieres" class="block w-full text-center bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300 transition-colors">
                            Annuler
                        </a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- Liste des filières -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-medium text-gray-800">Liste des filières</h2>
                    <form method="get" class="relative">
                        <input type="hidden" name="page" value="filieres">
                        <input type="text" name="search" placeholder="Rechercher..." 
                               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                               class="pl-8 pr-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="absolute left-2.5 top-2.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($filiere as $f): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $f['id'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= htmlspecialchars($f['libelle']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex space-x-2">
                                            <a href="?page=filieres&edit=<?= $f['id'] ?>" 
                                               class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50">
                                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                               </svg>
                                            </a>
                                            <a href="?page=filieres&delete=<?= $f['id'] ?>" 
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?')"
                                               class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50">
                                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                               </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination basique -->
                <div class="flex items-center justify-between mt-4 px-2">
                    <div class="text-sm text-gray-500">
                            <!-- Total: <?= count($filieres) ?> filières -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>