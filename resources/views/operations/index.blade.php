<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Opérations</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Opérations</h1>
    <a href="{{ route('operations.create') }}">Ajouter une Opération</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'Opération</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($operations as $operation)
                <tr>
                    <td>{{ $operation->id }}</td>
                    <td>{{ $operation->nom_operation }}</td>
                    <td>
                        <a href="{{ route('operations.show', $operation->id) }}">Voir</a> |
                        <a href="{{ route('operations.edit', $operation->id) }}">Modifier</a> |
                        <form action="{{ route('operations.destroy', $operation->id) }}" method="POST" style="display:inline;">
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
