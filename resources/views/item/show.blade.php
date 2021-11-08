@extends('main')

@section('title')
    Barang
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <span>Master</span>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('item.index') }}">Barang</a>
    </li>
    <li class="breadcrumb-item">
        <span>Edit</span>
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
                                <form id="form-data" action="{{ route('item.update', ['item' => $item->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Kode Barang</label>
                                                    <input type="text" class="form-control" id="code" name="code"
                                                        placeholder="Masukkan kode barang" required
                                                        value="{{ $item->code }}">
                                                    @error('code')
                                                        <small class="text-danger error_code">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nama Barang</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Masukkan nama barang" required
                                                        value="{{ $item->name }}">
                                                    @error('name')
                                                        <small class="text-danger error_name">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Satuan</label>
                                                    <select name="unit" id="unit" class="form-control select2" required>
                                                        <option value="">Pilih Satuan</option>
                                                        <option value="biji"
                                                            {{ $item->unit == 'biji' ? 'selected' : '' }}>Biji</option>
                                                        <option value="pack"
                                                            {{ $item->unit == 'pack' ? 'selected' : '' }}>Pack</option>
                                                        <option value="roll"
                                                            {{ $item->unit == 'roll' ? 'selected' : '' }}>Roll</option>
                                                    </select>
                                                    @error('unit')
                                                        <small class="text-danger error_unit">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Minimum Stock</label>
                                                    <input type="text" class="form-control" id="minimum_stock"
                                                        name="minimum_stock" placeholder="Masukkan minimal stock" required
                                                        value="{{ $item->minimum_stock }}">
                                                    @error('minimum_stock')
                                                        <small
                                                            class="text-danger error_minimum_stock">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12"></div>
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="" srcset=""
                                                    class="w-100 mb-2">
                                                <div class="form-group">
                                                    <label>Gambar</label>
                                                    <input type="file" class="form-control" id="image" name="image"
                                                        required value="{{ $item->image }}">
                                                    @error('image')
                                                        <small class="text-danger error_image">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea type="number" class="form-control" id="description"
                                                        name="description" placeholder="Masukkan Deskripsi" required
                                                        rows="5">{{ $item->description }}</textarea>
                                                    @error('description')
                                                        <small
                                                            class="text-danger error_description">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
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
                                        <button onclick="$('#form-data').trigger('submit')" class="btn btn-primary btn-save"
                                            value="save">Simpan</button>
                                        <button class="btn btn-danger"
                                            onclick="showDeleteConfirm({{ $item->id }})">Hapus</button>
                                        <form id="delete-form{{ $item->id }}"
                                            action="{{ route('item.destroy', ['item' => $item->id]) }}" method="POST"
                                            class="d-none">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                        <a href="{{ route('item.index') }}" class="btn btn-warning">Kembali</a>
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
    <script src="{{ asset('app-assets/js/select/category.js') }}"></script>
    <script src="{{ asset('app-assets/js/item.js') }}"></script>
    <script>
        $('.menu-item').addClass('active');
    </script>
@endsection
