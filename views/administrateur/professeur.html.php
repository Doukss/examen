
    <main class="p-6">
        <div class="shadow-md border border-gray-200 p-4 rounded-md mb-6">
            <h1 class="text-3xl font-bold text-gray-700 text-center mb-6">LISTE DES ENSEIGNANTS</h1>

            <!-- Barre de recherche -->
            <form method="get" action="?page=enseignants" class="flex gap-2 w-64 mb-6">
                <input type="hidden" name="page" value="enseignants">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="search"
                        value="<?= htmlspecialchars($searchTerm) ?>"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                        placeholder="Rechercher par nom, spécialité">
                </div>
                <button type="submit" class="bg-blue-700 hover:bg-blue-800 w-12 rounded text-white p-2 flex items-center justify-center transition-colors">
                    <i class="ri-search-line"></i>
                </button>
                <?php if (!empty($searchTerm)): ?>
                    <a href="?page=enseignants" class="bg-gray-200 hover:bg-gray-300 w-12 rounded text-gray-700 p-2 flex items-center justify-center transition-colors" title="Réinitialiser">
                        <i class="ri-close-line"></i>
                    </a>
                <?php endif; ?>
            </form>

            
            <!-- Liste des enseignants -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (empty($professeur)): ?>
                    <p class="text-center col-span-3 text-gray-500">Aucun enseignant trouvé.</p>
                <?php else: ?>
                    <?php foreach ($professeur as $enseignant): ?>
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="relative  h-24 b flex items-end">
                                <div class="relative p-4 w-full">
                                <h3 class="text-xl font-bold text-gray-600"><?= htmlspecialchars($enseignant['nom']) ?> <?= htmlspecialchars($enseignant['prenom']) ?></h3>
                                </div>
                                <div class=" w-14 h-14 rounded">
                                <i class="ri-user-2-fill text-4xl text-gray-500"></i>
                                </div>
                            </div>
                            <div class="p-5">
                                <p class="text-gray-500 font-medium">Spécialité : <?= htmlspecialchars($enseignant['specialite']) ?></p>
                                <p class="text-gray-500 font-medium">Grade : <?= htmlspecialchars($enseignant['grade']) ?></p>
                                <div class="flex justify-between border-t border-gray-300 pt-4">
            <button class="flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                Détails
            </button>
            
            <div class="flex space-x-3">
                <a href="edit.php?id=<?= $class['id'] ?>" class="p-2 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors" title="Modifier">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </a>
                <a href="delete.php?id=<?= $class['id'] ?>" class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" title="Supprimer" onclick="return confirm('Supprimer cette classe ?')">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </a>
            </div>
        </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-6">
                <nav class="flex space-x-2">
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=enseignants&p=<?= $currentPage - 1 ?>" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">&laquo;</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=enseignants&p=<?= $i ?>" class="px-3 py-1 <?= ($i === $currentPage) ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700' ?> hover:bg-blue-500 rounded-md"><?= $i ?></a>
                    <?php endfor; ?>
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=enseignants&p=<?= $currentPage + 1 ?>" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">&raquo;</a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </main>
