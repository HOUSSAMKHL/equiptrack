<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Direction Régionale</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de la Direction Régionale</h1>
    <p><strong>ID :</strong> {{ $direction->id }}</p>
    <p><strong>Nom de la Direction Régionale :</strong> {{ $direction->nom_direction_regionale }}</p>
    <a href="{{ route('direction_regionales.index') }}">Retour à la liste des Directions Régionales</a>
</body>
</html>
