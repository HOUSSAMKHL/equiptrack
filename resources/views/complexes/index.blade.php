<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @extends('layouts.app')

    <title>Liste des Complexes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #e9ecef;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn.info {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn.success {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn.warning {
            background-color: #ffc107;
            color: black;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn.danger {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Liste des Complexes</h1>
        
        <a href="{{ route('complexes.create') }}" class="btn success">Ajouter un Complexe</a>

        <table>
            <thead>
                <tr>
                    <th>Numéro du Complexe</th>
                    <th>Direction Régionale</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complexes as $complexe)
                    <tr>
                        <td>{{ $complexe->nom_complexe }}</td>
                        <td>{{ $complexe->DirectionRegionale->Nom_DR ?? 'Non assignée' }}</td>
                        <td class="actions">
                            <a href="{{ route('complexes.show', $complexe->id) }}" class="btn info">Voir</a>
                            <a href="{{ route('complexes.edit', $complexe->id) }}" class="btn warning">Modifier</a>
                            <form action="{{ route('complexes.destroy', $complexe->id) }}" method="POST" style="display:inline;">
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
