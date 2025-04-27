<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Effectuer</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Effectuer</h1>
    <p><strong>ID :</strong> {{ $effectuer->id }}</p>
    <p><strong>Utilisateur :</strong> {{ optional($effectuer->utilisateur)->nom ?? 'Utilisateur inconnu' }}</p>
    <p><strong>Exemplaire :</strong> {{ optional($effectuer->equipementTracable)->nom_exemplaire ?? 'Exemplaire inconnu' }}</p>
    <p><strong>Opération :</strong> {{ optional($effectuer->operation)->nom_operation ?? 'Opération inconnue' }}</p>
    <p><strong>Date de l'opération :</strong> {{ $effectuer->date_operation }}</p>
    <p><strong>Durée :</strong> {{ $effectuer->durée }}</p>
    <a href="{{ route('effectuers.index') }}">Retour à la liste des Effectués</a>
</body>
</html>
