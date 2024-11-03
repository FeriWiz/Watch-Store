<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">عکس</th>
            <th class="text-center align-middle text-primary">نام اسلایدر</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $index => $slider)
            <tr>
                <td class="text-center align-middle">{{$sliders->firstItem() + $index}}</td>
                <td class="text-center align-middle">
                    <figure class="avatar avatar">
                        <img src="{{url('images/admin/sliders/big/'.$slider->image)}}" class="rounded-circle" alt="image">
                    </figure>
                </td>
                <td class="text-center align-middle">{{$slider->title}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('sliders.edit', $slider->id)}}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">حذف</button>
                    </form>
                </td>

                <td class="text-center align-middle">
                    {{Verta::instance($slider->created_at)->format('%d, %B, %Y')}}
                </td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$sliders->appends(Request::except('page'))->links()}}
    </div>
</div>

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        window.addEventListener('deleteCategory', event=>{--}}
{{--            Swal.fire({--}}
{{--                text: "آیا از حذف دسته بندی مطمئن هستید؟",--}}
{{--                icon: "warning",--}}
{{--                showCancelButton: true,--}}
{{--                confirmButtonColor: "#3085d6",--}}
{{--                cancelButtonColor: "#d33",--}}
{{--                confirmButtonText: "بله حذف کن",--}}
{{--                cancelButtonText: 'خیر'--}}
{{--            }).then((result) => {--}}
{{--                if (result.isConfirmed) {--}}
{{--                    Swal.fire(--}}
{{--                        'دسته بندی با موفقیت حذف شد '--}}
{{--                    );--}}
{{--                }--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}