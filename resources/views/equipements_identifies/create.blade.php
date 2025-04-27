<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Équipement Identifié</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Ajouter un Équipement Identifié</h1>
    <form action="{{ route('equipementIdentifies.store') }}" method="POST">
        @csrf
        <label for="nom_equipement">Nom de l'équipement :</label>
        <input type="text" name="nom_equipement" id="nom_equipement" required><br><br>

        <label for="secteur">Secteur :</label>
        <input type="text" name="secteur" id="secteur" required><br><br>

        <label for="id_categorie">Catégorie :</label>
        <select name="id_categorie" id="id_categorie" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom_categorie }}</option>
            @endforeach
        </select><br><br>

        <label for="id_frequence">Fréquence :</label>
        <select name="id_frequence" id="id_frequence" required>
            @foreach($frequences as $frequence)
                <option value="{{ $frequence->id }}">{{ $frequence->nom_frequence }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Ajouter</button>
    </form>

    <a href="{{ route('equipementIdentifies.index') }}">Retour à la liste des équipements</a>
</body>
</html>
