<section class="content-header">
    <div class="container-fluid">
        <div class="row col-12 mb-2">
            <div class="col-sm-6">
                <h1>Edit Permission</h1>
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
                        <form wire:submit.prevent="update({{ $this->state['permission_id'] }})" method="POST"
                            enctype="multipart/form-data" id="form">
                            @csrf
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <p class="db_error"></p>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
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
                                                    <input type="text" class="form-control" wire:model="state.name" name="name"
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                    <span class="require name text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit"
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
   
    
</script>