<div style="max-width: 800px; margin: 20px auto; display: flex; gap: 20px;">
  <!-- Formulaire pour ajouter une classe -->
  <form method="post" style="flex: 1; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h3 style="text-align: center; font-size: 1.25rem; margin-bottom: 20px;">Ajouter une classe</h3>
    
    <div style="margin-bottom: 15px;">
      <label for="libelle" style="display: block; margin-bottom: 5px;">Libellé de la classe</label>
      <input type="text" id="libelle" name="libelle" 
             style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" 
             placeholder="Ex: 1ère Année" required>
    </div>

    <div style="margin-bottom: 15px;">
      <label for="filiere_id" style="display: block; margin-bottom: 5px;">Filière</label>
      <select id="filiere_id" name="filiere_id" 
              style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
        <option value="">Sélectionnez une filière</option>
        <?php foreach ($filieres as $filiere): ?>
          <option value="<?= $filiere['id'] ?>"><?= htmlspecialchars($filiere['libelle']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div style="margin-bottom: 20px;">
      <label for="niveau" style="display: block; margin-bottom: 5px;">Niveau</label>
      <select id="niveau" name="niveau" 
              style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
        <option value="">Sélectionnez un niveau</option>
        <option value="1">1ère Année</option>
        <option value="2">2ème Année</option>
        <option value="3">3ème Année</option>
        <option value="4">4ème Année</option>
        <option value="5">5ème Année</option>
      </select>
    </div>
    
    <div style="display: flex; justify-content: space-between;">
      <button type="reset" style="padding: 8px 16px; background: #f0f0f0; border: 1px solid #ddd; border-radius: 4px;">Annuler</button>
      <button type="submit" name="add_class" style="padding: 8px 16px; background: #007bff; color: white; border: none; border-radius: 4px;">Valider</button>
    </div>
  </form>

 
</div>