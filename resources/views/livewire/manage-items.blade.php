<div>
    <div class="card">
        <div class="card-header">Manage Assets<span style="float:right;"><a href="{{ route('addAsset') }}" class="btn btn-sm btn-outline-primary">Add Items</a></span></div>
        <div class="card-body">
            <div style="margin-top: 10px; float: right;">
                <input type="text" name="search" id="search" class="form-control form-control-sm" wire:model.live.debounce.500ms="search" placeholder="Search">
            </div>
            <table style="margin-top: 50px;" class="table table-sm table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Asset Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td style="width:1000px;">{{ $asset->assetName }}</td>
                            <td>
                                <a href="#" ><img
                                src="{{ asset('images/delete-svgrepo-com.svg') }}" height="18px"
                                width="18px" alt="" title="Delete"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 10px; float: right;">
                {{ $assets->links() }}
            </div>
            
        </div>
    </div>
    
</div>
