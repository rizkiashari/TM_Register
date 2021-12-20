<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
  @if ($errors->any())
    <div x-data="{ open: true }" :class="{'flex': open, 'hidden': !open}" x-open="open" x-init="setTimeout(() => open = false, 3500)"  role="alert">
      <div class="bg-[#f8d7da] border-[2px] w:-[100px] sm:w-[350px] md:w-[600px] border-[#f5c2c7] text-[#842029] px-10 py-3 rounded absolute top-[7em] left-[50%] translate-x-[-50%]">
        <span class="absolute left-0 top-0 px-4 py-3">
          <svg @click="open = !open" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
        <div class="flex flex-col ml-4">
          <strong class="font-bold text-[10px] sm:text-[12px] md:text-[16px] md:w-[400px] w-[300px]">There were {{ count($errors) }} errors with your submission</strong>
          <ul class="mt-2">
            @foreach ($errors->all() as $error)
              <li class="text-[10px] sm:text-[12px] md:text-[16px]">{{ $error }}</li>
            @endforeach
          </ul> 
        </div> 
      </div>
    </div>
  @endif
  <div class="flex w-full h-screen">
    <div class="px-2 py-4 w-full hidden md:flex h-full bg-slate-900">
      <img src="/ilustration.svg" class="object-cover" />
    </div>
    <div class="px-8 py-4 w-full mx-auto flex flex-col justify-center h-full bg-slate-700">
      <p class="text-[16px] mt-4 text-white mx-auto font-semibold md:text-[24px]">Register Page</p>
      <form action="/register" method="POST">
        @csrf
        <div class="mb-4">
          <label class="capitalize text-white text-[14px]">Full Name</label>
          <input class="w-full h-full mt-1 text-[#111827] text-[12px] rounded pl-[12px] py-2" type="text" name="fullname" value="{{ old('fullname') }}">
        </div>
        <div class="mb-4">
          <label class="capitalize text-white text-[14px]">Email</label>
          <input class="w-full h-full mt-1 text-[#111827] text-[12px] rounded pl-[12px] py-2" type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
          <label class="capitalize text-white text-[14px]">Password</label>
          <input class="w-full h-full mt-1 text-[#111827] text-[12px] rounded pl-[12px] py-2" type='password' name="password">
        </div>
        <button class="w-full bg-[#4F46E5] mt-8 text-white hover:bg-[#3e37c7] rounded py-2 text-[14px]">Register</button>
        <div class="flex mt-3 justify-end">
          <a href="/login" class="text-[#9590fd] text-[12px]">Already have an account?</a> 
        </div>
      </form>
    </div>
  </div>
</body>
</html>