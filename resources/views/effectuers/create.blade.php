<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Effectuer</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Ajouter un Effectuer</h1>
    <form action="{{ route('effectuers.store') }}" method="POST">
        @csrf
        <label for="id_user">Utilisateur :</label>
        <select name="id_user" id="id_user">
            @foreach($utilisateurs as $utilisateur)
                <option value="{{ $utilisateur->id }}">{{ $utilisateur->nom }}</option>
            @endforeach
        </select><br><br>

        <label for="id_exemplaire">Exemplaire :</label>
        <select name="id_exemplaire" id="id_exemplaire">
            @foreach($equipementsTracables as $equipement)
                <option value="{{ $equipement->id }}">{{ $equipement->nom_exemplaire }}</option>
            @endforeach
        </select><br><br>

        <label for="id_operation">Opération :</label>
        <select name="id_operation" id="id_operation">
            @foreach($operations as $operation)
                <option value="{{ $operation->id }}">{{ $operation->nom_operation }}</option>
            @endforeach
        </select><br><br>

        <label for="date_operation">Date de l'opération :</label>
        <input type="date" name="date_operation" id="date_operation" required><br><br>

        <label for="durée">Durée :</label>
        <input type="time" name="durée" id="durée" required><br><br>

        <button type="submit">Ajouter</button>
    </form>

    <a href="{{ route('effectuers.index') }}">Retour à la liste des Effectués</a>
</body>
</html>
