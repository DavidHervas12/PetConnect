@props(['animal'])

<div class="flex flex-col items-center bg-gray-50 bg-gra border border-gray-300 rounded-lg shadow md:flex-row md:max-w-xl">
  <div class="w-48 md:w-full">
    <img class="object-cover w-full rounded-t-lg h-40 md:w-48 md:rounded-none md:rounded-s-lg drop-shadow-lg border-r-2 border"
      src="{{ $animal->image ? asset('storage/' . $animal->image) : "img/default_animals/$animal->type.png" }}" alt="animal_image">
  </div>
  <div class="flex flex-col -ml-52 justify-between p-4">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $animal->name }}</h5>
    <p class="mb-3 font-normal text-gray-700">{{ $animal->type }}, {{ $animal->gender }}, {{ $animal->age }},
      {{ $animal->weight }}</p>
    @if (!$animal->adopted)
      <div class="flex">
        <a href="{{ route('animals.edit', $animal) }}">
          <x-primary-button class="px-4 py-2 mr-4">
            {{ __('Edit') }}
          </x-primary-button>
        </a>
        <a href="{{ route('adoptions.create', ['animalId' => $animal->id]) }}">
          <x-primary-button class="w-20">
            {{ __('Adopt') }}
          </x-primary-button>
        </a>
      </div>
    @else
      <h1 class="text-red-700">ADOPTED</h1>
    @endif
  </div>
</div>
