<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronatime</title>
</head>
<body style=" font-size: 00.75rem;
            line-height: 1rem;">
    <section style="display: inline-block;
            align-items: center; width: 100%">
        <div style="width: 40%; margin: auto">
            <img style="display:block; width: 100%" src="{{ $message->embed(public_path() . '/images/Email-verification.png')}}" alt="title">
        <div style="display: inline-block;
            vertical-align: middle;
            align-items: center;
            width: 100%;">
            <h2 style="
            display: block;
            font-weight: 800;
            text-align: center;
            font-size: 1.25rem;
            line-height: 1.75rem;
            margin-bottom: 8%;
            margin-top: 20%;">Recover password</h2>
            <p style="text-align: center;">click this button to recover a password</p>
            <a style="display:block; text-align: center;
            color: white;
            font-weight: 800;
            border-radius: 0.75rem;
            background-color: #0FBA68;
            padding: 4%;
            margin-top: 8%;" href="{{$url}}">RECOVER PASSWORD</a>
        </div>
        </div>
    </section>
</body>
</html>