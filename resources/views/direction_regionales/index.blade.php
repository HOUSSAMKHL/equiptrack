<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Directions Régionales</title>
    @extends('layouts.app')
</head>

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

<body class="bg-light">
    <div class="container">
        <h1>Liste des Directions Régionales</h1>
        
        <a href="{{ route('direction_regionales.create') }}" class="btn success">Ajouter une Direction Régionale</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de la Direction Régionale</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($directionRegionale as $direction)
                    <tr>
                        <td>{{ $direction->id }}</td>
                        <td>{{ $direction->Nom_DR }}</td>
                        <td>
                            <a href="{{ route('direction_regionales.show', $direction->id) }}" class="btn info">Voir</a>
                            <a href="{{ route('direction_regionales.edit', $direction->id) }}" class="btn warning">Modifier</a>
                            <form action="{{ route('direction_regionales.destroy', $direction->id) }}" method="POST" class="inline-form">
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
