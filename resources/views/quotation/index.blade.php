@extends('main')

@section('title')
    Penawaran
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <span>Penjualan</span>
    </li>
    <li class="breadcrumb-item">
        <a href="#">Penawaran</a>
    </li>
@endsection
@section('content')
    <div class="content-body">
        <section id="table-panel">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <a href="{{ route('quotation.create') }}" class="btn btn-primary">Tambah Penawaran</a>
                            </div>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped datatable-config" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>No. Penawaran</th>
                                            <th>Kepada</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $('.menu-quotation').addClass('active');

        setTimeout(() => {
            $('body').addClass('menu-collapsed');
            $('body').removeClass('menu-expanded');
            $('.company-logo-text').addClass('d-none');
            $('.company-logo').removeClass('d-none');
        }, 1000);

        $('.datatable-config').dataTable();
    </script>
@endsection
