<main class="p-6 bg-gray-50 min-h-screen">
    <!-- Carte principale -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- En-tête -->
        <div class="bg-gradient-to-r from-gray-200 to-gray-900 px-6 py-4">
            <h1 class="text-2xl font-bold text-white text-center">GESTION DES CLASSES</h1>
        </div>
        
        <div class="p-6">
            <!-- Barre de recherche et bouton -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <!-- Formulaire de recherche amélioré -->
                <form method="get" class="w-full md:w-auto flex-1">
                    <input type="hidden" name="controller" value="rp">
                    <input type="hidden" name="page" value="classes">
                    
                    <div class="relative flex items-center">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="search"
                            value="<?= htmlspecialchars($searchTerm ?? '') ?>"
                            class="block w-full pl-10 pr-12 py-2 border border-gray-300 rounded-lg bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                            placeholder="Rechercher une classe...">
                        
                        <div class="absolute right-0 flex items-center pr-2">
                            <?php if (!empty($searchTerm)): ?>
                                <a href="?controller=rp&page=classes" class="p-1 text-gray-500 hover:text-gray-700" title="Réinitialiser">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <button type="submit" class="ml-2 p-1 text-blue-600 hover:text-blue-800">
                                <i class="ri-search-line text-lg"></i>
                            </button>
                        </div>
                    </div>
                </form>
                
                <!-- Bouton d'action -->
                <a href="?controller=rp&page=classes&showModal=true" 
                   class="w-full md:w-auto flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-sm">
                    <i class="ri-add-line mr-2"></i> Nouvelle classe
                </a>
            </div>

            <!-- Liste des classes sous forme de cartes -->
            <?php if (empty($classe)): ?>
                <div class="bg-blue-50 border border-blue-100 rounded-lg p-8 text-center">
                    <i class="ri-information-line text-4xl text-blue-500 mb-3"></i>
                    <p class="text-blue-800 font-medium">Aucune classe trouvée</p>
                    <p class="text-blue-600 text-sm mt-1">Commencez par créer une nouvelle classe</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($classe as $class): ?>
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800"><?= htmlspecialchars($class['libelle']) ?></h3>
                                    <p class="text-sm text-gray-500 mt-1">
                                        <span class="font-medium"><?= htmlspecialchars($class['filiere']) ?></span> - 
                                        <span><?= htmlspecialchars($class['niveau']) ?></span>
                                    </p>
                                </div>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </div>
                        
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-end space-x-2">
                                <a href="#" class="mr-24 mt-2">
                                <i class="ri-eye-line text-blue-600"></i>Voir plus</a>
                                <a href="?controller=rp&page=classes&action=edit&id=<?= $class['id'] ?>" 
                                   class="p-2 text-blue-600 hover:bg-blue-50 rounded-md transition-colors"
                                   title="Modifier">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <a href="?controller=rp&page=classes&action=delete&id=<?= $class['id'] ?>" 
                                   class="p-2 text-red-600 hover:bg-red-50 rounded-md transition-colors"
                                   title="Supprimer" 
                                   onclick="return confirm('Voulez-vous vraiment supprimer cette classe ?')">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <!-- Pagination améliorée -->
            <!-- <?php if (!empty($classe) && $totalPages > 1): ?>
            <div class="mt-8 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Page <?= $currentPage ?> sur <?= $totalPages ?>
                </div>
                <nav class="flex space-x-1">
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=classes&p=<?= $currentPage - 1 ?>" 
                           class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            &laquo; Précédent
                        </a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=classes&p=<?= $i ?>" 
                           class="px-3 py-1 border <?= ($i === $currentPage) ? 'bg-blue-50 border-blue-200 text-blue-600' : 'border-gray-300 hover:bg-gray-50' ?> rounded-md transition-colors">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=classes&p=<?= $currentPage + 1 ?>" 
                           class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            Suivant &raquo;
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
            <?php endif; ?> -->
        </div>
    </div>

    <!-- Modal d'ajout (amélioré) -->
    <!-- <?php if ((isset($_GET['showModal']) && $_GET['showModal'] === 'true') || (isset($_GET['action']) && $_GET['action'] === 'edit')): ?>    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"> -->
        <?php if ($showModal): ?>
<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl w-full max-w-md overflow-hidden">
        <div class="bg-gradient-to-r from-blue-200 to-gray-200 px-6 py-4">
            <h3 class="text-lg font-bold text-gray-700 text-center">
                <?= !empty($classeToEdit) ? 'Modifier la classe' : 'Ajouter une classe' ?>
            </h3>
        </div>
        
        <form method="post" action="?controller=rp&page=classes" class="p-6">
            <div class="bg-gray-00 rounded-2xl p-6 border border-gray-700/30">
                <!-- Champ caché pour l'ID en cas de modification -->
                <?php if (!empty($classeToEdit)): ?>
                    <input type="hidden" name="id" value="<?= $classeToEdit['id'] ?>">
                <?php endif; ?>
                
                <!-- Nom de la classe -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-800 flex items-center gap-2">
                        <i class="ri-building-2-line text-[#b31822]"></i>
                        Nom de la classe
                    </label>
                    <input 
                        type="text"
                        class="w-full px-4 py-3 bg-gray-300/30 border-2 border-gray-600 rounded-xl text-gray-500
                            focus:outline-none focus:border-orange-600 focus:ring-orange-600/30
                            placeholder-gray-500 transition-all"
                        placeholder="Ex: B1 Développement"
                        name="libelle"
                        value="<?= !empty($classeToEdit) ? htmlspecialchars($classeToEdit['libelle']) : '' ?>"
                        required
                    >
                </div>

                <!-- Filière et Niveau -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <div class="space-y-2">
        <label class="text-sm font-medium text-gray-800 flex items-center gap-2">
            <i class="ri-flow-chart text-[#b31822]"></i>
            Filière
        </label>
       <select name="filliere"
        class="w-full px-4 py-3 bg-gray-300/30 border-2 border-gray-600 rounded-xl text-gray-500  
               focus:outline-none focus:border-orange-600 focus:ring-orange-600/30
               appearance-none transition-all">
    <option value="">Sélectionnez une filière</option>
    
    <?php foreach(getAllFilieres() as $filiere): ?>
            <option value="<?= $filiere['id'] ?>" 
                <?= (!empty($classeToEdit) && $classeToEdit['filiere_id'] == $filiere['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($filiere['libelle']) ?>
            </option>
    <?php endforeach; ?>
</select>
    </div>

    <div class="space-y-2">
        <label class="text-sm font-medium text-gray-800 flex items-center gap-2">
            <i class="ri-stack-line text-[#b31822]"></i>
            Niveau
        </label>
        <select name="niveau"
                class="w-full px-4 py-3 bg-gray-300/30 border-2 border-gray-600 rounded-xl text-gray-500 
                    focus:outline-none focus:border-orange-600 focus:ring-orange-600/30
                    appearance-none transition-all">
            <option value="">Sélectionnez un niveau</option>
            <?php foreach(getAllNiveaux() as $niveau): ?>
            <option value="<?= $niveau['id'] ?>" 
                <?= (!empty($classeToEdit) && $classeToEdit['niveau_id'] == $niveau['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($niveau['libelle']) ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="?controller=rp&page=classes" 
                   class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                    <?= !empty($classeToEdit) ? 'Mettre à jour' : 'Enregistrer' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>
    </div>
<?php endif; ?>
</main>