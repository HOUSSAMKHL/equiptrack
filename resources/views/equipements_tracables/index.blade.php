<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Équipements Traçables</title>
    @extends('layouts.app')

    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 1200px;
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
        .btn.info {
    background-color: #17a2b8;
    color: white;
}

        .btn.danger {
            background-color: #dc3545;
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
        <h1>Liste des Équipements Traçables</h1>

        <a href="{{ route('equipements_tracables.create') }}" class="btn success">Ajouter un Équipement Traçable</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Statut</th>
                    <th>Référence</th>
                    <th>Année d'acquisition</th>
                    <th>Valeur d'acquisition</th>
                    <th>Atelier</th>
                    <th>Nom Équipement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipements_tracables as $equipement)
                    <tr>
                        <td>{{ $equipement->id }}</td>
                        <td>{{ $equipement->statut }}</td>
                        <td>{{ $equipement->reference }}</td>
                        <td>{{ $equipement->annee_dacquisition }}</td>
                        <td>{{ $equipement->valeur_dacquisition }}</td>
                        <td>{{ $equipement->atelier->numero_atelier ?? 'Atelier non défini' }}</td>
                        <td>{{ optional($equipement->equipementIdentifie)->nom_equipement ?? 'Équipement non défini' }}</td>
                        <td>
                            <a href="{{ route('equipements_tracables.show', $equipement->id) }}" class="btn info">Voir</a>
                            <a href="{{ route('equipements_tracables.edit', $equipement->id) }}" class="btn warning">Modifier</a>
                            <form action="{{ route('equipements_tracables.destroy', $equipement->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?');">
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
