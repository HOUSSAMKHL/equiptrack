<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Ateliers</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Liste des Ateliers</h1>
    <a href="{{ route('ateliers.create') }}">Ajouter un atelier</a>
    <table border="1">
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
                    <td>
                        {{ $atelier->efp ? $atelier->efp->nom_etablissement : 'Aucun établissement' }}
                    </td>
                                        <td>
                        <a href="{{ route('ateliers.show', $atelier->id) }}">Voir</a> |
                        <a href="{{ route('ateliers.edit', $atelier->id) }}">Modifier</a> |
                        <form action="{{ route('ateliers.destroy', $atelier->id) }}" method="POST" style="display:inline">
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
