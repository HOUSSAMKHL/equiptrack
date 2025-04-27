<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @extends('layouts.app')

    <title>Liste des complexes</title>
</head>
<body>
    <h1>Liste des complexes</h1>
    <table>
        <thead>
            <tr>
                <th>Numéro du complexe</th>
                <th>Direction régionale</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complexes as $complexe)
                <tr>
                    <td>{{ $complexe->nom_complexe }}</td>
                    <td>{{ $complexe->directionRegionale->nom_direction_regionale ?? 'Non assignée' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
