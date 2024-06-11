<!DOCTYPE html>
<html>
<head>
    <title>Nyílászáró Méretei</title>
</head>
<body>
<h1>Nyílászáró Méretei</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('window.store') }}" method="POST">
    @csrf
    <label for="width">Szélesség:</label>
    <input type="text" id="width" name="width" value="{{ old('width') }}">
    @error('width')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <label for="height">Magasság:</label>
    <input type="text" id="height" name="height" value="{{ old('height') }}">
    @error('height')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <button type="submit">Hozzáad</button>
</form>

@if ($windows)
    <h2>Méretek:</h2>
    <table border="1">
        <tr>
            <th>Szélesség</th>
            <th>Magasság</th>
        </tr>
        @foreach ($windows as $window)
            <tr>
                <td>{{ $window['width'] }}</td>
                <td>{{ $window['height'] }}</td>
            </tr>
        @endforeach
    </table>
@endif

<a href="{{ route('result') }}">Tovább</a>
</body>
</html>
