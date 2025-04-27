<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Catégorie</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier la Catégorie</h1>
    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom_categorie">Nom de la catégorie :</label>
        <input type="text" id="nom_categorie" name="nom_categorie" value="{{ $categorie->nom_categorie }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('categories.index') }}">Retour à la liste des catégories</a>
</body>
</html>
