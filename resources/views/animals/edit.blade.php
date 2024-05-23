<x-app-layout>
  <section class="bg-white">
    <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
      <h2 class="mb-4 text-2xl font-bold text-gray-900 text-center">Add a new animal</h2>
      <form method="post" action="{{ route('animals.update', $animal) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex justify-center mb-4">
          <img id="image-preview" class="w-32 h-32 rounded-md border border-gray-300" src="{{$animal->image}}" alt="Image Preview"
            style="display: none;" />
        </div>

        <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
            value="{{ $animal->name }}" />
        </div>
        <div class="mt-4 flex">
          <div class="w-1/2 mr-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender"
              class="block mt-1 w-full focus:border-petconnect-color-600 focus:ring-petconnect-color-600 rounded-md shadow-sm border-petconnect-color"
              name="gender">
              <option value="male" {{ $animal->gender == 'male' ? 'selected' : '' }}>Male</option>
              <option value="female" {{ $animal->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
          </div>
          <div class="w-1/2">
            <x-input-label for="type" :value="__('Type')" />
            <select id="type"
              class="block mt-1 w-full focus:border-petconnect-color-600 focus:ring-petconnect-color-600 rounded-md shadow-sm border-petconnect-color"
              name="type" value="{{ $animal->type }}">
              <option value="dog" {{ $animal->type == 'dog' ? 'selected' : '' }}>Dog</option>
              <option value="cat" {{ $animal->type == 'cat' ? 'selected' : '' }}>Cat</option>
              <option value="bunny" {{ $animal->type == 'bunny' ? 'selected' : '' }}>Bunny</option>
              <option value="bird" {{ $animal->type == 'bird' ? 'selected' : '' }}>Bird</option>
              <option value="turtle" {{ $animal->type == 'turtle' ? 'selected' : '' }}>Turtle</option>
            </select>
          </div>
        </div>
        <div class="mt-4 flex">
          <div class="w-1/2 mr-4">
            <x-input-label for="weight" :value="__('Weight')" />
            <x-text-input id="weight" class="block mt-1 w-full" type="number" name="weight" step="0.01"
              value="{{ $animal->weight }}" />
          </div>
          <div class="w-1/2">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age"
              value="{{ $animal->age }}" />
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
          <x-primary-button>
            {{ __('Update animal') }}
          </x-primary-button>
          <x-secondary-button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-animal-deletion')">
            {{ __('Delete animal') }}
          </x-secondary-button>
        </div>
      </form>
    </div>
  </section>

  <x-modal name="confirm-animal-deletion" focusable>
    <form method="post" action="{{ route('animals.destroy', $animal) }}" class="p-6">
      @csrf
      @method('delete')

      <h2 class="text-lg font-medium text-gray-900">
        {{ __('Are you sure you want to delete this animal?') }}
      </h2>

      <div class="mt-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
          {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3">
          {{ __('Delete animal') }}
        </x-danger-button>
      </div>
    </form>
  </x-modal>
</x-app-layout>
