
    <h1>Modifier l’anomalie</h1>

    <form method="POST" action="{{ route('anomalies.update', $anomalie->id) }}">
        @csrf
        @method('PUT')

        <label>Cause de l’anomalie :</label>
        <input type="text" name="cause_anomalie" value="{{ old('cause_anomalie', $anomalie->cause_anomalie) }}" required>

        <label>Action corrective :</label>
        <input type="text" name="action_corrective" value="{{ old('action_corrective', $anomalie->action_corrective) }}" required>

        <label>Date de signalement :</label>
        <input type="datetime-local" name="date_signalement" value="{{ old('date_signalement', \Carbon\Carbon::parse($anomalie->date_signalement)->format('Y-m-d\TH:i')) }}" required>

        <label>Date de remise :</label>
        <input type="datetime-local" name="date_remise" value="{{ old('date_remise', $anomalie->date_remise ? \Carbon\Carbon::parse($anomalie->date_remise)->format('Y-m-d\TH:i') : '') }}">

        <label>Durée de la panne (en minutes) :</label>
        <input type="number" name="duree_panne" value="{{ old('duree_panne', $anomalie->duree_panne) }}" required>

        <label>Coût de réparation :</label>
        <input type="number" step="0.01" name="cout_reparation" value="{{ old('cout_reparation', $anomalie->cout_reparation) }}" required>

        <label>Résolue :</label>
        <select name="anomalie_resolue" required>
            <option value="0" {{ old('anomalie_resolue', $anomalie->anomalie_resolue) == 0 ? 'selected' : '' }}>Non</option>
            <option value="1" {{ old('anomalie_resolue', $anomalie->anomalie_resolue) == 1 ? 'selected' : '' }}>Oui</option>
        </select>

        <label>Pièces de rechange :</label>
        <textarea name="pieces_rechange">{{ old('pieces_rechange', $anomalie->pieces_rechange) }}</textarea>

        <label>ID utilisateur :</label>
        <input type="number" name="id_user" value="{{ old('id_user', $anomalie->id_user) }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
