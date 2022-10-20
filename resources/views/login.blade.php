<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="flex 2xl:text-2xl text-xs">
    <section class="flex flex-col mt-[3%] mr-[20%] ml-[10%] w-[52%] px-[2%] mob:mx-[13%] mob:w-[100%] mob:mt-[10%]">
        <img class="w-[35%] mob:w-[50%] mob:mb-[10%]" src="images/Coronatime.png" alt="title">
        <div>
            <h2 class="font-bold text-xl 2xl:text-4xl my-[3%]">{{__('loginTranslation.welcome_back')}}</h2>
            <p class="text-[#808189]">{{__('loginTranslation.welcome_back_enter_details')}}</p>

            <form action="" method="POST">
                @csrf
                <div class="flex flex-col my-[5%] mob:my-[7%]">
                    <label class="font-bold" for="login_id">{{__('loginTranslation.email_username')}}</label>
                    <input class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="{{__('loginTranslation.enter_email_username')}}" type="text" name="login_id">
                    @error('login_id')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col my-[5%] mob:my-[7%]">
                    <label class="font-bold" for="password">{{__('loginTranslation.password')}}</label>
                    <input class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="{{__('loginTranslation.fill_password')}}" type="password" name="password">
                    @error('password')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                    @if ($message = Session::get('error'))
                        <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @endif
                </div>

                <div class="flex items-center justify-between my-[5%]">
                    <div class="flex">
                        <input class="mr-[2%] w-[15%] 2xl:w-[25px]" type="checkbox" name="remember">
                        <label class="font-bold mob:p-[3%] whitespace-nowrap" for="remember">{{__('loginTranslation.remember_device')}}</label>
                    </div>
                    <a href="{{route('forgot-password.show')}}" class="text-[#2029F3] font-extrabold whitespace-nowrap">{{__('loginTranslation.forgot_password?')}}</a>
                </div>
                
                <button class="hover:scale-[99%] w-[100%] text-white font-extrabold rounded-xl bg-[#0FBA68] p-[3%] mb-[3%] mob:my-[5%] mob:p-[5%]" type="submit">{{__('loginTranslation.login')}}</button>
            </form>

            <div class="flex justify-center whitespace-nowrap">
                <p>{{__('loginTranslation.Don’t_have_account?')}}</p>
                <a class="ml-[1%] font-bold " href="{{route('user.create')}}">{{__('loginTranslation.sign_up_free')}}</a>
            </div>
        </div>
    </section>    
    <img class="2xl:h-[1080px] w-[50%] lg:inline-block lg:h-[668px] mob:hidden" src="images/Vaccine.png" alt="photo">
</body>
</html>