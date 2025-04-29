<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Effectués</title>
    @extends('layouts.app')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
        }

        a.btn,
        button.btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn.success {
            background-color: #28a745;
            color: white;
            border-radius: 9px;
        }

        .btn.info {
            background-color: #17a2b8;
            color: white;
        }

        .btn.warning {
            background-color: #ffc107;
            color: black;
        }

        .btn.danger {
            background-color: #dc3545;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #e9ecef;
        }

        .inline-form {
            display: inline;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container">
        <h1>Liste des Effectués</h1>

        <a href="{{ route('effectuers.create') }}" class="btn success">Ajouter un enregistrement</a>

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
                        <td>{{ optional($effectuer->utilisateur)->nom_user ?? 'Utilisateur inconnu' }}</td>
                        <td>{{ optional($effectuer->equipementTracable->equipementIdentifie)->nom_equipement ?? 'Exemplaire inconnu' }}</td>
                        <td>{{ optional($effectuer->operation)->nom_operation ?? 'Opération inconnue' }}</td>
                        <td>{{ $effectuer->date_operation }}</td>
                        <td>{{ $effectuer->durée }}</td>
                        <td>
                            <a href="{{ route('effectuers.show', $effectuer->id) }}" class="btn info">Voir</a>
                            <a href="{{ route('effectuers.edit', $effectuer->id) }}" class="btn warning">Modifier</a>
                            <form action="{{ route('effectuers.destroy', $effectuer->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn danger">Supprimer</button>
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
    </div>

</body>
</html>
