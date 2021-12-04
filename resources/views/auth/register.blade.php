<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="img/logo-bg.png" alt="" style="width: 100%">
            </a>
        </x-slot>
        <!-- Success-->
        @if(session()->has('success'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
          {{ session('success')}}
        </div>
        @endif
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="text-center mb-3">
                <strong>Create Account for Health Administrator</strong>
            </div>
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')" />
                    
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Staff Id -->
            <div class="mt-4">
                <x-label for="staff_Id" :value="__('Staff ID')" />
                <x-input id="staff_Id" class="block mt-1 w-full" type="number" name="staff_Id" :value="old('staff_Id')" required/>
            </div>
            <!-- Centre Name -->
            <div class="mt-4">
                <x-label for="centre" :value="__('Centre Name')" />
                <select class="block mt-1 appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-3 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="centre">
                <option value="">Select Health Care Centre</option>
                @foreach($centre as $data)
                        <option value="{{$data->id}}">{{$data->centreName}}, {{$data->address}}</option>
                @endforeach
                </select>
                {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div> --}}
            </div>
           
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <p class="text-center mt-2">Helathcare Centre not available?</p>
        <div class="flex item-center justify-center mb-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" id="open-btn">
                Register Healhtcare Centre
            </a>
        </div>
        
        <div class="text-center">OR</div>
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('registerP') }}">
                {{ __('Register as Patient') }}
            </a>
        </div>
    </x-auth-card>
    
</x-guest-layout>

<!--Overlay Effect-->
<div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
<!--modal content-->
<div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
    <div class="mt-3 text-center">
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
              </svg>
        </div>
        <form class="w-full max-w-lg " action="/registerCentre" method="post">
            @csrf
            <h3 class="text-lg leading-6 font-medium text-gray-900">Register New Health Centre</h3>
            <div class="mt-2 px-7 py-3">
                    <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="centreName">
                        Helathcare Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="centreName" name="centreName" type="text" placeholder="Name">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                        Address
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" type="text" name="address" placeholder="Address">
                    </div>
                    </div>
                
            </div>
            <div class="items-center px-4 py-3">
                <button id="ok-btn" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                    OK
                </button>
            </div>
        </form>
    </div>
</div>
</div>
<script>
     // Grabs all the Elements by their IDs which we had given them
     let modal = document.getElementById("my-modal");

    let btn = document.getElementById("open-btn");

    let button = document.getElementById("ok-btn");

      // We want the modal to open when the Open button is clicked
    btn.onclick = function() {
    modal.style.display = "block";
    }
    // We want the modal to close when the OK button is clicked
    button.onclick = function() {
    modal.style.display = "none";
    }
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>
