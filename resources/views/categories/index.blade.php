<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Catégories</h1>
    <a href="{{ route('categories.create') }}">Ajouter une catégorie</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->id }}</td>
                    <td>{{ $categorie->nom_categorie }}</td>
                    <td>
                        <a href="{{ route('categories.show', $categorie->id) }}">Voir</a> | 
                        <a href="{{ route('categories.edit', $categorie->id) }}">Modifier</a> | 
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
