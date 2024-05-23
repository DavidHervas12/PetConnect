@props(['columns', 'selectAllId' => null])


<div class="border-petconnect-color border">
  <form id="bulk-action-form" action="{{ route('contacts.bulkAction') }}" method="POST">
    @csrf
    <input type="hidden" name="ids" id="contact-ids">
    <input type="hidden" name="action" id="bulk-action">
    <input type="hidden" name="contact_list_id" id="contact-list-id">

    <table class="w-full text-sm text-left text-gray-500 ">
      <thead class="text-xs text-white uppercase bg-petconnect-color">
        <tr>
          @if ($selectAllId)
            <th scope="col" class="p-4">
              <div class="flex items-center">
                <input id="{{ $selectAllId }}" type="checkbox"
                  class="w-4 h-4 text-gray-500 bg-gray-100 border-gray-300 rounded focus:ring-0">
                <label for="{{ $selectAllId }}" class="sr-only">Select All</label>
              </div>
            </th>
          @endif
          @foreach ($columns as $column)
            <th scope="col" class="px-4 py-3">{{ $column }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        {{ $slot }}
      </tbody>
    </table>
  </form>
</div>

















{{-- Edit user modal --}}
