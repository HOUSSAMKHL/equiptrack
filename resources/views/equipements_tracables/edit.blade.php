@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Équipement Tracable</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Modifier un Équipement Tracable</h1>

    <form action="{{ route('equipements_tracables.update', $equipementTracable->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="statut">Statut</label>
        <input type="text" name="statut" id="statut" value="{{ old('statut', $equipementTracable->statut) }}" required>

        <label for="reference">Référence</label>
        <input type="text" name="reference" id="reference" value="{{ old('reference', $equipementTracable->reference) }}" required>

        <label for="annee_dacquisition">Année d'acquisition</label>
        <input type="number" name="annee_dacquisition" id="annee_dacquisition" value="{{ old('annee_dacquisition', $equipementTracable->annee_dacquisition) }}" required>

        <label for="valeur_dacquisition">Valeur d'acquisition</label>
        <input type="number" name="valeur_dacquisition" id="valeur_dacquisition" value="{{ old('valeur_dacquisition', $equipementTracable->valeur_dacquisition) }}" required>

        <label for="id_atelier">Atelier</label>
        <select name="id_atelier" id="id_atelier" required>
            @foreach($ateliers as $atelier)
                <option value="{{ $atelier->id }}" {{ old('id_atelier', $equipementTracable->id_atelier) == $atelier->id ? 'selected' : '' }}>{{ $atelier->numero_atelier }}</option>
            @endforeach
        </select>

        <label for="id_equipement">Équipement Identifié</label>
        <select name="id_equipement" id="id_equipement" required>
            @foreach($equipementIdentifie as $equipement)
                <option value="{{ $equipement->id }}" {{ old('id_equipement', $equipementTracable->id_equipement) == $equipement->id ? 'selected' : '' }}>{{ $equipement->nom_equipement }}</option>
            @endforeach
        </select>

        <button type="submit">Mettre à jour</button>
    </form>

</body>
</html>
@endsection