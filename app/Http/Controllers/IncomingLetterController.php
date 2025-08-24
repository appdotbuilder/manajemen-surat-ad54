<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomingLetterRequest;
use App\Http\Requests\UpdateIncomingLetterRequest;
use App\Models\IncomingLetter;
use App\Models\LetterCategory;
use App\Models\LetterType;
use App\Models\Employee;
use Inertia\Inertia;

class IncomingLetterController extends Controller
{
    /**
     * Display a listing of the incoming letters.
     */
    public function index()
    {
        $letters = IncomingLetter::with([
                'category',
                'letterType', 
                'receivedByEmployee'
            ])
            ->latest('received_date')
            ->paginate(15);
        
        return Inertia::render('incoming-letters/index', [
            'letters' => $letters
        ]);
    }

    /**
     * Show the form for creating a new incoming letter.
     */
    public function create()
    {
        $categories = LetterCategory::where('type', 'incoming')
            ->orWhere('type', 'both')
            ->active()
            ->get();
        
        $letterTypes = LetterType::active()->get();
        $employees = Employee::active()->get();

        return Inertia::render('incoming-letters/create', [
            'categories' => $categories,
            'letterTypes' => $letterTypes,
            'employees' => $employees
        ]);
    }

    /**
     * Store a newly created incoming letter.
     */
    public function store(StoreIncomingLetterRequest $request)
    {
        $letter = IncomingLetter::create($request->validated());

        return redirect()->route('incoming-letters.show', $letter)
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    /**
     * Display the specified incoming letter.
     */
    public function show(IncomingLetter $incomingLetter)
    {
        $incomingLetter->load([
            'category',
            'letterType',
            'receivedByEmployee',
            'dispositions.fromEmployee',
            'dispositions.toEmployee'
        ]);

        return Inertia::render('incoming-letters/show', [
            'letter' => $incomingLetter
        ]);
    }

    /**
     * Show the form for editing the incoming letter.
     */
    public function edit(IncomingLetter $incomingLetter)
    {
        $categories = LetterCategory::where('type', 'incoming')
            ->orWhere('type', 'both')
            ->active()
            ->get();
        
        $letterTypes = LetterType::active()->get();
        $employees = Employee::active()->get();

        return Inertia::render('incoming-letters/edit', [
            'letter' => $incomingLetter,
            'categories' => $categories,
            'letterTypes' => $letterTypes,
            'employees' => $employees
        ]);
    }

    /**
     * Update the specified incoming letter.
     */
    public function update(UpdateIncomingLetterRequest $request, IncomingLetter $incomingLetter)
    {
        $incomingLetter->update($request->validated());

        return redirect()->route('incoming-letters.show', $incomingLetter)
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    /**
     * Remove the specified incoming letter.
     */
    public function destroy(IncomingLetter $incomingLetter)
    {
        $incomingLetter->delete();

        return redirect()->route('incoming-letters.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}