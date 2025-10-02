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
			$create = $this->model->create($validated);
			if ($create) {
				$this->insertSql($this->model, $validated);
			}
		} catch (\Exception $e) {
			return $this->error($e, $e->getMessage(), 500);
		}

		return $this->success();
	}
}
