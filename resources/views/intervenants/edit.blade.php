<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Intervenant</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier l'Intervenant</h1>
    <form action="{{ route('intervenants.update', $intervenant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nom_intervenant">Nom de l'Intervenant:</label>
            <input type="text" name="nom_intervenant" id="nom_intervenant" value="{{ old('nom_intervenant', $intervenant->nom_intervenant) }}" required>
        </div>
        <div>
            <label for="numero">Numéro:</label>
            <input type="text" name="numero" id="numero" value="{{ old('numero', $intervenant->numero) }}" required>
        </div>
        <div>
            <label for="societe">Société:</label>
            <input type="text" name="societe" id="societe" value="{{ old('societe', $intervenant->societe) }}" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <br>
    <a href="{{ route('intervenants.index') }}">Retour à la liste des intervenants</a>
</body>
</html>
