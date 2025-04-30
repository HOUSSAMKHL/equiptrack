<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Ateliers</title>
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
        <h1>Liste des Ateliers</h1>

        <a href="{{ route('ateliers.create') }}" class="btn success">Ajouter un atelier</a>

        <table>
            <thead>
                <tr>
                    <th>Numéro d'atelier</th>
                    <th>Établissement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ateliers as $atelier)
                    <tr>
                        <td>{{ $atelier->numero_atelier }}</td>
                        <td>{{ $atelier->efp ? $atelier->efp->nom_etablissement : 'Aucun établissement' }}</td>
                        <td class="actions">
                            <a href="{{ route('ateliers.show', $atelier->id) }}" class="btn info">Voir</a>
                            <a href="{{ route('ateliers.edit', $atelier->id) }}" class="btn warning">Modifier</a>
                            <form action="{{ route('ateliers.destroy', $atelier) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?')">
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
