<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rôles</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Rôles</h1>
    <a href="{{ route('roles.create') }}">Ajouter un Rôle</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->nom_role }}</td>
                    <td>
                        <a href="{{ route('roles.show', $role->id) }}">Voir</a> |
                        <a href="{{ route('roles.edit', $role->id) }}">Modifier</a> |
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
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
