<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Catégorie</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de la Catégorie</h1>
    <p><strong>ID :</strong> {{ $categorie  ->id }}</p>
    <p><strong>Nom de la catégorie :</strong> {{ $categorie->nom_categorie }}</p>
    <a href="{{ route('categories.index') }}">Retour à la liste des catégories</a>
</body>
</html>
