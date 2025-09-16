<?php

namespace App\Action;

use DB;

class TindakanDokterAction
{
    public function handle(array $data)
    {
        $tindakan = [];
        try {
            DB::transaction(function () use ($data, &$tindakan) {

                $tindakan = $this->createTindakanDokter($data['no_rawat'], $data['kd_dokter'], $data['tindakan']);
                $this->createTampJurnal($this->getRekeningMapping(), $tindakan['totals']);
                $this->writeOnJurnal($data);
            });
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $tindakan;
    }
    function getRekeningMapping()
    {
        $rekening = DB::table('set_akun_ralan')
            ->first();
        return (object) [
            'Suspen_Piutang_Tindakan_Ralan' => $rekening->Suspen_Piutang_Tindakan_Ralan,
            'Tindakan_Ralan' => $rekening->Tindakan_Ralan,
            'Beban_Jasa_Medik_Dokter_Tindakan_Ralan' => $rekening->Beban_Jasa_Medik_Dokter_Tindakan_Ralan,
            'Utang_Jasa_Medik_Dokter_Tindakan_Ralan' => $rekening->Utang_Jasa_Medik_Dokter_Tindakan_Ralan,
            'Beban_KSO_Tindakan_Ralan' => $rekening->Beban_KSO_Tindakan_Ralan,
            'Utang_KSO_Tindakan_Ralan' => $rekening->Utang_KSO_Tindakan_Ralan,
            'Beban_Jasa_Sarana_Tindakan_Ralan' => $rekening->Beban_Jasa_Sarana_Tindakan_Ralan,
            'Utang_Jasa_Sarana_Tindakan_Ralan' => $rekening->Utang_Jasa_Sarana_Tindakan_Ralan,
            'Beban_Jasa_Menejemen_Tindakan_Ralan' => $rekening->Beban_Jasa_Menejemen_Tindakan_Ralan,
            'Utang_Jasa_Menejemen_Tindakan_Ralan' => $rekening->Utang_Jasa_Menejemen_Tindakan_Ralan,
            'HPP_BHP_Tindakan_Ralan' => $rekening->HPP_BHP_Tindakan_Ralan,
            'Persediaan_BHP_Tindakan_Ralan' => $rekening->Persediaan_BHP_Tindakan_Ralan,
        ];

    }

    function createTindakanDokter(string $no_rawat, string $kd_dokter, array $data)
    {
        $totals = [
            'ttldokter' => 0,
            'ttlkso' => 0,
            'ttlpendapatan' => 0,
            'ttlmaterial' => 0,
            'ttlbhp' => 0,
            'ttlmenejemen' => 0,
        ];


        $data = collect($data)->map(function ($item) use ($no_rawat, $kd_dokter, &$totals) {

            $totals['ttldokter'] += floatval($item['tarif_tindakandr']);
            $totals['ttlkso'] += floatval($item['kso']);
            $totals['ttlpendapatan'] += floatval($item['total_byrdr']);
            $totals['ttlmaterial'] += floatval($item['material']);
            $totals['ttlbhp'] += floatval($item['bhp']);
            $totals['ttlmenejemen'] += floatval($item['menejemen']);

            return [
                'no_rawat' => $no_rawat,
                'kd_dokter' => $kd_dokter,
                'kd_jenis_prw' => $item['kd_jenis_prw'],
                'tgl_perawatan' => date('Y-m-d'),
                'jam_rawat' => date('H:i:s'),
                'material' => $item['material'],
                'bhp' => $item['bhp'],
                'tarif_tindakandr' => $item['tarif_tindakandr'],
                'kso' => $item['kso'],
                'menejemen' => $item['menejemen'],
                'stts_bayar' => 'Belum',
                'biaya_rawat' => $item['total_byrdr'],
            ];
        })->toArray();

        $create = DB::table('rawat_jl_dr')->insert($data);

        return ['data' => $data, 'totals' => $totals];
    }

    private function createTampJurnal($rekening, $totals)
    {
        DB::table('tampjurnal')->delete();
        $insertJurnal = function ($kd, $nm, $debet, $kredit) {

            DB::table('tampjurnal')->insert([
                'kd_rek' => $kd,
                'nm_rek' => $nm,
                'debet' => $debet,
                'kredit' => $kredit,
            ]);
        };
        if ($totals['ttlpendapatan'] > 0) {
            $insertJurnal($rekening->Suspen_Piutang_Tindakan_Ralan, 'Suspen Piutang Tindakan Ralan', $totals['ttlpendapatan'], 0);
            $insertJurnal($rekening->Tindakan_Ralan, 'Pendapatan Tindakan Rawat Inap', 0, $totals['ttlpendapatan']);
        }

        if ($totals['ttldokter'] > 0) {
            $insertJurnal($rekening->Beban_Jasa_Medik_Dokter_Tindakan_Ralan, 'Beban Jasa Medik Dokter Tindakan Ralan', $totals['ttldokter'], 0);
            $insertJurnal($rekening->Utang_Jasa_Medik_Dokter_Tindakan_Ralan, 'Utang Jasa Medik Dokter Tindakan Ralan', 0, $totals['ttldokter']);
        }

        if ($totals['ttlkso'] > 0) {
            $insertJurnal($rekening->Beban_KSO_Tindakan_Ralan, 'Beban KSO Tindakan Ralan', $totals['ttlkso'], 0);
            $insertJurnal($rekening->Utang_KSO_Tindakan_Ralan, 'Utang KSO Tindakan Ralan', 0, $totals['ttlkso']);
        }

        if ($totals['ttlmaterial'] > 0) {
            $insertJurnal($rekening->Beban_Jasa_Sarana_Tindakan_Ralan, 'Beban Jasa Sarana Tindakan Ralan', $totals['ttlmaterial'], 0);
            $insertJurnal($rekening->Utang_Jasa_Sarana_Tindakan_Ralan, 'Utang Jasa Sarana Tindakan Ralan', 0, $totals['ttlmaterial']);
        }

        if ($totals['ttlbhp'] > 0) {
            $insertJurnal($rekening->HPP_BHP_Tindakan_Ralan, 'HPP BHP Tindakan Ralan', $totals['ttlbhp'], 0);
            $insertJurnal($rekening->Persediaan_BHP_Tindakan_Ralan, 'Persediaan BHP Tindakan Ralan', 0, $totals['ttlbhp']);
        }

        if ($totals['ttlmenejemen'] > 0) {
            $insertJurnal($rekening->Beban_Jasa_Menejemen_Tindakan_Ralan, 'Beban Jasa Menejemen Tindakan Ralan', $totals['ttlmenejemen'], 0);
            $insertJurnal($rekening->Utang_Jasa_Menejemen_Tindakan_Ralan, 'Utang Jasa Menejemen Tindakan Ralan', 0, $totals['ttlmenejemen']);
        }
    }


    private function generateNoJurnal()
    {
        $date = date('Y-m-d');
        $count = DB::table('jurnal')->whereDate('tgl_jurnal', $date)->count();
        $count += 1;
        $no_jurnal = 'JR'.date('Ymd').str_pad($count, 6, '0', STR_PAD_LEFT);
        return $no_jurnal;
    }

    private function writeOnJurnal(array $data)
    {
        $dataJurnal = [
            'no_jurnal' => $this->generateNoJurnal(),
            'tgl_jurnal' => date('Y-m-d'),
            'jam_jurnal' => date('H:i:s'),
            'no_bukti' => $data['no_rawat'],
            'jenis' => 'U',
            'keterangan' => 'TINDAKAN RAWAT JALAN '.$data['no_rkm_medis'].' '.$data['nm_pasien'].' DI POST OLEH  '.session()->get('pegawai')->nama,
        ];
        DB::table('jurnal')->insert($dataJurnal);
        $this->createDetailJurnal($dataJurnal['no_jurnal']);
    }

    private function createDetailJurnal($no_jurnal)
    {
        try {
            $data = DB::table('tampjurnal')->get();
            if ($data === null) {
                throw new \Exception('Tampjurnal table is empty');
            }
            $data = $data->map(function ($item) use ($no_jurnal) {
                return (array) [
                    'no_jurnal' => $no_jurnal,
                    'kd_rek' => $item->kd_rek,
                    'debet' => $item->debet,
                    'kredit' => $item->kredit,
                ];
            })->toArray();
            if (empty($data)) {
                throw new \Exception('Tampjurnal table is empty');
            }
            DB::table('detailjurnal')->insert($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }




}
