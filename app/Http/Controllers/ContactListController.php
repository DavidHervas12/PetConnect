<?php

namespace App\Http\Controllers;

use App\Models\ContactList;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ContactListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->has('search') ? trim($request->get('search')) : '';

        $query = ContactList::whereBelongsTo(Auth::user());

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            });
        }

        $contactLists = $query->paginate(10);

        return view('contact_lists.index', [
            'search' => $search,
            'contactLists' => $contactLists,
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request->user()->contact_lists()->create($validated);

        return redirect(route('contact_lists.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactList $contactList)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactList $contactList)
    {
        return view('contact_lists.edit', [
            'contactList' => $contactList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactList $contactList)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $contactList->update($validated);

        return redirect(route('contact_lists.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactList $contactList)
    {
        $contactList->delete();

        return redirect(route('contact_lists.index'));
    }
}
