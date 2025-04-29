<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Fréquences</title>
    @extends('layouts.app')

    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        a.btn, button.btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn.success {
            background-color: #28a745;
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
        .btn.info {
        background-color: #17a2b8;
        color: white;
    }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #e9ecef;
            font-weight: bold;
        }

        .inline-form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Liste des Fréquences</h1>

        <a href="{{ route('frequences.create') }}" class="btn success">Ajouter une Fréquence</a>

        <table>
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
                            <a href="{{ route('frequences.show', $frequence->id) }}" class="btn info">Voir</a> |
                            <a href="{{ route('frequences.edit', $frequence->id) }}" class="btn warning">Modifier</a> |
                            <form action="{{ route('frequences.destroy', $frequence->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette fréquence ?');">
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
