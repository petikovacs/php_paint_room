<!DOCTYPE html>
<html>
<head>
    <title>Eredmények</title>
</head>
<body>
<h1>Eredmények</h1>
<p>A szoba falai nyílászárók nélkül {{ $roomArea }} m² felületűek.</p>
<p>Összesen {{ $windowCount }} darab nyílászáró van a helyiségen.</p>
<p>Ezek {{ $totalWindowArea }} m²-t foglalnak el.</p>
<p>Összesen {{ $remainingArea }} m² marad.</p>

<form action="{{ route('result') }}" method="GET">
    <label for="paint">Válasszon festéket:</label>
    <select name="paint_id" id="paint">
        @foreach ($paints as $paint)
            <option value="{{ $paint->id }}" {{ $selectedPaint && $selectedPaint->id == $paint->id ? 'selected' : '' }}>
                {{ $paint->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Frissít</button>
</form>

@if ($selectedPaint)
    <p>A kiválasztott festék: {{ $selectedPaint->name }}</p>
    <p>A szükséges festékmennyiség: {{ $requiredPaintLiters }} liter</p>
@endif
</body>
</html>
