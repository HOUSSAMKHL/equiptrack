<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Équipements Identifiés</title>
    @extends('layouts.app')

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
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

    <div class="wrapper">
        <h1>Liste des Équipements Identifiés</h1>

        <a href="{{ route('equipements_identifies.create') }}" class="btn success">Ajouter un Équipement</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'équipement</th>
                    <th>Secteur</th>
                    <th>Catégorie</th>
                    <th>Fréquence</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipements_identifies as $equipement)
                    <tr>
                        <td>{{ $equipement->id }}</td>
                        <td>{{ $equipement->nom_equipement }}</td>
                        <td>{{ $equipement->secteur }}</td>
                        <td>{{ $equipement->categorie->nom_categorie }}</td>
                        <td>{{ optional($equipement->frequence)->type_frequence ?? 'Fréquence non définie' }}</td>
                        <td>
                            <a href="{{ route('equipements_identifies.show', $equipement->id) }}" class="btn info">Voir</a>
                            <a href="{{ route('equipements_identifies.edit', $equipement->id) }}" class="btn warning">Modifier</a>
                            <form action="{{ route('equipements_identifies.destroy', $equipement->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
