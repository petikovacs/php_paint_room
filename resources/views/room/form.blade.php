<!DOCTYPE html>
<html>
<head>
    <title>Szoba Méretei</title>
</head>
<body>
<h1>Szoba Méretei</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('room.store') }}" method="POST">
    @csrf
    <label for="width">Szélesség:</label>
    <input type="text" id="width" name="width" value="{{ old('width') }}">
    @error('width')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <label for="length">Hosszúság:</label>
    <input type="text" id="length" name="length" value="{{ old('length') }}">
    @error('length')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <label for="height">Magasság:</label>
    <input type="text" id="height" name="height" value="{{ old('height') }}">
    @error('height')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <button type="submit">Tovább</button>
</form>
</body>
</html>
