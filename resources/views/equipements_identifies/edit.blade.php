<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Équipement Identifié</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier un Équipement Identifié</h1>
    <form action="{{ route('equipementIdentifies.update', $equipement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom_equipement">Nom de l'équipement :</label>
        <input type="text" name="nom_equipement" id="nom_equipement" value="{{ $equipement->nom_equipement }}" required><br><br>

        <label for="secteur">Secteur :</label>
        <input type="text" name="secteur" id="secteur" value="{{ $equipement->secteur }}" required><br><br>

        <label for="id_categorie">Catégorie :</label>
        <select name="id_categorie" id="id_categorie" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ $equipement->id_categorie == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom_categorie }}</option>
            @endforeach
        </select><br><br>

        <label for="id_frequence">Fréquence :</label>
        <select name="id_frequence" id="id_frequence" required>
            @foreach($frequences as $frequence)
                <option value="{{ $frequence->id }}" {{ $equipement->id_frequence == $frequence->id ? 'selected' : '' }}>{{ $frequence->nom_frequence }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('equipementIdentifies.index') }}">Retour à la liste des équipements</a>
</body>
</html>
