<x-app-layout>
    <section class="bg-white">
      <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Update a list</h2>
        <form method="post" action="{{ route('contact_lists.update', $contactList) }}">
          @csrf
          @method('patch')
  
          <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
              value="{{ $contactList->name }}" />
          </div>
          <div class="mt-8 flex justify-evenly">
            <x-primary-button>
              {{ __('Update list') }}
            </x-primary-button>
            <x-secondary-button x-data=""
              x-on:click.prevent="$dispatch('open-modal', 'confirm-list-deletion')">
              {{ __('Delete list') }}
            </x-secondary-button>
          </div>
        </form>
      </div>
    </section>
  
    <x-modal name="confirm-list-deletion" focusable>
      <form method="post" action="{{ route('contact_lists.destroy', $contactList) }}" class="p-6">
        @csrf
        @method('delete')
  
        <h2 class="text-lg font-medium text-gray-900">
          {{ __('Are you sure you want to delete this list?') }}
        </h2>
  
        <div class="mt-6 flex justify-end">
          <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
          </x-secondary-button>
  
          <x-danger-button class="ms-3">
            {{ __('Delete list') }}
          </x-danger-button>
        </div>
      </form>
    </x-modal>
  </x-app-layout>
  