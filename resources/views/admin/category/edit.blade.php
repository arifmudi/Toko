@section('title', 'Update Category')

    @extends('admin.templates.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-prmary card-blue">

                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>

                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter a Category Name" value="{{ old('name') ?? $category->name }}">

                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
