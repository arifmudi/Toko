@section('title', 'Edit Product')

    @extends('admin.templates.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-prmary card-blue">

                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>

                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group">
                            <label>Produtc Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter a Product Name" value="{{ old('name') ?? $product->name }}">

                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Produtc Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder=" Enter Product Description">{{ old('description') ?? $product->description }}</textarea>

                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Produtc Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                placeholder="Enter a Product Image" value="{{ old('image') }}">

                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Produtc Categories</label>
                            <select name="categories[]" id="categories" class="form-control select2bs4" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($product->categories->contains($category))
                                        selected="selected"
                                @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('categories')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                placeholder="Enter a Product Price" value="{{ old('price') ?? $product->price }}">

                            @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror"
                                placeholder="Enter a Product Quantity" value="{{ old('qty') ?? $product->qty }}">

                            @error('qty')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets\plugins\select2\css\select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css') }}">
@endpush




@push('scripts')
    <script src="{{ asset('assets\plugins\select2\js\select2.full.min.js') }}"></script>

    <script>
        $(function() {
            $('.select2').select2();

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        })

    </script>
@endpush
