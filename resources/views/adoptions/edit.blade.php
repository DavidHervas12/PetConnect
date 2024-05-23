<x-app-layout>
    <section class="bg-white">
      <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Update an adoption</h2>
        <form method="post" action="{{ route('adoptions.update', $adoption) }}">
          @csrf
          @method('patch')
  
          <div>
            <x-input-label for="adopter_email" :value="__('Adopter email')" />
            <x-text-input id="adopter_email" class="block mt-1 w-full" type="text" name="adopter_email" value="{{ $adoption->adopter_email }}" />
          </div>
          <div class="mt-3">
            <x-input-label for="adopter_name" :value="__('Adopter name')" />
            <x-text-input id="adopter_name" class="block mt-1 w-full" type="text" name="adopter_name" value="{{ $adoption->adopter_name }}" />
          </div>
          <div class="mt-3">
            <x-input-label for="adopter_lastname" :value="__('Adopter lastname')" />
            <x-text-input id="adopter_lastname" class="block mt-1 w-full" type="text" name="adopter_lastname" value="{{ $adoption->adopter_lastname }}" />
          </div>
          <div class="mt-3"> 
            <x-input-label for="adopter_address" :value="__('Adopter address')" />
            <x-text-input id="adopter_address" class="block mt-1 w-full" type="text" name="adopter_address" value="{{ $adoption->adopter_address }}" />
          </div>
          <div class="mt-3">
            <x-input-label for="adopter_phone_number" :value="__('Adopter phone number')" />
            <x-text-input id="adopter_phone_number" class="block mt-1 w-full" type="text" name="adopter_phone_number" value="{{ $adoption->adopter_phone_number }}" />
          </div>

          <div class="mt-8 flex justify-evenly">
            <x-primary-button>
              {{ __('Update adoption') }}
            </x-primary-button>
            <x-secondary-button x-data=""
              x-on:click.prevent="$dispatch('open-modal', 'confirm-adoption-deletion')">
              {{ __('Delete adoption') }}
            </x-secondary-button>
          </div>
        </form>
      </div>
    </section>
  
    <x-modal name="confirm-adoption-deletion" focusable>
      <form method="post" action="{{ route('adoptions.destroy', $adoption) }}" class="p-6">
        @csrf
        @method('delete')
  
        <h2 class="text-lg font-medium text-gray-900">
          {{ __('Are you sure you want to delete this adoption?') }}
        </h2>
  
        <div class="mt-6 flex justify-end">
          <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
          </x-secondary-button>
  
          <x-danger-button class="ms-3">
            {{ __('Delete adoption') }}
          </x-danger-button>
        </div>
      </form>
    </x-modal>
  </x-app-layout>
  