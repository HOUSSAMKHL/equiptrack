
<h1>Créer une anomalie</h1>
<form method="POST" action="{{ route('anomalies.store') }}">
    @csrf
    <input name="cause_anomalie" placeholder="Cause" required>
    <input name="action_corrective" placeholder="Action corrective" required>
    <input type="datetime-local" name="date_signalement" required>
    <input type="datetime-local" name="date_remise">
    <input name="duree_panne" type="number" placeholder="Durée" required>
    <input name="cout_reparation" type="number" step="0.01" required>
    <select name="anomalie_resolue">
        <option value="0">Non</option>
        <option value="1">Oui</option>
    </select>
    <textarea name="pieces_rechange" placeholder="Pièces de rechange"></textarea>
    <input name="id_user" type="number" placeholder="ID utilisateur" required>
    <button type="submit">Enregistrer</button>
</form>
