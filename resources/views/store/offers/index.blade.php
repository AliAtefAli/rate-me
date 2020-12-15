@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="d-table">
            <div class="container">
                <div class="table-option">
                    <div class="detele-option">
                        <input id="select-all" class="delete-all" type="checkbox" name="">
                        <label for="select-all">
                            تحديد الكل
                        </label>
                        <button class="btn btn-danger" data-toggle="modal"
                                data-target="#delete-products">حذف
                        </button>
                    </div>
                    <div class="add-service">
                        <a href="#" data-toggle="modal" data-target="#create-offer">
                            <i class="fas fa-plus-square"></i>
                        </a>
                    </div>
                </div>
                @include('dashboard.partials.session')
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>رقم</th>
                            <th>العنوان</th>
                            <th>الصورة</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <td><input data-id="{{ $offer->id }}" class="rocord-check" type="checkbox"></td>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->url }}</td>
                                <td><img src="{{ asset('assets/uploads/offers/' .  $offer->image ) }}" width="100" alt=""></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            اختيارات
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="#"  class="dropdown-item text-success" data-toggle="modal"
                                               data-target="#edit-offer-{{$offer->id}}">تعديل</a>
                                            <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                               data-target="#delete-offer-{{$offer->id}}">حذف</a>
                                        </div>
                                    </div>
                                </td>

                                @include('dashboard.offers.modal-delete')
                                @include('dashboard.offers.modal_edit')
                            </tr>
                        @endforeach
                        @include('dashboard.offers.modal_create')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            // Listen for click on toggle checkbox
            $('#select-all').click(function (event) {
                if (this.checked) {
                    // Iterate each checkbox
                    $(':checkbox').each(function () {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });

            $('#multi-delete').on('click', function (e) {
                var elements = $('.rocord-check:checked');
                  var  ids = [];

                elements.each(function () {
                    ids.push($(this).attr('data-id'));
                })

                console.log(ids
                )
                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    ids: ids,
                    success: function (data) {
                        if (data['success']) {
                            console.log(data['ids']);
                            $(".sub_chk:checked").each(function () {
                                $(this).parents("tr").remove();
                            });
                            // alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });


                // Multi delete
                {{--$("#multi-delete").click(function (e) {--}}
                {{--    e.preventDefault();--}}
                {{--    var elements = $('.rocord-check:checked'),--}}
                {{--        ids = [];--}}

                {{--    elements.each(function () {--}}
                {{--        ids.push($(this).attr('data-id'));--}}
                {{--    })--}}
                {{--    // console.log(elements.length);--}}
                {{--    // console.log(elements);--}}
                {{--    // console.log(ids);--}}

                {{--    --}}{{--$.ajax({--}}
                {{--    --}}{{--    url: "product/delete",--}}
                {{--    --}}{{--    method: "DELETE",--}}

                {{--    --}}{{--    data: {--}}
                {{--    --}}{{--        _token: '{{ csrf_token() }}',--}}
                {{--    --}}{{--        ids: ids,--}}
                {{--    --}}{{--    },--}}

                {{--    --}}{{--    success: function (response) {--}}
                {{--    --}}{{--    }--}}
                {{--    --}}{{--});--}}

                {{--});--}}
                //
                // if (ids.length <= 0) {
                //     alert("Please select row.");
                // } else {
                //         var join_selected_values = ids.join(",");
                //
                //         $.each(ids, function (index, value) {
                //             $('table tr').filter("[data-row-id='" + value + "']").remove();
                //         });
                // }
            });
        });
    </script>
@endsection
