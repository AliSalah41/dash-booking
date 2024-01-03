<?php

namespace App\Http\Controllers;

use App\DataTables\TicketRequestsDataTable;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function requests_index(TicketRequestsDataTable $dataTable)
    {
        return $dataTable->render('admin.tickets.index');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return $dataTable->render('pages.user.index');

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
