<x-app-layout>
  <section class="bg-white py-4">
    <div class="py-4 px-4 mx-auto max-w-3xl lg:py-8 border border-petconnect-color rounded-lg shadow-md">
      <h2 class="mb-4 text-xl font-bold text-gray-900">Create a new adoption</h2>
      <div class="flex flex-col items-center"> <!-- Contenedor centrado -->
        <img class="object-cover w-full rounded-md-lg h-40 md:w-48 md:rounded-lg"
          src="{{ $animal->image ? asset('storage/' . $animal->image) : asset("img/default_animals/$animal->type.png") }}"
          alt="photo">
        <h1 class="mt-4 text-2xl font-semibold text-gray-800">{{ $animal->name }}</h1>
      </div>
      <form method="post" action="{{ route('adoptions.index', ['animalId' => $animal->id]) }}">
        @csrf
        <div class="mt-6">
          <x-input-label for="adopter_email" :value="__('Adopter email')" />
          <x-text-input id="adopter_email" class="block mt-1 w-full" type="email" name="adopter_email" />
        </div>
        <div class="mt-4">
          <x-input-label for="adopter_name" :value="__('Adopter name')" />
          <x-text-input id="adopter_name" class="block mt-1 w-full" type="text" name="adopter_name" />
        </div>
        <div class="mt-4">
          <x-input-label for="adopter_lastname" :value="__('Adopter lastname')" />
          <x-text-input id="adopter_lastname" class="block mt-1 w-full" type="text" name="adopter_lastname" />
        </div>
        <div class="mt-4">
          <x-input-label for="adopter_adress" :value="__('Adopter address')" />
          <x-text-input id="adopter_address" class="block mt-1 w-full" type="text" name="adopter_address" />
        </div>
        <div class="mt-4">
          <x-input-label for="adopter_phone_number" :value="__('Adopter phone number')" />
          <x-text-input id="adopter_phone_number" class="block mt-1 w-full" type="tel"
            name="adopter_phone_number" />
        </div>
        <div class="mt-8 flex justify-evenly">
          <x-secondary-button>
            {{ __('Cancel') }}
          </x-secondary-button>
          <x-primary-button>
            {{ __('Create adoption') }}
          </x-primary-button>
        </div>
      </form>
    </div>
  </section>


</x-app-layout>
