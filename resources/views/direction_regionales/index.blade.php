<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Directions Régionales</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Directions Régionales</h1>
    <a href="{{ route('direction_regionales.create') }}">Ajouter une Direction Régionale</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la Direction Régionale</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($directions as $direction)
                <tr>
                    <td>{{ $direction->id }}</td>
                    <td>{{ $direction->Nom_DR }}</td>
                    <td>
                        <a href="{{ route('direction_regionales.show', $direction->id) }}">Voir</a> | 
                        <a href="{{ route('direction_regionales.edit', $direction->id) }}">Modifier</a> | 
                        <form action="{{ route('direction_regionales.destroy', $direction->id) }}" method="POST" style="display:inline">
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
