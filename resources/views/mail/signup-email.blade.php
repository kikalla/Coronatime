<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="2xl:text-2xl text-xs">
    <section class="flex flex-col items-center mt-[4%] px-[2%] mob:mx-[3%] mob:mt-[10%]">
        <img class="w-[45%] mob:w-[100%] mob:mb-[10%]" src="/images/Email-verification.png" alt="title">
        <div class="flex flex-col items-center">
            <h2 class="font-extrabold text-center text-xl 2xl:text-4xl mb-[8%] mt-[20%]">Confirmation email</h2>
            <p>click this button to verify your email</p>
            <a class="text-center hover:scale-[99%] w-[100%] text-white font-extrabold rounded-xl bg-[#0FBA68] p-[4%] mt-[8%] mob:my-[5%] mob:p-[5%]" href="http://127.0.0.1:8000/verify?code={{$email_data['verification_code']}}">VERIFY EMAIL</a>
        </div>
    </section>    
</body>
</html>

