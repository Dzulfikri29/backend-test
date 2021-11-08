@extends('main')

@section('title')
    Penawaran
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <span>Penawaran</span>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('quotation.index') }}">Daftar Penawaran</a>
    </li>
    <li class="breadcrumb-item">
        <span>Detail</span>
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
                                @if ($quotation->status == 'success')
                                    <div class="border-0 alert-success mb-3 w-auto py-1 px-2 rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-50 mr-2">
                                                <img src="{{ asset('storage/' . $quotation->user->photo) }}" alt=""
                                                    srcset="">
                                            </div>
                                            <span>
                                                Penawaran disetujui oleh
                                                <b>{{ $quotation->user->name }}</b>
                                            </span>
                                        </div>
                                    </div>
                                @elseif($quotation->status == "pending")
                                    <div class="border-0 alert-warning mb-3 w-auto py-1 px-2 rounded">
                                        <div class="d-flex align-items-center">
                                            <span>
                                                Penawaran Menunggu Persetujuan
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="border-0 alert-danger mb-3 w-auto py-1 px-2 rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-50 mr-2">
                                                <img src="{{ asset('storage/' . $quotation->user->photo) }}" alt=""
                                                    srcset="">
                                            </div>
                                            <span>
                                                Penawaran ditolak oleh
                                                <b>{{ $quotation->user->name }}</b>
                                            </span>
                                        </div>
                                    </div>
                                @endif

                                <form id="form-data"
                                    action="{{ route('quotation.update', ['quotation' => $quotation->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Tanggal Penawaran</label>
                                                            <input type="text" class="form-control datepicker" id="date"
                                                                name="date" placeholder="Masukkan tanggal Penawaran"
                                                                required value="{{ $quotation->date ?? date('Y-m-d') }}">
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
                                                                placeholder="" required value="{{ $quotation->to }}">
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
                                                                rows="5">{{ $quotation->address }}</textarea>
                                                            @error('address')
                                                                <small
                                                                    class="text-danger error_address">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
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
                                                                        class="form-control select2" onchange="getItem()">
                                                                    </select>
                                                                </div>

                                                            </th>
                                                            <th width="20%" class="valign-top border-0 pl-0">
                                                                <div class="form-group">
                                                                    <label for="">Harga Penawaran</label>
                                                                    <input type="text" value="0"
                                                                        class="form-control text-right money"
                                                                        id="sell_price" onblur="countItemTotal()">
                                                                </div>
                                                            </th>
                                                            <th width="20%" class="valign-top border-0 pl-0">
                                                                <div class="form-group">
                                                                    <label for="">Qty</label>
                                                                    <input type="text" value="0"
                                                                        class="form-control text-right money" id="qty"
                                                                        onblur="countItemTotal()">
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
                                                        @foreach ($details as $key => $detail)
                                                            <tr id="row-saved{{ $detail->id }}" class="border-0">
                                                                <td class="border-0 pl-0">
                                                                    <input type="hidden" class="form-control form-sm"
                                                                        id="item_id_saved{{ $detail->id }}"
                                                                        value="{{ $detail->item_id }}">
                                                                    {{ $detail->item->name }} -
                                                                    {{ $detail->item->code }}
                                                                </td>
                                                                <td class="border-0 pl-0">
                                                                    <input type="text"
                                                                        class="form-control text-right form-sm money"
                                                                        id="sell_price_saved{{ $detail->id }}"
                                                                        value="{{ $detail->sell_price }}"
                                                                        onblur="updateSavedRow({{ $detail->id }})">
                                                                </td>
                                                                <td class="border-0 pl-0">
                                                                    <input type="text"
                                                                        class="form-control text-right form-sm money"
                                                                        id="qty_saved{{ $detail->id }}"
                                                                        value="{{ $detail->qty }}"
                                                                        onblur="updateSavedRow({{ $detail->id }})">
                                                                </td>
                                                                <td class="border-0 pl-0 text-right valign-middle">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-danger"
                                                                            onclick="deleteSavedRow({{ $detail->id }})">
                                                                            <i class="fa fa-minus"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <hr>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Notes</label>
                                                    <textarea class="form-control" id="notes" name="notes"
                                                        rows="5">{{ $quotation->notes }}</textarea>
                                                    @error('notes')
                                                        <small class="text-danger error_notes">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="mb-2">Lampiran Item</p>
                                                <div class="row skin">
                                                    <div class="col-md-12 col-sm-12">
                                                        <fieldset>
                                                            <input type="radio" name="attachment" id="input-radio-1"
                                                                value="none"
                                                                {{ $quotation->attachment == 'none' ? 'checked' : '' }}>
                                                            <label for="input-radio-1">Tidak ada lampiran</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="radio" name="attachment" id="input-radio-2"
                                                                value="all"
                                                                {{ $quotation->attachment == 'all' ? 'checked' : '' }}>
                                                            <label for="input-radio-2">Lampirkan semua item</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="radio" name="attachment" id="input-radio-3"
                                                                value="partial"
                                                                {{ $quotation->attachment == 'partial' ? 'checked' : '' }}>
                                                            <label for="input-radio-3">Lampirkan beberapa item</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 {{ $quotation->attachment == 'partial' ? '' : 'd-none' }}"
                                                id="input-attachment">
                                                <div class="form-group">
                                                    <label for="">Category Item</label>
                                                    <select name="category_id[]" id="category_ids"
                                                        class="form-control select2" multiple>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ in_array($category->id, $quotation->category_ids) ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @can('otorisasi penawaran', Model::class)
                                                <div class="col-md-4 offset-md-8">
                                                    <div class="form-group">
                                                        <label for="">Setujui Penawaran</label>
                                                        <fieldset>
                                                            <div class="float-left">
                                                                <input type="hidden" name="approval" value="true">
                                                                <input type="checkbox" class="switch" id="switch2"
                                                                    data-reverse="" hidden="" data-off-label="Tidak"
                                                                    data-on-label="Iya" name="is_approved" value="1"
                                                                    @if ($quotation->status == 'success') checked @endif>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="form-actions">
                                    <div class="text-right">
                                        @if ($quotation->status == 'success')
                                            @can('melihat penawaran', Model::class)
                                                <a target="_blank"
                                                    href="{{ route('quotation.export.pdf.detail', ['id' => $quotation->id]) }}"
                                                    class="btn btn-secondary" id="btn-export">Download PDF</a>
                                            @endcan
                                            @can('otorisasi penawaran', Model::class)
                                                <button onclick="$('#form-data').trigger('submit')"
                                                    class="btn btn-primary btn-save" value="save">Simpan</button>
                                            @endcan
                                        @else
                                            @can('memperbarui penawaran', Model::class)
                                                <button onclick="$('#form-data').trigger('submit')"
                                                    class="btn btn-primary btn-save" value="save">Simpan</button>
                                            @endcan
                                            @can('menghapus penawaran', Model::class)
                                                <button class="btn btn-danger"
                                                    onclick="showDeleteConfirm({{ $quotation->id }})">Hapus</button>
                                                <form id="delete-form{{ $quotation->id }}"
                                                    action="{{ route('quotation.destroy', ['quotation' => $quotation->id]) }}"
                                                    method="POST" class="d-none">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>
                                            @endcan
                                        @endif

                                        <a href="{{ route('quotation.index') }}" class="btn btn-warning">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('app-assets/js/select/supplier.js') }}"></script>
    <script src="{{ asset('app-assets/js/select/item.js') }}"></script>
    <script src="{{ asset('app-assets/js/quotation.js') }}"></script>
    <script>
        $('.menu-quotation').addClass('active');
        $(document).ready(function() {
            setTimeout(() => {
                $('body').addClass('menu-collapsed');
                $('body').removeClass('menu-expanded');
                $('.company-logo-text').addClass('d-none');
                $('.company-logo').removeClass('d-none');
            }, 1000);
        });

        $('input[name="attachment"]').change(function() {
            $('#btn-export').addClass('d-none');
            var value = $('input[name="attachment"]:checked').val();
            if (value == 'partial') {
                $('#input-attachment').removeClass('d-none');
            } else {
                $('#input-attachment').addClass('d-none');
                $('#category_ids').val('').trigger('change');
            }
        });
    </script>
@endsection
