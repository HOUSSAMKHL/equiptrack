<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Intervenant</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Intervenant</h1>
    <p><strong>ID:</strong> {{ $intervenant->id }}</p>
    <p><strong>Nom:</strong> {{ $intervenant->nom_intervenant }}</p>
    <p><strong>Numéro:</strong> {{ $intervenant->numero }}</p>
    <p><strong>Société:</strong> {{ $intervenant->societe }}</p>
    <a href="{{ route('intervenants.index') }}">Retour à la liste des intervenants</a>
</body>
</html>
