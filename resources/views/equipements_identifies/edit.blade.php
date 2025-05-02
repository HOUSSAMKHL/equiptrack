@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Équipement Identifié</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Modifier un Équipement Identifié</h1>
    <form action="{{ route('equipements_identifies.update', $equipementIdentifie) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom_equipement">Nom de l'équipement :</label>
        <input type="text" name="nom_equipement" id="nom_equipement" value="{{ $equipementIdentifie->nom_equipement }}" required><br><br>

        <label for="secteur">Secteur :</label>
        <input type="text" name="secteur" id="secteur" value="{{ $equipementIdentifie->secteur }}" required><br><br>

        <label for="id_categorie">Catégorie :</label>
        <select name="id_categorie" id="id_categorie" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ $equipementIdentifie->id_categorie == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom_categorie }}</option>
            @endforeach
        </select><br><br>

        <label for="id_frequence">Fréquence :</label>
        <select name="id_frequence" id="id_frequence" required>
            @foreach($frequences as $frequence)
                <option value="{{ $frequence->id }}" {{ $equipementIdentifie->id_frequence == $frequence->id ? 'selected' : '' }}>{{ $frequence->type_frequence }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('equipements_identifies.index') }}">Retour à la liste des équipements</a>
</body>
</html>
@endsection
