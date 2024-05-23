<x-app-layout>
  <?php
  $columns = ['email', 'name', 'lastmane', 'phone number', 'address'];
  ?>
  <div>
    <section class="relative overflow-x-auto sm:rounded-lg">
      <div class="mx-auto max-w-screen-xl">
        <div class="relative sm:rounded-lg overflow-hidden pb-20">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
              <form class="flex items-center" method="get" action="{{ route('contacts.index') }}">
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
              <a href="{{ route('contact_lists.index') }}">
                <x-primary-button>
                  {{ __('Lists') }}
                </x-primary-button>
              </a>
              <x-dropdown>
                <x-slot name="trigger">
                  <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ 'Actions' }}</div>

                    <div class="ms-1">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd" />
                      </svg>
                    </div>
                  </button>
                </x-slot>
                <x-slot name="content">
                  <x-dropdown-link x-data="" x-on:click.prevent="$dispatch('open-modal', 'select-list')">
                    {{ __('Add to a list') }}
                  </x-dropdown-link>
                  <x-dropdown-link onclick="event.preventDefault(); submitForm('delete');">
                    {{ __('Delete') }}
                  </x-dropdown-link>
                  @if ($contactListId)
                    <x-dropdown-link onclick="event.preventDefault(); submitForm('detach', {{$contactListId}});">
                      {{ __('Remove from list') }}
                    </x-dropdown-link>
                  @endif
                </x-slot>
              </x-dropdown>
              <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-contact')">
                {{ __('Create contact') }}
              </x-primary-button>
            </div>
          </div>
          <div class="p-8">
            @if ($contacts)
              @if (count($contacts) <= 0)
                <h2 class="text-lg font-medium text-gray-900">
                  {{ __('No results') }}
                </h2>
              @else
                <x-table.table :columns="$columns" selectAllId="checkbox-all-search">
                  @foreach ($contacts as $contact)
                    <x-table.table-row :item="$contact" :checkboxId="'checkbox-table-search-' . $contact->id" />
                  @endforeach
                </x-table.table>
              @endif
            @endif
            @push('scripts')
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  const selectAllCheckbox = document.getElementById('checkbox-all-search');
                  const tableCheckboxes = document.querySelectorAll('input[type="checkbox"]:not(#checkbox-all-search)');
                  const contactIdsInput = document.getElementById('contact-ids');
                  const bulkActionInput = document.getElementById('bulk-action');
                  const contactListIdInput = document.getElementById('contact-list-id')

                  selectAllCheckbox.addEventListener('change', function() {
                    console.log("hola")
                    tableCheckboxes.forEach(function(checkbox) {
                      checkbox.checked = selectAllCheckbox.checked;
                    });
                  });

                  window.submitForm = function(action, contactListId = null) {
                    const selectedIds = [];
                    tableCheckboxes.forEach(function(checkbox) {
                      if (checkbox.checked) {
                        selectedIds.push(checkbox.value);
                      }
                    });

                    if (selectedIds.length > 0) {
                      contactIdsInput.value = selectedIds.join(',');
                      bulkActionInput.value = action;
                      if (contactListId) {
                        contactListIdInput.value = contactListId
                      }
                      document.getElementById('bulk-action-form').submit();
                    } else {
                      alert('No contacts selected.');
                    }
                  }

                });
              </script>
            @endpush

          </div>
          {{ $contacts->links('components.pagination') }}
        </div>
      </div>
    </section>

    <x-modal name="select-list">
      <section class="bg-white">
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
          <h2 class="mb-4 text-2xl font-bold text-gray-900 text-center">Add a new contact</h2>
          <x-input-label for="contactList" :value="__('Choose a list:')" />
          <select name="contact_list_id" id="contactList"
            class="block mt-1 w-full focus:border-petconnect-color-600 focus:ring-petconnect-color-600 rounded-md shadow-sm border-petconnect-color">
            @foreach ($contactLists as $list)
              <option value="{{ $list->id }}">{{ $list->name }}</option>
            @endforeach
          </select>
          <div class="mt-8 flex justify-evenly">
            <x-secondary-button x-on:click="$dispatch('close')">
              {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button
              onclick="event.preventDefault(); submitForm('addToList',document.getElementById('contactList').value);">
              {{ __('Add to list') }}
            </x-primary-button>
          </div>
        </div>
      </section>
    </x-modal>

    <x-modal name="add-contact">
      <section class="bg-white">
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
          <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new contact</h2>
          <form method="post" action="{{ route('contacts.store') }}">
            @csrf
            <div>
              <x-input-label for="email" :value="__('Email')" />
              <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" />
            </div>
            <div class="mt-4">
              <x-input-label for="name" :value="__('Name')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
            </div>
            <div class="mt-4">
              <x-input-label for="lastname" :value="__('Lastname')" />
              <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" />
            </div>
            <div class="mt-4">
              <x-input-label for="phone_number" :value="__('Phone number')" />
              <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" />
            </div>
            <div class="mt-4">
              <x-input-label for="address" :value="__('Address')" />
              <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" />
            </div>
            <div class="mt-8 flex justify-evenly">
              <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
              </x-secondary-button>

              <x-primary-button>
                {{ __('Create contact') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </section>
    </x-modal>
  </div>
</x-app-layout>
