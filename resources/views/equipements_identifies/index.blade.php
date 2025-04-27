<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Équipements Identifiés</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Équipements Identifiés</h1>
    <a href="{{ route('equipements_identifies.create') }}">Ajouter un Équipement</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'équipement</th>
                <th>Secteur</th>
                <th>Catégorie</th>
                <th>Fréquence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipements_identifies as $equipement)
                <tr>
                    <td>{{ $equipement->id }}</td>
                    <td>{{ $equipement->nom_equipement }}</td>
                    <td>{{ $equipement->secteur }}</td>
                    <td>{{ $equipement->categorie->nom_categorie }}</td>
                    <td>{{ optional($equipement->frequence)->type_frequence ?? 'Fréquence non définie' }}</td>
                    <td>
                        <a href="{{ route('equipements_identifies.show', $equipement->id) }}">Voir</a> |
                        <a href="{{ route('equipements_identifies.edit', $equipement->id) }}">Modifier</a> |
                        <form action="{{ route('equipements_identifies.destroy', $equipement->id) }}" method="POST" style="display:inline;">
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
