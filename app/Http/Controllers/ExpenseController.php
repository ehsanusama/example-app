<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Nette\Schema\Expect;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = "expense";
        $btn = "Save";
        $expense = Expense::all();
        $data = compact('url', 'btn', 'expense');
        return view("admin.expense")->with($data);
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
        $validatedData = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
        ]);
        // Create a new transaction
        Expense::create($validatedData);
        return redirect()->route('admin.expense')->withToastSuccess('Transaction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
