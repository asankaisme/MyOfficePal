@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <a href="#" class="btn btn-sm btn-outline-primary" style="float: right">Add New</a>
        </div>
    </div>
    <div class="row justify-content-center py-2">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Manage Category') }}</div>

                <div class="card-body">
                    
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoty Name</th>
                            <th scope="col">Status</th>
                            <td></td>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($categories) > 0)
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
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
</div>
@endsection