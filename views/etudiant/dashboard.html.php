<h1>Bonjour Etudiants</h1>
<a href="<?= WEBROOT ?>?controllers=security&page=deconnexion">
    <button
        class="px-2 py-2 hover:bg-gray-200 hover:rounded-3xl font-medium rounded w-full">
        <span>Deconnexion</span>
        <i class="ri-logout-box-line"></i>
    </button>
</a>









<?php if (isset($_GET['showModal']) && $_GET['showModal'] === 'true'): ?>
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-bold text-center mb-4">Ajouter une classe</h3>
                
                <form method="post" action="?controller=rp&page=classes&action=add">
                    <div class="mb-4">
                        <label for="libelle" class="block text-sm font-medium text-gray-700 mb-1">Libellé de la classe</label>
                        <input type="text" id="libelle" name="libelle" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Ex: 1ère Année" required>
                    </div>

                    <div class="mb-4">
                        <label for="filiere_id" class="block text-sm font-medium text-gray-700 mb-1">Filière</label>
                        <select id="filiere_id" name="filiere_id" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Sélectionnez une filière</option>
                            <?php foreach ($filieres as $filiere): ?>
                                <option value="<?= $filiere['id'] ?>"><?= htmlspecialchars($filiere['libelle']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-6">
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

                    <div class="flex justify-end space-x-3">
                        <a href="?controller=rp&page=classes" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Annuler</a>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>



            <a href="?controller=rp&page=classes&showModal=true" class="btn w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300 text-center">
                + Nouveau
            </a>