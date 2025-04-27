<h1>mes niveaux</h1>

<main class="p-6">    
        <div class="shadow-md border border-gray-200 p-4 rounded-md mb-6">
            <h1 class="text-3xl font-bold text-gray-700 text-center mb-6">LISTE DES CLASSES</h1>

            <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                <div class="relative w-full sm:w-64 flex">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <!-- Remplacer votre champ de recherche actuel par : -->
<form method="get" class="flex gap-2">
    <input type="hidden" name="controller" value="rp">
    <input type="hidden" name="page" value="classes">
    
    <div class="relative flex-grow">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <input 
            type="text" 
            name="search"
            value="<?= htmlspecialchars($searchTerm ?? '') ?>"
            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
            placeholder="Rechercher par, filière ou niveau">
    </div>
    
    <button type="submit" class="bg-green-700 hover:bg-green-800 w-12 rounded text-white p-2 flex items-center justify-center transition-colors">
    <i class="ri-search-line"></i>
    </button>
    
    <?php if (!empty($searchTerm)): ?>
        <a href="?controller=rp&page=classes" class="bg-gray-200 hover:bg-gray-300 w-12 rounded text-gray-700 p-2 flex items-center justify-center transition-colors" title="Réinitialiser">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    <?php endif; ?>
</form>
                </div>

                <button class="btn w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300 text-center" onclick="my_modal_1.showModal()">
                    + Nouveau
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (empty($classe)): ?>
                    <p class="text-center col-span-3 text-gray-500">Aucune classe trouvée.</p>
                <?php else: ?>
                    
                    <?php foreach ($classe as $class): ?>
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
    <!-- En-tête avec fond coloré -->
    <div class="bg-white rounded-2xl  border border-gray-200 shadow-[0_10px_25px_-5px_rgba(0,0,0,0.1)] overflow-hidden group transition-all duration-300 hover:shadow-[0_15px_30px_-5px_rgba(0,0,0,0.15)]">
    <!-- Badge statut -->
    <div class="absolute top-4 right-4 z-10">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
            <span class="w-2 h-2 mr-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Active
        </span>
    </div>

    <!-- Visual header -->
    <div class="relative flex items-end">
        <div class="absolute inset-0 bg-[url('https://patternico.com/patterns/svg/pattern-1.svg')] opacity-10"></div>
        <div class="relative p-4 w-full">
            <h3 class="text-xl font-bold text-gray-600 drop-shadow-md"><?= htmlspecialchars($class['libelle']) ?></h3>
            <p class="text-blue-300 text-sm font-medium">ID: <?= htmlspecialchars($class['id']) ?></p>
        </div>
    </div>

    <!-- Corps -->
    <div class="p-5">
        <!-- Meta données -->
        <div class="grid grid-cols-2 gap-4 mb-5 ">
            <div class="space-y-1 ">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Filière</p>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <p class="text-gray-700 font-medium"><?= htmlspecialchars($class['filiere']) ?></p>
                </div>
            </div>

            <div class="space-y-1">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Niveau</p>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-700 font-medium"><?= htmlspecialchars($class['niveau']) ?></p>
                </div>
            </div>
        </div>

        <!-- Progress bar -->
        <div class="mb-6">
            <div class="flex justify-between text-xs text-gray-500 mb-1">
                <span>Capacité</span>
                <span>25/30</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class=" bg-gradient-to-br from-green-600 to-red-500 h-2 rounded-full" style="width: 83%"></div>
            </div>
        </div>

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
                <a href="?controller=rp&page=classes&action=delete&id=<?= $class['id'] ?>" class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" title="Supprimer" onclick="return confirm('Voulez vous supprimer cette classe ?')">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                   </svg>
                </a>

            </div>
        </div>
    </div>
</div>
</div>
                    <?php endforeach; ?>

                <?php endif; ?>
            </div>

            <div class="flex justify-center mt-6">
    <nav class="flex space-x-2">
        <?php if ($currentPage > 1): ?>
            <a href="?page=classes&p=<?= $currentPage - 1 ?>" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=classes&p=<?= $i ?>" class="px-3 py-1 <?= ($i === $currentPage) ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700' ?> hover:bg-blue-500 rounded-md">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=classes&p=<?= $currentPage + 1 ?>" class="px-3 py-1 bg-gray-300 hover:bg-blue-500 text-gray-700 rounded-md">&raquo;</a>
        <?php endif; ?>
    </nav>
</div>


        </div>



<!-- Open the modal using ID.showModal() method -->
<dialog id="my_modal_1" class="modal">
  <div class="modal-box">
    <h3 class="text-lg font-bold text-center">Ajouter une classe</h3>
    <p class="py-4">Press ESC key or click the button below to close</p>
    <div class="modal-action">
      <form method="dialog">
      <div>
            <label for="libelle" class="block text-sm font-medium text-gray-700 mb-1">Libellé de la classe</label>
            <input type="text" id="libelle" name="libelle" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Ex: 1ère Année" required>
        </div>

        <!-- Sélection de la filière -->
        <div>
            <label for="filiere_id" class="block text-sm font-medium text-gray-700 mb-1">Filière</label>
            <select id="filiere_id" name="filiere_id" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Sélectionnez une filière</option>
                <?php foreach ($filieres as $filiere): ?>
                    <option value="<?= $filiere['id'] ?>"><?= htmlspecialchars($filiere['libelle']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Sélection du niveau -->
        <div>
            <label for="niveau" class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
            <select id="niveau" name="niveau" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Sélectionnez un niveau</option>
                <option value="1">1ère Année</option>
                <option value="2">2ème Année</option>
                <option value="3">3ème Année</option>
                <option value="4">4ème Année</option>
                <option value="5">5ème Année</option>
            </select>
        </div>
           <button class="btn">Annuler</button>
           <button class="btn">Valider</button>
      </form>
    </div>
  </div>
</dialog>





    </main>

