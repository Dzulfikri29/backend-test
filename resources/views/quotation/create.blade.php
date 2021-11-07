@extends('main')

@section('title')
    Penawaran
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <span class="text-bold-400">Penjualan</span>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('quotation.index') }}">Penawaran</a>
    </li>
    <li class="breadcrumb-item">
        <span>Tambah</span>
    </li>
@endsection
@section('content')
    <div class="content-body">
        <section class="grid-with-label" id="form-panel">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form id="form-data" action="{{ route('quotation.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Tanggal</label>
                                                            <input type="text" class="form-control datepicker" id="date"
                                                                name="date" placeholder="Masukkan tanggal" required
                                                                value="{{ @old('date') ?? date('Y-m-d') }}">
                                                            @error('date')
                                                                <small
                                                                    class="text-danger error_date">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Kepada</label>
                                                            <input type="text" class="form-control" id="to" name="to"
                                                                placeholder="" required value="{{ @old('to') }}">
                                                            @error('to')
                                                                <small
                                                                    class="text-danger error_customer_id">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" id="address" name="address"
                                                                placeholder="" required
                                                                rows="5">{{ @old('address') }}</textarea>
                                                            @error('address')
                                                                <small
                                                                    class="text-danger error_address">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 offset-md-4">

                                            </div>
                                            <div class="col-md-12 mb-5">
                                                <hr>
                                                <input type="hidden" id="count" value="0">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%" class="valign-top border-0 pl-0">
                                                                <div class="form-group">
                                                                    <label for="">Barang <span><i class="ft-info"
                                                                                id="item-info"></i></span></label>
                                                                    <br>
                                                                    <select name="item_id" id="item_id"
                                                                        class="form-control select2">
                                                                    </select>
                                                                </div>

                                                            </th>
                                                            <th width="20%" class="valign-top border-0 pl-0">
                                                                <div class="form-group">
                                                                    <label for="">Harga Penawaran</label>
                                                                    <input type="text" value="0"
                                                                        class="form-control text-right money"
                                                                        id="sell_price">
                                                                </div>
                                                            </th>
                                                            <th width="20%" class="valign-top border-0 pl-0">
                                                                <div class="form-group">
                                                                    <label for="">Qty</label>
                                                                    <input type="text" value="0"
                                                                        class="form-control text-right money" id="qty">
                                                                </div>
                                                            </th>
                                                            <th class="text-right border-0 pl-0 valign-top">
                                                                <button type="button" class="btn btn-primary btn-plus mt-2"
                                                                    onclick="addQuotation()">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data-detail">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Notes <small>(optional)</small></label>
                                                            <textarea class="form-control" id="notes" name="notes"
                                                                rows="5"></textarea>
                                                            @error('notes')
                                                                <small
                                                                    class="text-danger error_notes">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary btn-save"
                                                value="save">Simpan</button>
                                            <a href="{{ route('quotation.index') }}" class="btn btn-warning">Batal</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('app-assets/js/quotation.js') }}"></script>
    <script>
    $('.menu-quotation').addClass('active');
    </script>
@endsection
