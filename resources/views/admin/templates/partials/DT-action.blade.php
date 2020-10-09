<a href="/admin/{{ request()->segment(3) }}/{{ $model->id }}/edit" class="btn btn-warning"> <i class="fa fa-edit"></i>
</a>
<button class="btn btn-danger" id="delete" data-id="{{ $model->id }}"><i class="fa fa-trash"></i></button>
