<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronatime</title>
</head>
<body class="flex 2xl:text-2xl text-xs">
    <section class="flex flex-col mt-[3%] mr-[20%] ml-[10%] w-[52%] px-[2%] mob:mx-[13%] mob:w-[100%] mob:mt-[10%]">
        <img class="w-[35%] mob:w-[50%] mob:mb-[10%]" src="images/Coronatime.png" alt="title">
        <div>
            <h2 class="font-bold text-xl 2xl:text-4xl my-[3%]">{{__('registerTranslation.welcome_to_coronatime')}}</h2>
            <p class="text-[#808189]">{{__('registerTranslation.enter_info_to_sign')}}</p>

            <form action="" method="POST">
                @csrf
                <div class="flex flex-col my-[6%] mob:my-[7%]">
                    <label class="font-bold" for="username">{{__('registerTranslation.username')}}</label>
                    <input value="{{ old('username') }}"  class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="{{__('registerTranslation.enter_username')}}" type="text" name="username">
                    <p class="text-[11px] 2xl:text-xl text-[#808189]">{{__('registerTranslation.username_unique')}}</p>
                    @error('username')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col my-[6%] mob:my-[7%]">
                    <label class="font-bold" for="email">{{__('registerTranslation.email')}}</label>
                    <input value="{{ old('email') }}" class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="{{__('registerTranslation.enter_email')}}" type="text" name="email">
                    @error('email')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col my-[6%] mob:my-[7%]">
                    <label class="font-bold" for="password">{{__('loginTranslation.password')}}</label>
                    <input class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="{{__('loginTranslation.fill_password')}}" type="password" name="password">
                    @error('password')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col my-[6%] mob:my-[7%]">
                    <label class="font-bold" for="password_confirmation">{{__('registerTranslation.repeat_password')}}</label>
                    <input class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="{{__('registerTranslation.repeat_password')}}" type="password" name="password_confirmation">
                    @error('password_confirmation')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <button class="hover:scale-[99%] w-[100%] text-white font-extrabold rounded-xl bg-[#0FBA68] p-[3%] mb-[3%] mob:my-[5%] mob:p-[5%]" type="submit">{{__('loginTranslation.sign_up')}}</button>
            </form>

            <div class="flex justify-center">
                <p>{{__('registerTranslation.have_account?')}}</p>
                <a class="ml-[1%] font-bold" href="{{route('login.show')}}">{{__('registerTranslation.log_in')}}</a>
            </div>
        </div>
    </section>    
    <img class="2xl:h-[1080px] w-[50%] lg:inline-block lg:h-[668px] mob:hidden" src="images/Vaccine.png" alt="photo">
</body>
</html>