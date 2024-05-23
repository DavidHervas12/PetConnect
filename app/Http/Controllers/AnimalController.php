<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->has('search') ? trim($request->get('search')) : '';

        $query = Animal::whereBelongsTo(Auth::user());

        if ($search !== '') {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $animals = $query->paginate(12);

        return view('animals.index', [
            'search' => $search,
            'columns' => Animal::newModelInstance()->getFillable(),
            'animals' => $animals,
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
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age' => 'required|numeric|max:255',
            'gender' => 'required|string|max:255',
            'weight' => 'required|numeric|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('img/animal_images', 'public');
            $validated['image'] = $imagePath;
        }
        $request->user()->animals()->create($validated);

        return redirect(route('animals.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal): View
    {
        return view('animals.edit', [
            'animal' => $animal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age' => 'required|numeric|max:255',
            'gender' => 'required|string|max:255',
            'weight' => 'required|numeric|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($animal->image) {
                Storage::disk('public')->delete($animal->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('img/animal_images', 'public');
            $validated['image'] = $imagePath;
        }

        $animal->update($validated);

        return redirect(route('animals.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        if ($animal->image) {
            Storage::disk('public')->delete($animal->image);
        }

        $animal->delete();
    
        return redirect(route('animals.index'));
    }
}
