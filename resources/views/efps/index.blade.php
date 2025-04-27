<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des EFPs</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des EFPs</h1>
    <a href="{{ route('efps.create') }}">Ajouter un EFP</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'établissement</th>
                <th>Adresse</th>
                <th>Numéro</th>
                <th>Email</th>
                <th>Complexe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Efps as $efp)
                <tr>
                    <td>{{ $efp->id }}</td>
                    <td>{{ $efp->nom_etablissement }}</td>
                    <td>{{ $efp->adresse }}</td>
                    <td>{{ $efp->numero }}</td>
                    <td>{{ $efp->email }}</td>
                    <td>{{ $efp->complexe->nom_complexe }}</td>
                    <td>
                        <a href="{{ route('efps.show', $efp->id) }}">Voir</a> |
                        <a href="{{ route('efps.edit', $efp->id) }}">Modifier</a> |
                        <form action="{{ route('efps.destroy', $efp->id) }}" method="POST" style="display:inline;">
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
