

<main class="bg-gray-50 min-h-screen p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Gestion des Cours</h1>
            <div class="text-sm text-gray-500"><?= date('d/m/Y') ?></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Formulaire d'ajout -->
            <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-lg font-medium text-gray-800 mb-4">Ajouter un nouveau cours</h2>
                
                <form method="POST" action="ajouter_cours.php" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date du cours</label>
                        <input type="date" name="date_cours" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Heure début</label>
                            <input type="time" name="heure_debut" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Heure fin</label>
                            <input type="time" name="heure_fin" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Module</label>
                        <select name="module" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Sélectionner un module</option>
                            <?php foreach ($modules as $module) : ?>
                                <option value="<?= $module ?>"><?= $module ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Professeur</label>
                            <select name="professeur_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Sélectionner un professeur</option>
                                <?php foreach ($professeur as $prof) : ?>
                                    <option value="<?= $prof['id'] ?>"><?= $prof['nom'] ?> <?= $prof['prenom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Classe</label>
                            <select name="classe_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Sélectionner une classe</option>
                                <?php foreach ($classe as $class) : ?>
                                    <option value="<?= $class['id'] ?>"><?= $class['nom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Enregistrer le cours
                    </button>
                </form>
            </div>

            <!-- Liste des cours -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-lg font-medium text-gray-800 mb-4">Liste des cours programmés</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Heures</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Module</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Professeur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Classe</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($cours as $cour) : ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= $cour['date_cours'] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <?= $cour['heure_debut'] ?> - <?= $cour['heure_fin'] ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?= $cour['module'] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?= $cour['professeur_id'] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?= $cour['classe_id'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
