<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="2xl:text-3xl text-base">
    <header class="flex justify-between mx-[5%] mt-[2%] mob:my-[4%] mob:justify-start ">
        <img class="w-[15%] mob:w-[30%] mob:mr-[20%]" src="images/Coronatime.png" alt="logo">
        <div class="flex mr-[5%] items-center mob:mr-[0%]">
            <select class="mob:w-[30%]" name="language">
                <option value="en">En</option>
                <option value="ka">Georgian</option>
            </select>
            <h2 class="ml-[25%] mob:ml-[10%]">{{$user}}</h2>
            @guest
            <a class="ml-[25%] mob:ml-[10%]" href="{{route('login.show')}}">Login</a>
            @endguest
            
            @auth
            <form class="ml-[22%] mob:ml-[10%]" method="POST" action="{{route('user.logout')}}">
            @csrf
            <button type="submit">Logout</button>
            </form>
            @endauth
        </div>
    </header>
    <div class="border-b-2 border-[#F6F6F7] mt-[1%]"></div>
    <section class="mx-[5%] mt-[2%] mob:mb-[5%]">
        <h2 class="font-bold text-xl 2xl:text-4xl mb-[2%] mob:mb-[5%]">Worldwide Statistics</h2>
        <div class="flex">
            <div class="mr-[4%] mb-[5%]">
                <a class="font-bold " href="">Worldwide</a>
                <div class="border-b-4 border-black"></div>
            </div>
            <div>
                <a class="" href="{{route('countries.show')}}">By country</a>
                <div class="border-b-4 border-black hidden"></div>
            </div>
        </div>
        <div class="flex items-center justify-center 2xl:h-[300px] lg:h-[200px] mob:flex-col">
            <div class="w-[30%] h-[100%] bg-opacity-[8%] rounded-md bg-[#2029F3] flex flex-col justify-center items-center mob:w-[90%] mob:mb-[10px] mob:py-[3%] mob:h-[155px] ">
                <img class="w-[30%]" src="images/Vector1.svg" alt="vector">
                <p class="my-[4%]">New cases</p>
                <p class="font-black text-3xl 2xl:text-5xl text-[#2029f3]">{{$confirmed}}</p>
            </div>
            <div class="w-[30%] h-[100%] bg-opacity-[8%] rounded-md mx-[2%] bg-[#0FBA68] flex flex-col justify-center items-center mob:w-[90%] mob:mb-[10px] mob:py-[3%] mob:h-[155px] ">
                <img class="w-[30%]" src="images/Vector2.svg" alt="vector">
                <p class="my-[4%]">Recovered</p>
                <p class="font-black text-3xl 2xl:text-5xl text-[#0FBA68]">{{$recovered}}</p>
            </div>
            <div class="w-[30%] h-[100%] bg-opacity-[8%] rounded-md bg-[#EAD621] flex flex-col justify-center items-center mob:w-[90%] mob:mb-[10px] mob:py-[3%] mob:h-[155px] ">
                <img class="w-[30%]" src="images/Vector3.svg" alt="vector">
                <p class="my-[4%]">Death</p>
                <p class="font-black text-3xl 2xl:text-5xl text-[#EAD621]">{{$deaths}}</p>
            </div>
        </div>
    </section>

</body>
</html>

