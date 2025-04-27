<main class="p-4 md:p-6 bg-gray-50 min-h-screen">
    <!-- Carte principale -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- En-tête -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-white">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800">Liste des enseignants</h1>
                    <p class="text-sm text-gray-500">Gestion du corps enseignant</p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Barre de recherche -->
                    <form method="get" action="?page=professeur" class="relative flex-1 min-w-[200px]">
                        <input type="hidden" name="page" value="enseignants">
                        <div class="relative">
                            <input 
                                type="text" 
                                name="search"
                                value="<?= htmlspecialchars($searchTerm) ?>"
                                class="w-full pl-10 pr-10 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                placeholder="Rechercher...">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-search-line text-gray-400"></i>
                            </div>
                            <?php if (!empty($searchTerm)): ?>
                                <a href="?page=professeur" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                    <i class="ri-close-line"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </form>
                    
                    <!-- Bouton Nouveau -->
                    <a href="?controller=rp&page=professeurs&showModal=true" 
                       class="w-full md:w-auto flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-sm">
                        <i class="ri-add-line mr-2"></i> Nouveau prof
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Contenu -->
        <div class="p-4 md:p-6">
            <?php if (empty($professeur)): ?>
                <!-- État vide -->
                <div class="text-center py-12">
                    <i class="ri-user-search-line text-4xl text-gray-300 mb-3"></i>
                    <h3 class="text-gray-500 font-medium">Aucun enseignant trouvé</h3>
                    <p class="text-gray-400 text-sm mt-1"><?= empty($searchTerm) ? 'Commencez par ajouter un enseignant' : 'Aucun résultat pour votre recherche' ?></p>
                    <?php if (empty($searchTerm)): ?>
                        <a href="?controller=rp&page=professeurs&showModal=true" 
                           class="inline-flex items-center mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="ri-user-add-line mr-1"></i> Ajouter un enseignant
                        </a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <!-- Tableau des enseignants -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom complet</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Spécialité</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($professeur as $enseignant): ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                            <i class="ri-user-3-line"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($enseignant['prenom']) ?> <?= htmlspecialchars($enseignant['nom']) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?= htmlspecialchars($enseignant['specialite']) ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <?= htmlspecialchars($enseignant['grade']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <a href="?controller=rp&page=professeurs&action=delete&id=<?=$enseignant['id'] ?>" class="text-red-600 hover:text-red-900"
                                           onclick="return confirm('Voulez-vous vraiment supprimer cet enseignant ?')">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            
            <!-- Pagination -->
            <?php if (!empty($professeur) && $totalPages > 1): ?>
            <div class="mt-6 flex flex-col sm:flex-row items-center justify-between border-t border-gray-200 pt-4">
                <div class="text-sm text-gray-500 mb-4 sm:mb-0">
                    Affichage de <span class="font-medium"><?= count($professeur) ?></span> enseignants
                </div>
                <nav class="flex items-center space-x-1">
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=enseignants&p=<?= $currentPage - 1 ?>" 
                           class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            <i class="ri-arrow-left-line"></i>
                        </a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=enseignants&p=<?= $i ?>" 
                           class="px-3 py-1 border <?= ($i === $currentPage) ? 'bg-blue-50 border-blue-200 text-blue-600' : 'border-gray-300 hover:bg-gray-50' ?> rounded-md transition-colors">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=enseignants&p=<?= $currentPage + 1 ?>" 
                           class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal d'ajout -->
    <?php if (isset($_GET['showModal']) && $_GET['showModal'] === 'true'): ?>
    <div class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-white">
                <h3 class="text-lg font-semibold text-gray-800">Ajouter un enseignant</h3>
            </div>
            
            <form method="post" action="?page=professeur&action=add" class="p-6">
                <div class="space-y-4">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" id="nom" name="nom" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               required>
                    </div>

                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                        <input type="text" id="prenom" name="prenom" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               required>
                    </div>

                    <div>
                        <label for="specialite" class="block text-sm font-medium text-gray-700 mb-1">Spécialité</label>
                        <input type="text" id="specialite" name="specialite" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               required>
                    </div>

                    <div>
                        <label for="grade" class="block text-sm font-medium text-gray-700 mb-1">Grade</label>
                        <select id="grade" name="grade" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <option value="">Sélectionnez un grade</option>
                            <?php foreach(getAllGrade() as $niveau): ?>
                                <option value="<?= $niveau['id'] ?>" <?= (isset($classe['niveau_id']) && $classe['niveau_id'] == $niveau['id']) ? 'selected' : '' ?>><?= htmlspecialchars($niveau['libelle']) ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="?controller=rp&page=professeurs" 
                       class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        Annuler
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
</main>