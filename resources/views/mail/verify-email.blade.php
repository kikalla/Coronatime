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
    <section class="flex flex-col items-center mt-[4%] mob:mx-[3%] mob:mt-[10%]">
        <img class="w-[15%] mob:w-[50%] mob:mb-[10%]" src="/images/Coronatime.png" alt="title">
        <img class="w-[4%] mb-[3%] mt-[12%] mob:w-[20%] mob:mb-[10%]" src="/images/Checked.png" alt="title">
        <div class="flex flex-col items-center">
            <p>Verify Email First</p>
        </div>
        @auth
            <form method="POST" action="{{route('user.logout')}}">
            @csrf
            <button class="mt-[20%] p-[15%] hover:scale-[99%] text-white font-extrabold rounded-xl bg-[#0FBA68]" type="submit">Logout</button>
            </form>
        @endauth
    </section>    
</body>
</html>

