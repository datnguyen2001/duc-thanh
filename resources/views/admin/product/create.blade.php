@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{$titlePage}}</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="bg-white p-4">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">Tên sản phẩm :</div>
                        <div class="col-8">
                            <input class="form-control" name="title" type="text" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 d-flex align-items-center">
                            <p class="m-0">Danh mục :</p>
                        </div>
                        <div class="col-8">
                            <select name="category_id" class="form-control" required>
                                <option value="">---- Chọn danh mục ----</option>
                                @foreach($category as $key => $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">Hình ảnh :</div>
                        <div class="col-8">
                            <div class="form-control position-relative" style="padding-top: 50%">
                                <button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">
                                    <i style="font-size: 30px" class="bi bi-download"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header bg-info text-white">
                            Mô tả
                        </div>
                        <div class="card-body mt-2">
                            <textarea name="describe" class="form-control" rows="5" maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header bg-info text-white">
                            Nội dung
                        </div>
                        <div class="card-body mt-2">
                            <textarea name="content" class="ckeditor">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">Trạng thái :</div>
                        <div class="col-8">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="display" checked type="checkbox"
                                       id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Hiện </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mx-3">Tạo</button>
                            <a href="{{route('admin.product.index')}}" class="btn btn-danger">Hủy</a>
                        </div>
                        <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" hidden>
                    </div>
                </form>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height:'500px'
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $('input[name="category"]').click(function () {
            let value = $(this).val();
            $('input[name="category"]').prop("checked", false);
            $(this).prop("checked", true);
            $.ajax({
                url: window.location.origin + '/admin/category/get-children-c2',
                type: 'post',
                dataType: 'json',
                data: {"cate_id": value, "name": "category_children"},
                success: function (data) {
                    $("[list_category_children]").html(data.html);
                }
            });
        });

        let parent;
        $(document).on("click", ".select-image", function () {
            $('input[name="file"]').click();
            parent = $(this).parent();
        });
        $('input[type="file"]').change(function(e){
            imgPreview(this);
        });
        function imgPreview(input) {
            let file = input.files[0];
            let mixedfile = file['type'].split("/");
            let filetype = mixedfile[0];
            if(filetype == "image"){
                let reader = new FileReader();
                reader.onload = function(e){
                    $("#preview-img").show().attr("src", );
                    let html = '<div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">' +
                        '<button type="button" class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%"><i class="bi bi-x-lg text-white"></i></button>'+
                        '<img src="'+e.target.result+'" class="w-100 h-100" style="object-fit: cover">' +
                        '</div>';
                    parent.html(html);
                }
                reader.readAsDataURL(input.files[0]);
            }else if(filetype == "video" || filetype == "mp4"){
                let html = '<div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">' +
                    '<button type="button" class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%;z-index: 14"><i class="bi bi-x-lg text-white"></i></button>'+
                    '<video class="w-100 h-100" style="object-fit: cover" controls>\n' +
                    '<source src="'+URL.createObjectURL(input.files[0])+'"></video>'+
                    '</div>';
                parent.html(html);
            }else{
                alert("Invalid file type");
            }
        }
        $(document).on("click", "button.clear", function () {
            $(".div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            parent.html(html);
            console.log(html)
            console.log(parent)
            $('input[type="file"]').val("");
        });
    </script>
@endsection
