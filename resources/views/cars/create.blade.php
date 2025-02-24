<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cars.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="brand" :value="__('Brand')" />
                            <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="model" :value="__('Model')" />
                            <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('model')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="year" :value="__('Year')" />
                            <x-text-input id="year" name="year" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="color" :value="__('Color')" />
                            <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('color')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="daily_rate" :value="__('Daily Rate')" />
                            <x-text-input id="daily_rate" name="daily_rate" type="number" step="0.01" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('daily_rate')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="image_url" :value="__('Image URL')" />
                            <x-text-input id="image_url" name="image_url" type="url" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('image_url')" class="mt-2" />
                        </div>

                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_available" value="1" checked class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <span class="ml-2">Available for Rent</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Add Car') }}</x-primary-button>
                            <a href="{{ route('cars.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
