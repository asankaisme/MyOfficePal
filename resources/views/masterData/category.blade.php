
{{ $i = 1 }}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                {{-- <a href="#" class="btn btn-sm btn-outline-primary" style="float: right">Add New</a> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#categoryModal" style="float: right">
                    Add New
                </button>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Manage Category') }}</div>

                    <div class="card-body">
                        
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Status</th>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                                @if (count($categories) > 0)
                                    
                                    @foreach ($categories as $category)

                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->categoryName }}</td>
                                            <td>{{ $category->status }}</td>
                                            <td>
                                                <a href="http://">Edit</a> |
                                                <a href="http://">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <p>No Records!! Please add some data</p>
                                </tr>
                                    
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('addCategory') }}">
                            @csrf
                            <div class="form-group">
                              <label for="categoryName">Category Name</label>
                              <input type="text" class="form-control" name="categoryName" aria-describedby="categoryHelp" placeholder="Category Name">
                            </div>
                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-sm btn-primary" value="Add">
                            </div>
                        </form>
                </div>
                </div>
            </div>
            <script type="text/javascript">
                $('#myInput').on('click', function () {
                $('#categoryModal').modal('show')
                })
            </script>
@endsection
