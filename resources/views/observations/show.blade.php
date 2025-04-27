<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Observation</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Observation</h1>
    <p><strong>ID:</strong> {{ $observation->id }}</p>
    <p><strong>Description de la Panne:</strong> {{ $observation->description_panne }}</p>
    <a href="{{ route('observations.index') }}">Retour à la liste des observations</a>
</body>
</html>
