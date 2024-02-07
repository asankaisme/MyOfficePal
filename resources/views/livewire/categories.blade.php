<div>
    {{-- <div class="row" style="float:right;">
            <form wire:submit.prevent="addCategory" method="post">
                <input type="text" wire:model="category" class="form-control form-control-sm">
                <input type="submit" value="Add" class="btn btn-sm btn-outline-primary">
            </form>
        </div> --}}
        <div>
            <div class="card" style="margin-top: 10px;">
                <div class="card-header">
                    Manage Category
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm table-striped" style="margin-top: 50px;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Category Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <span style="float:right; padding-bottom:10px;"><input class="form-control form-control-sm"
                                    type="text" name="search" id="search" wire:model.live.debounce.500ms="search"
                                    placeholder="Search"></span>
                            @foreach ($catData as $data)
                                <tr>
                                    <td style="width:1000px;">{{ $data->categoryName }}</td>
                                    <td>
                                        <a href="#" wire:click="deleteCategory({{ $data->id }})"><img
                                                src="{{ asset('images/delete-svgrepo-com.svg') }}" height="18px"
                                                width="18px" alt=""></a>
                                        {{-- <button class="btn btn-sm btn-danger" wire:click="delete({{ $data->id }})">Delete</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <span style="float: right;">
                            {{ $catData->links() }}
                        </span>
                    </div>
                </div>
            </div>
        <div>
            @error('category')
                <p class="" style="font-size: small;color:red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="row" style="padding-top: 10px;">
            @if ($success)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    New category added successfully!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div>
        @if (session('msgSuccess'))
        @include('includes.message')
        @endif
        
    </div>
    
</div>
