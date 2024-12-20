@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{$titlePage}}</h5>
                                <a class="btn btn-success"
                                   href="{{route('admin.product.create')}}">Thêm sản phẩm</a>
                            </div>
                            <div class="d-flex justify-content-end">
                                <form class="d-flex align-items-center w-50" method="get"
                                      action="{{route('admin.product.index')}}">
                                    <input name="key_search" type="text" value="{{request()->get('key_search')}}"
                                           placeholder="Tìm kiếm tên sản phẩm" class="form-control" style="margin-right: 16px">
                                    <button class="btn btn-info" style="padding-top: 10px;padding-bottom: 10px"><i class="bi bi-search"></i></button>
                                    <a href="{{route('admin.product.index')}}" class="btn btn-danger" style="margin-left: 15px">Hủy </a>
                                </form>
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">...</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($listData))
                                    @foreach($listData as $key => $value)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>
                                                {{$value->name}}
                                            </td>
                                            <td>
                                                {{$value->name_category}}
                                            </td>
                                            <td>
                                                <div class="w-100 position-relative"
                                                     style="padding-top: 50%;min-width: 150px">
                                                    <img src="{{asset($value->src)}}" class="position-absolute w-100 h-100"
                                                         style="top: 0;left: 0;object-fit: cover">
                                                </div>
                                            </td>
                                            <td>
                                                @if($value->display == 1)
                                                    <span style="color: #0f5132">Hiện</span>
                                                    @else
                                                    <span style="color: red">Ẩn</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{url('admin/product/edit/'.$value->id)}}"
                                                           class="btn btn-icon btn-light btn-hover-success btn-sm"
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                           data-bs-original-title="Cập nhật">
                                                            <i class="bi bi-pencil-square "></i>
                                                        </a>
                                                        <a href="{{url('admin/product/delete/'.$value->id)}}"
                                                           class="btn btn-delete btn-icon btn-light btn-sm"
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                           data-bs-original-title="Xóa">
                                                            <i class="bi bi-trash "></i>
                                                        </a>
                                                    </div>
                                                    <a href="{{url('admin/product-video/index/'.$value->id)}}" class="btn btn-primary mt-2">Video</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                @else
                                    <tr>
                                        <td colspan="4" class="text-center" style="color: red;font-size: 18px">Không có dữ liệu</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $listData->appends(request()->all())->links('admin.pagination_custom.index') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->
@endsection
@section('script')
    <script>
        $('a.btn-delete').confirm({
            title: 'Xác nhận!',
            content: 'Bạn có chắc chắn muốn xóa bản ghi này?',
            buttons: {
                ok: {
                    text: 'Xóa',
                    btnClass: 'btn-danger',
                    action: function () {
                        location.href = this.$target.attr('href');
                    }
                },
                close: {
                    text: 'Hủy',
                    action: function () {
                    }
                }
            }
        });
    </script>
@endsection
