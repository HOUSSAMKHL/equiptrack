@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Fréquence</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Modifier la Fréquence</h1>
    <form action="{{ route('frequences.update', $frequence->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="type_frequence">Type de Fréquence:</label>
            <input type="text" name="type_frequence" id="type_frequence" value="{{ old('type_frequence', $frequence->type_frequence) }}" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <br>
    <a href="{{ route('frequences.index') }}">Retour à la liste des fréquences</a>
</body>
</html>
@endsection
