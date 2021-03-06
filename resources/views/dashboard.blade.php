<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Select the Menu: 
                    <div class="flex items-center justify-center mt-4">
                        <x-button>
                            <a href="">Record New Batch</a> 
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
