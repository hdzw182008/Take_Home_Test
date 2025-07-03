<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body>
<!-- component -->
<!--
  UI Design Prototype
  Link : https://dribbble.com/shots/10452538-React-UI-Components
-->
@if (session()->has('success'))
        <div role="alert" class="mt-3 relative flex w-full p-3 text-sm text-white bg-green-600 rounded-md" id="alert">
                  {{ session('success') }}
            <button class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5" type="button" onclick="return this.parentNode.remove();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        </div>
        @endif
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
      <div class="max-w-md mx-auto">
          <h1 class="text-xl text-center">Login</h1>
          <form action="{{ route('loginProses')  }}" method="post">
            @csrf
        <div class="divide-y divide-gray-200">
          <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="flex flex-col">
              <label class="leading-loose">Event Title</label>
              <input type="text" name="email" placeholder="email" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
               @error('email') 
                        <small>{{$message}}</small>
              @enderror
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Event Subtitle</label>
              <input type="password" name="password" placeholder="password" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
              @error('password') 
                        <small>{{$message}}</small>
              @enderror
            </div>
            <div class="flex items-center space-x-4">
            </div>
          </div>
          <div class="pt-4 flex items-center space-x-4">
              <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
          </div>
          </form>
          <small><i>email: admin_123@test.com | password: 12345678</i></small>
        </div>
      </div>
    </div>
  </div>
</div>

  </body>
</html>