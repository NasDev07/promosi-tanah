@extends('layouts.admin_template')
@section('title', 'Data Pesan')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pesan /</span> Data Pesan Tanah</h4>

        <!-- Basic Bootstrap Table -->
        <div class="row mt-3">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <h5 class="card-header">List Data Pembeli</h5>
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="{{ route('pesanTanah') }}" method="GET">
                                            <label class="form-label" for="tanggal">Pilih Tanggal:</label>
                                            <input class="form-control" type="date" name="tanggal" id="tanggal">
                                            <button class="btn btn-info mt-2" type="submit">Cari</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>No HP Pembeli</th>
                                                <th>Data Penjual Tanah</th>
                                                <th>Email</th>
                                                <th>Pesan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($listdata as $data)
                                                <tr>
                                                    <td>{{ $data->created_at->format('M j, Y H:i:s') }}</td>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $data->name }}</strong>
                                                    </td>
                                                    <td>
                                                        {{ $data->nomor_hp }}
                                                        <span class="badge bg-label-info me-1">
                                                            <a target="_black"
                                                                href="https://wa.me/082288715038?text=Assalamualaikum%20%20atas%20nama%20{{ $data->name }}%20meinformasikan%20bahwa%20Tanah%20anda%20ada%20yang%20beli%20silahkan%20persiapkan%20Berkas.%0A%0ATerima%20kasih."><i
                                                                    class="bi bi-whatsapp"></i></a>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('promosi-tanah') }}"
                                                            target="_black">{{ $data->pilihan }}</a>
                                                    </td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->message }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                {{ $listdata->withQueryString()->links() }}
                            </div>
                            <!--/ Basic Bootstrap Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('pilihan').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const sellerId = selectedOption.getAttribute('data-seller');
            const phoneNumber = '{{ $listpenjual }}' [sellerId - 1].noHp; // Adjust index
            document.getElementById('nomor_hp').value = phoneNumber;
        });
    </script>

@endsection
