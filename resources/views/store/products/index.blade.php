@extends('store.layouts.master')

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
                        <a href="{{route('product.create')}}">
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
                            <th>أسم المنتج</th>
                            <th>أسم المنتج</th>
                            <th>المنيو</th>
                            <th>الحدث</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><input data-id="{{ $product->id }}" class="rocord-check" type="checkbox"></td>
                                <td>{{ $product->id }}</td>
                                <td><a href="{{ route('product.show', $product->id) }}"
                                       class="text-primary">{{ $product->name }}</a></td>
                                <td>{{ $product->description }}</td>
                                {{--                                <td>{{ $product->menu->name }}</td>--}}

                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}"
                                       class="edit btn btn-primary">تعديل</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#delete-product-{{$product->id}}">حذف</a>
                                </td>

                                <div class="modal fade  custom-imodal"
                                     id="delete-product-{{$product->id}}"
                                     tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">خذف منتج</h5>
                                                <button type="button" class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body custom-addpro">
                                                <div class="add-form">
                                                    <div class="contact-page">
                                                        <form
                                                            action="{{ route('category.destroy', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h2>هل تريد خذف منتج
                                                                "{{ $product->name }} "
                                                                ؟</h2>

                                                            <div class="submit-btn">
                                                                <button type="submit"
                                                                        class="brown">حذف
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade  custom-imodal" id="delete-products"
                                     tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">حذف منتجات </h5>
                                                <button type="button" class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body custom-addpro">
                                                <div class="add-form">
                                                    <div class="contact-page">
                                                            <h2>هل تريد حذف هذه المنتجات المحددة ؟</h2>

                                                            <div  class="submit-btn">
                                                                <button id="multi-delete" type="submit" class="brown" data-url="{{ url('dashboard/productDelete') }}">حذف</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
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
