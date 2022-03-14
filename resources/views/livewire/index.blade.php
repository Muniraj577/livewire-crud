<section class="content-header">
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
                            <button wire:click="create" class="btn btn-primary">
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
                                    <th class="hidden">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $permission)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" wire:click="edit({{ $permission->id }})">Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
