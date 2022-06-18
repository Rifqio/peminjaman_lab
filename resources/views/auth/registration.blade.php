@extends('auth.layout.index')
@section('container')
<div class="h-full bg-gradient-to-tl from-blue-400 to-indigo-900 w-full py-16 px-4">
    <div class="flex flex-col items-center justify-center">
        <img src="/img/logo-uns.png" class="w-44" alt="logo">
        <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-10 mt-16">
            <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800">Create your new
                account</p>
            <p tabindex="0" class="focus:outline-none text-sm mt-4 font-medium leading-none text-gray-500">Already have
                an account? <a href="/masuk"
                    class="hover:text-gray-500 focus:text-gray-500 focus:outline-none focus:underline hover:underline text-sm font-medium leading-none  text-gray-800 cursor-pointer">
                    Sign in here</a></p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="w-full flex items-center justify-between py-5">
                    <hr class="w-full bg-gray-400">
                </div>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div>
                    <label id="email" class="text-sm font-medium leading-none text-gray-800">
                        Name
                    </label>
                    <input name="name" type="text" :value="old('name')" required
                        class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2" />
                </div>
                <div class="mt-4">
                    <label id="email" class="text-sm font-medium leading-none text-gray-800">
                        Email
                    </label>
                    <input name="email" type="email" :value="old('email')" required
                        class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2" />
                    <p class="text-xs text-gray-500 font-semibold capitalize">*Mahasiswa wajib menggunakan email SSO</p>
                </div>
                <div class="mt-4 w-full">
                    <label for="pass" class="text-sm font-medium leading-none text-gray-800">
                        Password
                    </label>
                    <div class="relative flex items-center justify-center">
                        <input id="pass" name="password" type="password" required
                            class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2" />
                        <div class="absolute right-0 mt-2 mr-3 cursor-pointer">
                            <img onclick="show()" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/sign_in-svg5.svg" alt="viewport">
                        </div>
                    </div>
                </div>
                <div class="mt-6  w-full">
                    <label for="pass" class="text-sm font-medium leading-none text-gray-800">
                        Repeat Password
                    </label>
                    <div class="relative flex items-center justify-center">
                        <input id="pass_confirmation" type="password" name="password_confirmation" required
                            class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2" />
                        <div class="absolute right-0 mt-2 mr-3 cursor-pointer">
                            <img onclick="show2()" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/sign_in-svg5.svg" alt="viewport">
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <button type="submit"
                        class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">Create
                        Account</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function show(){
        var x = document.getElementById("pass_confirmation");
        if (x.type === "password") {
        x.type = "text";
        }
        else {
        x.type = "password";
        }

    }
    function show2()
    {
        var y = document.getElementById("pass");
        if (y.type === "password") {
        y.type = "text";
        }
        else {
        y.type = "password";
        }
    }
</script>
@endsection
