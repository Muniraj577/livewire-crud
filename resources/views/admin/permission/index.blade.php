@extends('layouts.admin.app')
@section('title', 'Permission')
@section('permission', 'active')
@section('content')
    {{-- <section class="content-header">
<div class="container-fluid">
    <div class="row col-12 mb-2">
        <div class="col-sm-6">
            <h1>All Permissions</h1>
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
                        <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Permission
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="Permission" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                                <tr>
                                    <td>{{ ++$id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->slug }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section> --}}
    @livewire('permissions')


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            initializeDataTable('Permission');
        });
    </script>
@endsection
