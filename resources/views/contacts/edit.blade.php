<x-app-layout>
  <section class="bg-white">
    <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
      <h2 class="mb-4 text-xl font-bold text-gray-900">Update a contact</h2>
      <form method="post" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('patch')

        <div>
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
            value="{{ $contact->email }}" />
        </div>
        <div class="mt-4">
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
            value="{{ $contact->name }}" />
        </div>
        <div class="mt-4">
          <x-input-label for="lastname" :value="__('Lastname')" />
          <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
            value="{{ $contact->lastname }}" />
        </div>
        <div class="mt-4">
          <x-input-label for="phone_number" :value="__('Phone number')" />
          <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number"
            value="{{ $contact->phone_number }}" />
        </div>
        <div class="mt-4">
          <x-input-label for="address" :value="__('Address')" />
          <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $contact->address }}"/>
        </div>
        <div class="mt-8 flex justify-evenly">
          <x-primary-button>
            {{ __('Update contact') }}
          </x-primary-button>
          <x-secondary-button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-contact-deletion')">
            {{ __('Delete contact') }}
          </x-secondary-button>
        </div>
      </form>
    </div>
  </section>

  <x-modal name="confirm-contact-deletion" focusable>
    <form method="post" action="{{ route('contacts.destroy', $contact) }}" class="p-6">
      @csrf
      @method('delete')

      <h2 class="text-lg font-medium text-gray-900">
        {{ __('Are you sure you want to delete this contact?') }}
      </h2>

      <div class="mt-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
          {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3">
          {{ __('Delete contact') }}
        </x-danger-button>
      </div>
    </form>
  </x-modal>
</x-app-layout>
