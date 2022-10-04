<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-align: center;
            width: 100%;
            color: white;
            font-weight: 800;
            border-radius: 0.75rem;
            background-color: #0FBA68;
            padding: 4%;
            margin-top: 8%;
        }
        h2{
            font-weight: 800;
            text-align: center;
            font-size: 1.25rem;
            line-height: 1.75rem;
            margin-bottom: 8%;
            margin-top: 20%;

        }
        body{
            font-size: 00.75rem;
            line-height: 1rem;
        }
        section{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 4%;
            padding-left: 2%;
            padding-right: 2%;

        }
        img{
            width: 45%;

        }
        div{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        @media(min-width:320px) and (max-width:639px){
            section{
                margin-left: 3%;
                margin-right: 3%;
                margin-top: 10%;
            }
            img{
                width: 100%;
                margin-bottom: 10%;
            }
            a{
                margin-top: 5%;
                margin-bottom: 5%;
                padding: 5%;
            }
        }
        @media(min-width:1535px) { 
            body{
            font-size: 1.5rem;
            line-height: 2rem;
            }
            h2{
                font-size: 2.25rem;
                line-height: 2.5rem;
            }

        }
    </style>
</head>

<body>
    <section>
        <img src="{{ $message->embed(public_path() . '/images/Email-verification.png')}}" alt="title">
        <div>
            <h2>Confirmation email</h2>
            <p>click this button to verify your email</p>
            <a href="{{env('BACK_URL')}}/verify?code={{$email_data['verification_code']}}">VERIFY EMAIL</a>
        </div>
    </section>    
</body>
</html>

