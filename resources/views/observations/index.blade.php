<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Observations</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Observations</h1>
    <a href="{{ route('observations.create') }}">Ajouter une Observation</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description de la Panne</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($observations as $observation)
                <tr>
                    <td>{{ $observation->id }}</td>
                    <td>{{ $observation->description_panne }}</td>
                    <td>
                        <a href="{{ route('observations.show', $observation->id) }}">Voir</a> |
                        <a href="{{ route('observations.edit', $observation->id) }}">Modifier</a> |
                        <form action="{{ route('observations.destroy', $observation->id) }}" method="POST" style="display:inline;">
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
