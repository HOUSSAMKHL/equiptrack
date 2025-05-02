@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Fréquence</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

</head>
<body>
    <h1>Créer une Fréquence</h1>
    <form action="{{ route('frequences.store') }}" method="POST">
        @csrf
        <div>
            <label for="type_frequence">Type de Fréquence:</label>
            <input type="text" name="type_frequence" id="type_frequence" value="{{ old('type_frequence') }}" required>
        </div>
        <button type="submit">Créer</button>
    </form>
    <br>
    <a href="{{ route('frequences.index') }}">Retour à la liste des fréquences</a>
</body>
</html>
@endsection