@props(['item', 'checkboxId'])

<tr class="border-b dark:border-gray-700">
  @if ($item instanceof \App\Models\Contact)
    <td class="w-4 p-4">
      <div class="flex items-center">
        <input id="{{ $checkboxId }}" name="contact_ids[]" value="{{ $item->id }}" type="checkbox"
          class="w-4 h-4 text-petconnect-color bg-gray-100 border-gray-300 rounded focus:ring-0">
        <label for="{{ $checkboxId }}" class="sr-only">checkbox</label>
      </div>
    </td>
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap border-petconnect-color border-r">
      @if ($item->user->is(auth()->user()))
        <a href="{{ route('contacts.edit', $item) }}"
          class="font-medium text-green-700 hover:underline">{{ $item->email }}</a>
      @else
        {{ $item->email }}
      @endif
    </th>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->name }}</td>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->lastname }}</td>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->phone_number }}</td>
    <td class="px-4 py-3">{{ $item->address }}</td>
  @elseif ($item instanceof \App\Models\Adoption)
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap border-petconnect-color border-r">
      @if ($item->animal->user->is(auth()->user()))
        <a href="{{ route('adoptions.edit', $item) }}"
          class="font-medium text-green-700 hover:underline">{{ $item->animal->name }}
        </a>
      @else
        {{ $item->animal->name }}
      @endif
    </th>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->adopter_email }}</td>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->adopter_name }}</td>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->adopter_address }}</td>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->created_at }}</td>
  @elseif ($item instanceof \App\Models\ContactList)
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap border-petconnect-color border-r">
      @if ($item->user->is(auth()->user()))
        <a href="{{ route('contacts.index', ['contact_list_id' => $item->id]) }}"
          class="font-medium text-green-700 hover:underline">{{ $item->name }}
        </a>
      @else
        {{ $item->email }}
      @endif
    </th>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ '#' . $item->id }}</td>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->created_at }}</td>
    <td class="px-4 py-3 border-petconnect-color border-r">{{ $item->contacts->count() }}</td>
    <td class="px-4 py-3 border-petconnect-color w-1/12">
      <a href="{{ route('contact_lists.edit', $item) }}" class="font-medium text-petconnect-color hover:underline">Edit</a>
    </td>

  @endif
</tr>
