@extends('layouts.admin.app')
@section('title', 'Permission')
@section('permission', 'active')
@section('content')
<section class="content-header">
<div class="container-fluid">
    <div class="row col-12 mb-2">
        <div class="col-sm-6">
            <h1>Create New Permission</h1>
        </div>

    </div>
</div>
</section>
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right">
                        <a href="{{ route('admin.permission.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.permission.store') }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <p class="db_error"></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="name">Permission Name&nbsp;<span
                                                        class="req">*</span></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name') }}">
                                                <span class="require name text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="button" onclick="submitForm(event);"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('scripts')
<script>
    function submitForm(e) {
        e.preventDefault();
        $('.require').css('display', 'none');
        let url = $("#form").attr("action");
        $.ajax({
            url: url,
            type: 'post',
            data: new FormData(this.form),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data.db_error) {
                    $(".alert-warning").css('display', 'block');
                    $(".db_error").html(data.db_error);
                } else if (data.errors) {
                    var error_html = "";
                    $.each(data.errors, function(key, value) {
                        error_html = '<div>' + value + '</div>';
                        $('.' + key).css('display', 'block').html(error_html);
                    });
                } else if (!data.errors && !data.db_error) {
                    location.href = data.redirectRoute;
                    toastr.success(data.msg);
                }

            }
        });
    }
</script>
@endsection
