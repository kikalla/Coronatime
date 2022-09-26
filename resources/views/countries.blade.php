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
            <h2 class="ml-[25%] mob:ml-[10%]">{{$user->username}}</h2>
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
    <section class="mx-[5%] mt-[2%] mob:mb-[5%] mob:mx-[0%]">
        <h2 class="font-bold text-xl 2xl:text-4xl mb-[2%] mob:mb-[5%] mob:mx-[5%]">Worldwide Statistics</h2>
        <div class="flex">
            <div class="mr-[4%] mb-[2%] mob:mb-[5%] mob:mx-[5%]">
                <a class="" href="/">Worldwide</a>
                <div class="border-b-4 border-black hidden"></div>
            </div>
            <div>
                <a class="font-bold" href="/">By country</a>
                <div class="border-b-4 border-black"></div>
            </div>
        </div>


        <table class="w-[100%] border border-[#F6F6F7]">
        <thead class="text-left mob:text-[15px]">
                <tr class="bg-[#F6F6F7]">
                    <th class="text-left p-[1%] w-[25%] mob:p-[2%]">Location</th>
                    <th class="text-left p-[1%] w-[25%] mob:p-[2%]">New cases</th>
                    <th class="text-left p-[1%] w-[25%] mob:p-[2%]">Deaths</th>
                    <th class="text-left p-[1%] w-[25%] mob:p-[2%]" >Recovered</th>
                </tr>
            </thead>
        </table>

        <div class="overflow-y-auto lg:h-[320px] 2xl:h-[580px] mob:h-[430px]">
            <table class="w-[100%] border border-[#F6F6F7]"> 
                <tbody class="text-left">


                    <tr class="border-y border-[#F6F6F7]">
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%] ">Worldwide</td>
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%]">{{$confirmed}}</td>
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%]">{{$deaths}}</td>
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%]">{{$recovered}}</td>
                    </tr>
                    @foreach($countries as $country)
                    <tr class="border-y border-[#F6F6F7]">
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%]">{{$country->code}}</td>
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%]">{{$country->confirmed}}</td>
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%]">{{$country->deaths}}</td>
                        <td class="text-left p-[1%] w-[25%] mob:p-[2%]">{{$country->recovered}}</td>
                    </tr>
                    @endforeach

                    
                </tbody>
            </table>
        </div>

    </section>

</body>
</html>

