<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <a href="{{ route('utilisateurs.create') }}">Ajouter un Utilisateur</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'utilisateur</th>
                <th>Âge</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->id }}</td>
                    <td>{{ $utilisateur->nom_user }}</td>
                    <td>{{ $utilisateur->age }}</td>
                    <td>{{ $utilisateur->telephone }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>{{ $utilisateur->adresse }}</td>
                    <td>{{ $utilisateur->role->nom_role }}</td>
                    <td>
                        <a href="{{ route('utilisateurs.show', $utilisateur->id) }}">Voir</a> |
                        <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}">Modifier</a> |
                        <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" style="display:inline;">
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
