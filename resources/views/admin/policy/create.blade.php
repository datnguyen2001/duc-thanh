@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thêm mới chính sách</h5>
                            <!-- General Form Elements -->
                            <form action="{{route('admin.policy.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Tên chính sách</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" required class="form-control">
                                    </div>
                                </div>
                                <div class="card mb-5">
                                    <div class="card-header bg-info text-white">
                                        Nội dung
                                    </div>
                                    <div class="card-body mt-2">
                                        <textarea name="content" class="ckeditor" maxlength="3000">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Vị trí</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="index" required class="form-control" value="1">
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-3"></div>
                                    <div class="col-8">
                                        <button type="submit" class="btn btn-primary">Tạo</button>
                                        <a href="{{route('admin.policy.index')}}" class="btn btn-danger">Hủy</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: '500px'
        });
    </script>
@endsection
