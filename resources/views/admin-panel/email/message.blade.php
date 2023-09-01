<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container" style="padding: 12px 0;">
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Ad:</span>
            <span class="value" style="display: block; max-width: 700px">{{$msg['name']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Email:</span>
            <span class="value" style="display: block; max-width: 700px">{{$msg['email']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Nömrə:</span>
            <span class="value" style="display: block; max-width: 700px">{{$msg['phone']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Mövzu:</span>
            <span class="value" style="display: block; max-width: 700px">{{$msg['subject']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Mesaj:</span>
            <span class="value" style="display: block; max-width: 700px">{{$msg['text']}}</span>
        </div>
    </div>
</body>
</html>
