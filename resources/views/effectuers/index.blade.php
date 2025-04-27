<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Effectués</title>
    @extends('layouts.app')

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Liste des Effectués</h1>
    <a href="{{ route('effectuers.create') }}">Ajouter un enregistrement</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Exemplaire</th>
                <th>Opération</th>
                <th>Date de l'opération</th>
                <th>Durée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($effectuers as $effectuer)
                <tr>
                    <td>{{ $effectuer->id }}</td>
                    <td>{{ optional($effectuer->utilisateur)->nom ?? 'Utilisateur inconnu' }}</td>
                    <td>{{ optional($effectuer->equipementTracable)->nom_exemplaire ?? 'Exemplaire inconnu' }}</td>
                    <td>{{ optional($effectuer->operation)->nom_operation ?? 'Opération inconnue' }}</td>
                    <td>{{ $effectuer->date_operation }}</td>
                    <td>{{ $effectuer->durée }}</td>
                    <td>
                        <a href="{{ route('effectuers.show', $effectuer->id) }}">Voir</a> |
                        <a href="{{ route('effectuers.edit', $effectuer->id) }}">Modifier</a> |
                        <form action="{{ route('effectuers.destroy', $effectuer->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Aucun enregistrement trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
