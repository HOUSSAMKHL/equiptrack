<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Fréquences</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Fréquences</h1>
    <a href="{{ route('frequences.create') }}">Ajouter une Fréquence</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type de Fréquence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frequences as $frequence)
                <tr>
                    <td>{{ $frequence->id }}</td>
                    <td>{{ $frequence->type_frequence }}</td>
                    <td>
                        <a href="{{ route('frequences.show', $frequence->id) }}">Voir</a> |
                        <a href="{{ route('frequences.edit', $frequence->id) }}">Modifier</a> |
                        <form action="{{ route('frequences.destroy', $frequence->id) }}" method="POST" style="display:inline;">
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
