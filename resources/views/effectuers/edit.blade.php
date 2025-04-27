<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Effectuer</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier un Effectuer</h1>
    <form action="{{ route('effectuers.update', $effectuer->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <!-- Utilisateurs -->
        <label for="id_user">Utilisateur :</label>
        <select name="id_user" id="id_user" required>
            @foreach($utilisateurs as $utilisateur)
                <option value="{{ $utilisateur->id }}" {{ $utilisateur->id == $effectuer->id_user ? 'selected' : '' }}>
                    {{ $utilisateur->nom }}
                </option>
            @endforeach
        </select><br><br>
    
        <!-- Equipements -->
        <label for="id_exemplaire">Exemplaire :</label>
        <select name="id_exemplaire" id="id_exemplaire" required>
            @foreach($equipementsTracables as $equipement)
                <option value="{{ $equipement->id }}" {{ $equipement->id == $effectuer->id_exemplaire ? 'selected' : '' }}>
                    {{ $equipement->nom_exemplaire }}
                </option>
            @endforeach
        </select><br><br>
    
        <!-- Opérations -->
        <label for="id_operation">Opération :</label>
        <select name="id_operation" id="id_operation" required>
            @foreach($operations as $operation)
                <option value="{{ $operation->id }}" {{ $operation->id == $effectuer->id_operation ? 'selected' : '' }}>
                    {{ $operation->nom_operation }}
                </option>
            @endforeach
        </select><br><br>
    
        <!-- Date de l'opération -->
        <label for="date_operation">Date de l'opération :</label>
        <input type="date" name="date_operation" id="date_operation" value="{{ $effectuer->date_operation }}" required><br><br>
    
        <!-- Durée -->
        <label for="durée">Durée :</label>
        <input type="time" name="durée" id="durée" value="{{ $effectuer->durée }}" required><br><br>
    
        <button type="submit">Mettre à jour</button>
    </form>
    
    <a href="{{ route('effectuers.index') }}">Retour à la liste des Effectués</a>
</body>
</html>
