<div>
    <div class="page-heading">
        <h3>Data Pengeluaran</h3>
    </div>
    <section class="section">
        <div class="card">
            <div wire:loading wire:target="show_create_form">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </div>
            <!-- Flash Message Notification -->
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header">
                <a wire:click="show_create_form" class="btn btn-primary">Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pengeluaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengeluaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->jumlah, 0, '.', '.') }}</td>
                                    <td>{{ $item->tanggal_pengeluaran }}</td>

                                    <td>
                                        <a wire:click="show_edit_form({{ $item->id }})"
                                            class="btn btn-warning text-center">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a wire:click="delete({{ $item->id }})"
                                            onclick="return confirm('Anda yakin Menghapus data?')"
                                            class="btn
                                            btn-danger text-center"><i
                                                class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
