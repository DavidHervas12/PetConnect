<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->has('search') ? trim($request->get('search')) : '';

        $query = Adoption::whereBelongsTo(Auth::user());

        if ($search !== '') {
            $query->where('adopter_name', 'LIKE', '%' . $search . '%');
        }

        $adoptions = $query->paginate(12);

        return view('adoptions.index', [
            'search' => $search,
            'columns' => Adoption::newModelInstance()->getFillable(),
            'adoptions' => $adoptions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $animalId = $request->query('animalId');
        $animal = Animal::findOrFail($animalId);

        return view('adoptions.create', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'adopter_email' => 'required|string|max:255',
            'adopter_name' => 'required|string|max:255',
            'adopter_lastname' => 'required|string|max:255',
            'adopter_address' => 'required|string|max:255',
            'adopter_phone_number' => 'required|string|max:255',
        ]);

        $animalId = $request->query('animalId');

        $animal = Animal::findOrFail($animalId);

        if ($animal->adopted) {
            return redirect()->back()->with('error', 'Este animal ya ha sido adoptado.');
        }
        
        $adoption = new Adoption($validated);
        
        $adoption->user()->associate(Auth::user());
        $adoption->animal()->associate($animal);
        $adoption->save();
        
        $animal->adopted = true;
        $animal->save();

        return redirect(route('animals.index'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption): View
    {
        return view('adoptions.edit', [
            'adoption' => $adoption,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption): RedirectResponse
    {
        $validated = $request->validate([
            'adopter_email' => 'required|string|max:255',
            'adopter_name' => 'required|string|max:255',
            'adopter_lastname' => 'required|string|max:255',
            'adopter_address' => 'required|string|max:255',
            'adopter_phone_number' => 'required|string|max:255',
        ]);

        $adoption->update($validated);

        return redirect(route('adoptions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption): RedirectResponse
    {
        $adoption->animal()->update(['adopted' => false]);

        $adoption->delete();

        return redirect(route('adoptions.index'));
    }
}
