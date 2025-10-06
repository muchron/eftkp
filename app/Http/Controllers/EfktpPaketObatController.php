<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EfktpPaketObatController extends Controller
{
	public \App\Models\EfktpPaketObat $model;

	public function __construct(\App\Models\EfktpPaketObat $model)
	{
		$this->model = $model;
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('content.farmasi.paket-obat.paket_obat');
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
	public function show(int|string $id)
	{
		$result = $this->model
			->with(['umum.databarang', 'racikan.template.detail.barang'])
			->findOrFail($id);

		return $this->success($result);
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

	public function datatable(Request $request)
	{
		$result = $this->model
			->with(['poliklinik', 'umum.databarang', 'racikan.template']);

		return DataTables::of($result)
			->filter(function ($query) use ($request) {
				if ($request->has('search') && $request->get('search')['value']) {
					return $query->whereHas('poliklinik', function ($query) use ($request) {
						$query->where('nm_poli', 'like', "%" . $request->get('search')['value'] . "%");
					})->orWhere('nama', 'like', "%" . $request->get('search')['value'] . "%");
				}
			})
			->make(true);
	}
}
