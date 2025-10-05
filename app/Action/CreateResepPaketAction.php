<?php

namespace App\Action;

use App\Http\Controllers\ResepObatController;
use App\Models\ResepDokter;
use App\Models\ResepDokterRacikan;
use App\Models\ResepDokterRacikanDetail;
use App\Models\ResepObat;
use App\Traits\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CreateResepPaketAction
{
	use Track;

	protected ResepObatController $controller;

	public function __construct()
	{
		$this->controller = new ResepObatController();
	}

	public function handle(Request $request)
	{
		$racikan = $request->racikan ?? [];
		$umum = $request->umum ?? [];

		$isAvailableResep = ResepObat::where([
			'no_rawat' => $request->no_rawat,
			'tgl_peresepan' => date('Y-m-d')
		])->first();

		$no_resep = $isAvailableResep
			? $isAvailableResep->no_resep
			: $this->controller->setNoResep($request);


		$no_racik = 0;
		if (!isset($isAvailableResep)) {
			$this->controller->create($request);
			$no_racik = 0;
		} else {
			$resepDokterRacikan = ResepDokterRacikan::where('no_resep', $no_resep)
				->orderBy('no_racik', 'DESC')
				->first();
			$no_racik = $resepDokterRacikan ? $resepDokterRacikan->no_racik : 0;
		}
		$umum = collect($umum)->map(fn($item) => [
			...$item,
			'no_resep' => $no_resep,
		])->toArray();

		$racikan = collect($racikan)->map(function ($item, $index) use ($no_resep, &$no_racik) {
//			$no = (int)$no_racik > 1 ? (int)$no_racik + 1 : $index + 1;
			$no_racik++;
			return [
				...$item,
				'no_resep' => $no_resep,
				'no_racik' => $no_racik,
				'detail' => isset($item['detail'])
					? collect($item['detail'])->map(fn($d) => [
						...$d,
						'no_racik' => $no_racik,
						'no_resep' => $no_resep,

					])->toArray()
					: null
			];
		});

		$detail = $racikan->pluck('detail')->filter()->flatten(1)->values()->toArray();
		$racikan_utama = $racikan->map(fn($r) => collect($r)->except('detail'))->toArray();

		DB::transaction(function () use ($umum, $racikan_utama, $detail) {
			if (!empty($umum)) {
				ResepDokter::insert($umum);
				$this->insertSql(new ResepDokter(), $umum);
			}

			if (!empty($racikan_utama)) {
				ResepDokterRacikan::insert($racikan_utama);
				$this->insertSql(new ResepDokterRacikan(), $racikan_utama);
			}

			if (!empty($detail)) {
				ResepDokterRacikanDetail::insert($detail);
				$this->insertSql(new ResepDokterRacikanDetail(), $detail);
			}
		});

	}
}