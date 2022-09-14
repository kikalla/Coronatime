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
        <img class="w-[15%] mob:w-[50%] mob:mb-[10%]" src="/images/Coronatime.png" alt="title">
        <div class="flex flex-col items-center">
            <h2 class="font-extrabold text-center text-xl 2xl:text-4xl mb-[20%] mt-[60%]">Reset Password</h2>

            <form class="w-[150%]" action="{{route('store-user')}}" method="POST">
                @csrf
                <div class="flex flex-col mb-[15%] mob:my-[7%]">
                    <label class="font-bold" for="email">Email</label>
                    <input class="outline-none my-[1%] p-[3%] mob:p-[5%] border rounded-xl border-[#808189]" placeholder="Enter your email" type="text" name="email">
                    @error('email')
                    <p class="text-red-500 2xl:text-xl text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <button class="hover:scale-[99%] w-[100%] text-white font-extrabold rounded-xl bg-[#0FBA68] p-[3%] mb-[3%] mob:my-[5%] mob:p-[5%]" type="submit">RESET PASSWORD</button>
            </form>
        </div>
    </section>    
</body>
</html>