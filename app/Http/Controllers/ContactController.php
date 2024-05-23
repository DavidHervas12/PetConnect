<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->has('search') ? trim($request->get('search')) : '';
        $contactListId = $request->get('contact_list_id');

        $query = Contact::whereBelongsTo(Auth::user());

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone_number', 'LIKE', '%' . $search . '%');
            });
        }

        if ($contactListId) {
            $query->whereHas('contactLists', function ($q) use ($contactListId) {
                $q->where('contact_lists.id', $contactListId);
            });
        }

        $contacts = $query->paginate(10);

        $contactLists = ContactList::whereBelongsTo(Auth::user())->get();

        return view('contacts.index', [
            'search' => $search,
            'contactLists' => $contactLists,
            'contactListId' => $contactListId,
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        $request->user()->contacts()->create($validated);

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): View
    {
        return view('contacts.edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        $contact->update($validated);

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect(route('contacts.index'));
    }

    public function bulkAction(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        $action = $request->input('action');

        if (!empty($ids)) {
            switch ($action) {
                case 'delete':
                    Contact::whereIn('id', $ids)->delete();
                    return redirect()->route('contacts.index')->with('success', 'Selected contacts have been deleted.');

                case 'addToList':
                    $contactListId = $request->input('contact_list_id');
                    $contactList = ContactList::find($contactListId);
                    if ($contactList) {
                        foreach ($ids as $id) {
                            $contact = Contact::find($id);
                            if ($contact) {
                                $contact->contactLists()->attach($contactListId);
                            }
                        }
                        return redirect()->route('contacts.index')->with('success', 'Selected contacts have been added to the list.');
                    } else {
                        return redirect()->route('contacts.index')->with('error', 'Invalid contact list.');
                    }
                case 'detach':
                    $contactListId = $request->input('contact_list_id');
                    $contactList = ContactList::find($contactListId);

                    if ($contactList) {
                        foreach ($ids as $id) {
                            $contact = Contact::find($id);
                            if ($contact) {
                                $contact->contactLists()->detach($contactListId);
                            }
                        }
                        return redirect()->route('contacts.index', ['contact_list_id' => $contactListId])
                            ->with('success', 'Contacts removed from the list successfully.');
                    } else {
                        return redirect()->route('contacts.index')->with('error', 'Invalid contact list.');
                    }

                default:
                    return redirect()->route('contacts.index')->with('error', 'Invalid action.');
            }
        }

        return redirect()->route('contacts.index')->with('error', 'No contacts selected for action.');
    }

}
