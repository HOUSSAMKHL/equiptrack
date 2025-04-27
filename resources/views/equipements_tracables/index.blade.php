<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Équipements Tracables</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Équipements Tracables</h1>
    <a href="{{ route('equipements_tracables.create') }}">Ajouter un Équipement Tracable</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Statut</th>
                <th>Référence</th>
                <th>Année d'acquisition</th>
                <th>Valeur d'acquisition</th>
                <th>Atelier</th>
                <th>Équipement Identifié</th>
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
                        <a href="{{ route('equipements_tracables.edit', $equipement->id) }}">Modifier</a> |
                        <form action="{{ route('equipements_tracables.destroy', $equipement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>
