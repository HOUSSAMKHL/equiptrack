<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Direction Régionale</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Ajouter une Direction Régionale</h1>
    <form action="{{ route('direction_regionales.store') }}" method="POST">
        @csrf
        <label for="nom_direction_regionale">Nom de la Direction Régionale :</label>
        <input type="text" id="nom_direction_regionale" name="nom_direction_regionale" required>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('directionRegionales.index') }}">Retour à la liste des Directions Régionales</a>
</body>
</html>
