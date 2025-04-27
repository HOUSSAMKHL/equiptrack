<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Complexe</title>
    @extends('layouts.app')

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Détails du Complexe</h1>
    
    <table>
        <tr>
            <th>Nom du Complexe</th>
            <td>{{ $complexe->nom_complexe }}</td>
        </tr>
        @if($complexe->directionRegionale)
            <p><strong>Direction Régionale :</strong> {{ $complexe->directionRegionale->nom_direction_regionale }}</p>
        @else
            <p>Aucune direction régionale associée</p>
        @endif

    </table>
    
    <a href="{{ route('complexes.index') }}">Retour à la liste des complexes</a>
</body>
</html>
