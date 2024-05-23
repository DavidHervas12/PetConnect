<x-app-layout>
    <?php
        $columns = ['name', 'id', 'Creation date', 'contacts', 'actions']
    ?>
    <div>
      <section class="relative overflow-x-auto sm:rounded-lg">
        <div class="mx-auto max-w-screen-xl">
          <div class="relative sm:rounded-lg overflow-hidden pb-20">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
              <div class="w-full md:w-1/2">
                <form class="flex items-center" method="get" action="{{ route('contact_lists.index') }}">
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
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-list')">
                  {{ __('Create list') }}
                </x-primary-button>
              </div>
            </div>
            <div class="p-8">
              @if ($contactLists)
                @if (count($contactLists) <= 0)
                  <h2 class="text-lg font-medium text-gray-900">
                    {{ __('No results') }}
                  </h2>
                @else
                  <x-table.table :columns="$columns">
                    @foreach ($contactLists as $contactList)
                      <x-table.table-row :item="$contactList" />
                    @endforeach
                  </x-table.table>
                @endif
              @endif
            </div>
            {{ $contactLists->links('components.pagination') }}
          </div>
        </div>
      </section>
  
      <x-modal name="create-list">
        <section class="bg-white">
          <div class="py-4 px-4 mx-auto max-w-2xl lg:py-8">
            <h2 class="mb-4 text-2xl font-bold text-gray-900 text-center">Create a new list</h2>
            <form method="post" action="{{ route('contact_lists.store') }}">
              @csrf
              <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
              </div>
              <div class="mt-8 flex justify-evenly">
                <x-secondary-button x-on:click="$dispatch('close')">
                  {{ __('Cancel') }}
                </x-secondary-button>
  
                <x-primary-button>
                  {{ __('Create List') }}
                </x-primary-button>
              </div>
            </form>
          </div>
        </section>
      </x-modal>
    </div>
  </x-app-layout>
  