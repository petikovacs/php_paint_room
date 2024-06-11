<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: yellowgreen; border-radius: 10px;">
<h1>Szoba dimenziók</h1>
<form action="/nyilaszarok" method="post">
<div class="d-flex" style="border: 5px solid black;border-radius: 10px;width:300px">

    <div class="d-flex" style="margin:10px;padding:2px;">
        <label for="#hossz">Hosszúság</label>
        <input type="text" id="hossz" name="hossz">
    </div>
    <div class="d-flex" style="margin:10px;padding:2px;">
        <label for="#szel">Szélesség</label>
        <input type="text" id="szel" name="szel">
    </div>
    <div class="d-flex" style="margin:10px;padding:2px;">
        <label for="#mag">Magasság</label>
        <input type="text" id="max" name="mag">
    </div>
    <div class="d-flex" style="margin:10px;">
    <button type="submit">Küldés</button>
    </div>
</div>
</form>
</body>
</html>
