<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un EFP</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier un EFP</h1>
    <form action="{{ route('efps.update', $efp->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom_etablissement">Nom de l'établissement :</label>
        <input type="text" name="nom_etablissement" id="nom_etablissement" value="{{ $efp->nom_etablissement }}" required><br><br>

        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse" value="{{ $efp->adresse }}" required><br><br>

        <label for="numero">Numéro :</label>
        <input type="text" name="numero" id="numero" value="{{ $efp->numero }}" required><br><br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="{{ $efp->email }}" required><br><br>

        <label for="id_complexe">Complexe :</label>
        <select name="id_complexe" id="id_complexe" required>
            @foreach($complexes as $complexe)
                <option value="{{ $complexe->id }}" {{ $efp->id_complexe == $complexe->id ? 'selected' : '' }}>{{ $complexe->nom_complexe }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('efps.index') }}">Retour à la liste des EFPs</a>
</body>
</html>
