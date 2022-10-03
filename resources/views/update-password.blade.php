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
    <section class="flex flex-col items-center mt-[3%] px-[2%] mob:mx-[13%] mob:mt-[10%]">
        <img class="w-[15%] mob:w-[50%] mob:mb-[5%]" src="/images/Coronatime.png" alt="title">
        <div class="flex flex-col items-center w-[30%] mob:w-[100%]">
            <h2 class="font-extrabold text-center text-xl 2xl:text-4xl mb-[15%] mt-[30%] mob:mt-[20%]">Reset Password</h2>

            <form class="w-[100%]" action="" method="POST">
                @csrf
                
                <div class="flex flex-col mb-[5%] mob:my-[7%]">
                    <label class="font-bold" for="password">Password</label>
                    <input class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="Enter New Password" type="password" name="password">
                    @error('password')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-[5%] mob:my-[7%]">
                    <label class="font-bold" for="password_confirmation">Repeat password</label>
                    <input class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="Repeat password" type="password" name="password_confirmation">
                    @error('password_confirmation')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="hidden">
                    <input type="text" name="token" value="{{$token}}">
                </div>

                <div class="hidden">
                    <input type="text" name="email" value="{{request('email')}}">
                </div>

                <button class="hover:scale-[99%] w-[100%] text-white font-extrabold rounded-xl bg-[#0FBA68] p-[3%] mb-[3%] mob:my-[5%] mob:p-[5%]" type="submit">SAVE CHANGES</button>
            </form>
        </div>
    </section>    
</body>
</html>