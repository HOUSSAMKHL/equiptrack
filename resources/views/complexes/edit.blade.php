<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Complexe</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier le Complexe</h1>
    <form action="{{ route('complexes.update', $complexe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom_complexe">Nom du Complexe</label>
        <input type="text" id="nom_complexe" name="nom_complexe" value="{{ $complexe->nom_complexe }}" required>
        <br>

        <label for="id_DR">Direction Régionale</label>
        <select id="id_DR" name="id_DR" required>
            @foreach($directionRegionales as $dr)
                <option value="{{ $dr->id }}" {{ $complexe->id_DR == $dr->id ? 'selected' : '' }}>{{ $dr->nom_direction_regionale }}</option>
            @endforeach
        </select>
        <br>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('complexes.index') }}">Retour à la liste des complexes</a>
</body>
</html>
