<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des EFPs</title>
    @extends('layouts.app')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
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
        <h1>Liste des EFPs</h1>

        <a href="{{ route('efps.create') }}" class="btn success">Ajouter un EFP</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'établissement</th>
                    <th>Adresse</th>
                    <th>Numéro</th>
                    <th>Email</th>
                    <th>Complexe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Efps as $efp)
                    <tr>
                        <td>{{ $efp->id }}</td>
                        <td>{{ $efp->nom_etablissement }}</td>
                        <td>{{ $efp->adresse }}</td>
                        <td>{{ $efp->numero }}</td>
                        <td>{{ $efp->email }}</td>
                        <td>{{ $efp->complexe->nom_complexe }}</td>
                        <td>
                            <a href="{{ route('efps.show', $efp->id) }}" class="btn info">Voir</a>
                            <a href="{{ route('efps.edit', $efp->id) }}" class="btn warning">Modifier</a>
                            <form action="{{ route('efps.destroy', $efp->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet EFP ?');">
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
