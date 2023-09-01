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
            <span class="value" style="display: block; max-width: 700px">{{$applicationData['first_name']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Soyad:</span>
            <span class="value" style="display: block; max-width: 700px">{{$applicationData['last_name']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Ata adı:</span>
            <span class="value" style="display: block; max-width: 700px">{{$applicationData['father_name']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Email:</span>
            <span class="value" style="display: block; max-width: 700px">{{$applicationData['email']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Nömrə:</span>
            <span class="value" style="display: block; max-width: 700px">{{$applicationData['phone']}}</span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Linkedin:</span>
            <span class="value" style="display: block; max-width: 700px"><a href="{{$applicationData['linkedin_url']}}">{{$applicationData['linkedin_url']}}</a></span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">CV:</span>
            <span class="value" style="display: block; max-width: 700px"><a href="{{asset('uploads/applications/cv/'.$applicationData['cv'])}}">{{$applicationData['cv']}}</a></span>
        </div>
        <div class="row" style="padding: 12px 0;border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: flex-start; align-items: center;">
            <span class="label" style="display: block; min-width: 200px; font-weight: 600;">Vəzifə:</span>
            <span class="value" style="display: block; max-width: 700px">{{$applicationData['vacancy']}}</span>
        </div>
    </div>
</body>
</html>
