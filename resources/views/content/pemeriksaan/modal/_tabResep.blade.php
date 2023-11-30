<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#tabsResepUmum" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Umum</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabsResepRacikan" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Racikan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabsRiwayatResep" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Riwayat</a>
            </li>
        </ul>
    </div>
    <div class="card-body p-3">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tabsResepUmum" role="tabpanel">
                @include('content.pemeriksaan.modal._resepUmum')
            </div>
            <div class="tab-pane fade" id="tabsResepRacikan" role="tabpanel">
                @includeIf('content.pemeriksaan.modal._resepRacikan')
            </div>
            <div class="tab-pane fade" id="tabsRiwayatResep" role="tabpanel">
                <h4>Activity tab</h4>
                <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
            </div>
        </div>
    </div>
    <div class="card-footer p-2">
        <button type="button" class="btn btn-sm btn-primary" id="btnTambahResep">Buat Resep</button>
        <button type="button" class="btn btn-sm btn-info" id="btnCetakResep"><i class="ti ti-printer"></i> Cetak Resep</button>

    </div>
</div>

@push('script')
    <script>
        function createResepObat(no_rawat, status, kd_dokter) {
            const resep = $.post('resep/create', {
                no_rawat: no_rawat,
                kd_dokter: kd_dokter,
                status: status,
            });

            return resep;
        }

        function getResep(data) {
            const resep = $.get('resep/get', data)
            return resep
        }


        function deleteResep(no_rawat) {
            const resepDokter = $.post('resep/delete', {
                no_rawat: no_rawat
            })
            return resepDokter;
        }


        function tambahResep(no_rawat) {
            tabelResepUmum.removeClass('d-none')
            tabelResepRacikan.removeClass('d-none')


            btnSimpanObat.removeClass('d-none')
            btnTambahObat.removeClass('d-none')
            btnTambahRacikan.removeClass('d-none')

            // tambahBarisObat(tabelResepUmum);
            const dokter = $('#nip').val()
            createResepObat(no_rawat, 'ralan', dokter).done((response) => {
                $('#no_resep').val(response.no_resep)
                btnTambahResep.removeClass('btn-primary').addClass('btn-danger');
                btnTambahResep.attr('onclick', `hapusResep('${response.no_resep}')`)
                btnTambahResep.text('Hapus Resep')
            }).fail((request) => {
                alertErrorAjax(request)
            })

        }

        function cetakResep(data) {
            window.open(`resep/print?no_rawat=${data.no_rawat}`)
        }


        function selectDataBarang(element, parrent) {
            const select2 = element.select2({
                dropdownParent: parrent,
                delay: 0,
                scrollAfterSelect: true,
                ajax: {
                    url: 'barang/get',
                    dataType: 'JSON',

                    data: (params) => {
                        const query = {
                            barang: params.term
                        }
                        return query
                    },
                    processResults: (data) => {
                        return {
                            results: data.map((item) => {
                                const items = {
                                    id: item.kode_brng,
                                    text: item.nama_brng,
                                    detail: item
                                }
                                return items;
                            })
                        }
                    }

                },
                cache: true

            });

            return select2;
        }
    </script>
@endpush
