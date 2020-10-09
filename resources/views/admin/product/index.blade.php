@extends('admin.templates.default')

@section('title', 'Data Product')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Data {{ Breadcrumbs::current()->title }}</h3>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-4">Add Product</a>
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        {{-- <th>Categories</th> --}}
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
@endsection


@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    {{-- alert --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    {{-- Alert --}}
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(function() {
            $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "autoWidth": true,
                ajax: "{{ route('admin.products.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searachable: false,
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'description'
                    },
                    // {
                    //     data: 'description'
                    // },
                    {
                        data: 'image'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'qty'
                    },
                    {
                        data: 'action'
                    },
                ]
            })
        })

        // alert delete
        $('#dataTable').on('click', 'button#delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log(id);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/products/" + id,
                        data: {
                            "id": id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                            location.reload(true);
                        }
                    })

                }
            })


        })

    </script>

@endpush
