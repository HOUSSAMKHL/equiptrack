@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une anomalie</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>

<div class="container">
    <h1>Créer une anomalie</h1>

    <form method="POST" action="{{ route('anomalies.store') }}">
        @csrf

        <div class="form-group">
            <label for="cause_anomalie">Cause de l'anomalie</label>
            <input id="cause_anomalie" name="cause_anomalie" type="text" required>
        </div>

        <div class="form-group">
            <label for="action_corrective">Action corrective</label>
            <input id="action_corrective" name="action_corrective" type="text" required>
        </div>

        <div class="form-group">
            <label for="date_signalement">Date de signalement</label>
            <input id="date_signalement" name="date_signalement" type="datetime-local" required>
        </div>

        <div class="form-group">
            <label for="date_remise">Date de remise en service (facultatif)</label>
            <input id="date_remise" name="date_remise" type="datetime-local">
        </div>

        <div class="form-group">
            <label for="duree_panne">Durée de la panne (en heures)</label>
            <input id="duree_panne" name="duree_panne" type="number" required>
        </div>

        <div class="form-group">
            <label for="cout_reparation">Coût de la réparation (MAD)</label>
            <input id="cout_reparation" name="cout_reparation" type="number" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="anomalie_resolue">Anomalie résolue ?</label>
            <select id="anomalie_resolue" name="anomalie_resolue" required>
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pieces_rechange">Pièces de rechange utilisées</label>
            <textarea id="pieces_rechange" name="pieces_rechange" placeholder="Ex. : Courroie, capteur..."></textarea>
        </div>

        <div class="form-group">
            <label for="id_user">Utilisateur concerné (ID)</label>
            <input id="id_user" name="id_user" type="number" required>
        </div>

        <button type="submit">Enregistrer l'anomalie</button>
    </form>
</div>

</body>
</html>
@endsection