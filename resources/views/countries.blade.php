<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="2xl:text-3xl text-base">
    <header class="flex justify-between mx-[5%] mt-[2%] mob:my-[4%] mob:justify-start ">
        <img class="w-[15%] mob:w-[30%] mob:mr-[10%]" src="images/Coronatime.png" alt="logo">
        <div class="flex mr-[5%] items-center mob:mr-[0%]">
            <select class="mob:w-[60px]" name="language" onchange="location = this.value">
                <option class="hidden">{{__('translation.language')}}</option>
                <option value="{{route('locale-change', 'en')}}">{{__('translation.english')}}</option>
                <option value="{{route('locale-change', 'ka')}}">{{__('translation.georgian')}}</option>
            </select>
            <h2 class="ml-[25%] mob:ml-[10%]">{{$user}}</h2>
            <form class="ml-[22%] mob:ml-[10%]" method="POST" action="{{route('user.logout')}}">
            @csrf
            <button type="submit">{{__('translation.logout')}}</button>
            </form>
        </div>
    </header>
    <div class="border-b-2 border-[#F6F6F7] mt-[1%]"></div>
    <section class="mx-[5%] mt-[2%] mob:mb-[5%] mob:mx-[0%]">
        <h2 class="font-bold text-xl 2xl:text-4xl mb-[2%] mob:mb-[5%] mob:mr-[4%] mob:ml-[5%]">{{__('translation.worldwide_statistics')}}</h2>
        <div class="flex">
            <div class="mr-[4%] mb-[2%] mob:mb-[5%] mob:mx-[5%]">
                <a class="" href="/">{{__('translation.worldwide')}}</a>
                <div class="border-b-4 border-black hidden"></div>
            </div>
            <div>
                <a class="font-bold" href="{{route('countries.show')}}">{{__('translation.by_country')}}</a>
                <div class="border-b-4 border-black"></div>
            </div>
        </div>

        <form method="GET" action="#">
            <div class="flex border rounded-lg 2xl:rounded-2xl border-[#E6E6E7] p-[0.8%] my-[1%] w-[20%] mob:w-auto mob:mb-[10px] mob:border-none">
                <img class="mx-[3%] w-[10%] mob:w-[6%]" src="images/SearchVector.svg" alt="search">
            <input type="text"
                    name="search"
                    placeholder="{{__('translation.search_country')}}"
                    class="w-[80%] focus:outline-none"
                    value="{{ request('search') }}">
            </div>
            
        </form>

        <table class="w-[100%] border border-[#F6F6F7]">
        <thead class="text-left mob:text-[14px]">
                <tr class="bg-[#F6F6F7]">
                    <th class="mob:text-xs text-left p-[1%] w-[19%]  whitespace-nowrap">@sortablelink('code', __('translation.by_country'))</th>
                    <th class="mob:text-xs text-left p-[1%] w-[22%]  whitespace-nowrap">@sortablelink('confirmed', __('translation.new_cases'))</th>
                    <th class="mob:text-xs text-left p-[1%] w-[23%]  whitespace-nowrap">@sortablelink('deaths', __('translation.death'))</th>
                    <th class="mob:text-xs text-left p-[1%] w-[25%]  whitespace-nowrap" >@sortablelink('recovered', __('translation.recovered'))</th>
                </tr>
            </thead>
        </table>

        <div class="overflow-y-auto lg:h-[320px] 2xl:h-[580px] mob:h-[410px]">
            <table class="w-[100%] border border-[#F6F6F7]"> 
                <tbody class="text-left">

                    <tr class="border-y border-[#F6F6F7]">
                        <td class="text-left mob:text-xs p-[1%] w-[25%] mob:p-[2%] ">{{__('translation.worldwide')}}</td>
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

