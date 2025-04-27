<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Intervenants</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Intervenants</h1>
    <a href="{{ route('intervenants.create') }}">Ajouter un Intervenant</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'Intervenant</th>
                <th>Numéro</th>
                <th>Société</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($intervenants as $intervenant)
                <tr>
                    <td>{{ $intervenant->id }}</td>
                    <td>{{ $intervenant->nom_intervenant }}</td>
                    <td>{{ $intervenant->numero }}</td>
                    <td>{{ $intervenant->societe }}</td>
                    <td>
                        <a href="{{ route('intervenants.show', $intervenant->id) }}">Voir</a> |
                        <a href="{{ route('intervenants.edit', $intervenant->id) }}">Modifier</a> |
                        <form action="{{ route('intervenants.destroy', $intervenant->id) }}" method="POST" style="display:inline;">
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
