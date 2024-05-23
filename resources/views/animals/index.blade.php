<x-app-layout>
  <section class="relative overflow-x-auto sm:rounded-lg">
    <div class="mx-auto max-w-screen-xl">
      <div class="relative sm:rounded-lg overflow-hidden pb-20">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
          <div class="w-full md:w-1/2">
            <form class="flex items-center" method="get" action="{{ route('animals.index') }}">
              @csrf
              <label for="simple-search" class="sr-only">Search</label>
              <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <input type="text"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                  placeholder="Search" name="search" value="{{ $search }}" />
              </div>
              <x-primary-button class="ml-4">
                {{ __('search') }}
              </x-primary-button>
            </form>
          </div>
          <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-animal')">
              {{ __('Add Animal') }}
            </x-primary-button>
          </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 ml-4">
          @if ($animals)
            @if (count($animals) <= 0)
              <h2 class="text-lg font-medium text-gray-900">
                {{ __('No results') }}
              </h2>
            @else
              @foreach ($animals as $animal)
                <x-card :animal="$animal" />
              @endforeach
            @endif
          @endif
        </div>
        {{ $animals->links('components.pagination') }}
      </div>
  </section>

  <x-modal name="add-animal">
    <section class="bg-white">
      <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
        <h2 class="mb-4 text-2xl font-bold text-gray-900 text-center">Add a new animal</h2>
        <form method="post" action="{{ route('animals.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="flex justify-center mb-4">
            <img id="image-preview" class="w-32 h-32 rounded-md border border-gray-300" src="#"
              alt="Image Preview" style="display: none;" />
          </div>


          <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
          </div>

          <div class="mt-4 flex">
            <div class="w-1/2 mr-4">
              <x-input-label for="gender" :value="__('Gender')" />
              <select id="gender"
                class="block mt-1 w-full focus:border-petconnect-color-600 focus:ring-petconnect-color-600 rounded-md shadow-sm border-petconnect-color"
                name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="w-1/2">
              <x-input-label for="type" :value="__('Type')" />
              <select id="type"
                class="block mt-1 w-full focus:border-petconnect-color-600 focus:ring-petconnect-color-600 rounded-md shadow-sm border-petconnect-color"
                name="type">
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="bunny">Bunny</option>
                <option value="bird">Bird</option>
                <option value="turtle">Turtle</option>
              </select>
            </div>
          </div>

          <div class="mt-4 flex">
            <div class="w-1/2 mr-4">
              <x-input-label for="weight" :value="__('Weight')" />
              <x-text-input id="weight" class="block mt-1 w-full" type="number" name="weight" step="0.01" />
            </div>
            <div class="w-1/2">
              <x-input-label for="age" :value="__('Age')" />
              <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" />
            </div>
          </div>

          <div class="mt-4">
            <x-input-label for="image" :value="__('Animal photo')" />
            <label for="image"
              class="block mt-1 w-full cursor-pointer border-petconnect-color-600 border rounded-md bg-gray-50 text-center p-2">
              <span id="file-label">Select image</span>
              <x-text-input id="image" class="hidden" type="file" name="image" accept="image/*"
                onchange="previewImage(event)" />
            </label>
          </div>

          @push('scripts')
            <script>
              function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                  var output = document.getElementById('image-preview');
                  output.src = reader.result;
                  output.style.display = 'block';
                };
                reader.readAsDataURL(event.target.files[0]);

                // Update the label text
                var fileName = event.target.files[0].name;
                document.getElementById('file-label').innerText = fileName;
              }
            </script>
          @endpush

          <div class="mt-8 flex justify-evenly">
            <x-secondary-button x-on:click="$dispatch('close')">
              {{ __('Cancel') }}
            </x-secondary-button>
            <x-primary-button>
              {{ __('Create animal') }}
            </x-primary-button>
          </div>
        </form>
      </div>
    </section>
  </x-modal>

</x-app-layout>
