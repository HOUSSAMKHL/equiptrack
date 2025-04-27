<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Direction Régionale</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier la Direction Régionale</h1>
    <form action="{{ route('direction_regionales.update', $direction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom_direction_regionale">Nom de la Direction Régionale :</label>
        <input type="text" id="nom_direction_regionale" name="nom_direction_regionale" value="{{ $direction->nom_direction_regionale }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('directionRegionales.index') }}">Retour à la liste des Directions Régionales</a>
</body>
</html>
