<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table" id="tabelRegistrasi">
                <thead>
                    <tr>
                        <th>1</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('script')
    <script type="" src="{{asset('libs/list.js/dist/list.min.js')}}"></script>
    <script>
        $(document).ready(() => {
            const tabelRegistrasi = new DataTable('#tabelRegistrasi')
            getRegPeriksa().done((registrasi) => {
                console.log('REGISTRASI===', registrasi);
            })
        })

        function getRegPeriksa(startDate = '', endDate = '') {
            const registrasi = $.get('registrasi/get', {
                startDate: startDate,
                endDate: endDate
            })
            return registrasi;
        }
    </script>
@endpush()
