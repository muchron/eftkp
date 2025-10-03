<?php

namespace App\Http\Controllers;

use App\Http\Requests\EfktpHasilUsgRequest;
use App\Models\EfktpHasilUsg;
use App\Traits\Track;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;

class EfktpHasilUsgController extends Controller
{
	public EfktpHasilUsg $model;
	use Track;
	use ResponseTrait;

	public function __construct(EfktpHasilUsg $model)
	{
		$this->model = $model;
	}

	public function create(EfktpHasilUsgRequest $request)
	{

		$validated = $request->validated();
		try {

			$validated['tgl_periksa'] = now()->translatedFormat('Y-m-d');
			$validated['jam_periksa'] = now()->translatedFormat('H:i:s');

			$create = $this->model->updateOrCreate(['no_rawat' => $validated['no_rawat']], $validated);
			if ($create) {
				$this->insertSql($this->model, $validated);
			}
		} catch (\Exception $e) {
			return $this->error($e->getMessage());
		}

		return $this->success();
	}

	public function first(Request $request)
	{
		$result = $this->model
			->where('no_rawat', $request->no_rawat)
			->first();
		return $this->success($result);
	}
}
