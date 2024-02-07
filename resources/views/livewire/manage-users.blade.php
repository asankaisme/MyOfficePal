<div>
    <div class="card">
        <div class="card-header">Manage Users
            <span style="float: right;">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal"
                    data-target="#exampleModalCenter">
                    Add a User
                </button>
            </span>
        </div>
        <div class="card-body">

            {{-- table goes here --}}
            <table class="table table-sm table-hover">
                <span style="float: right; padding-bottom: 10px;"><input type="text" name="search" id="search"
                        wire:model.live.debounce.500ms="search" class="form-control form-control-sm" placeholder="Search"></span>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="delete({{ $user->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <span style="float: right;">{{ $users->links() }}</span>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
                            <button type="button btn-sm" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="addUser" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" wire:model="email" class="form-control" id="email"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" wire:model="name" class="form-control" id="name"
                                        aria-describedby="nameHelp" placeholder="Enter a username">
                                    <small id="nameHelp" class="form-text text-muted">User password will be set to
                                        "password" and user must change it.</small>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Add User" />
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="msg_area" style="padding-top: 10px;">
        @error('email')
            <small id="emailHelp" class="form-text text-muted" style="color: rgb(219, 40, 40)">{{ $message }}</small>
        @enderror

        @error('name')
            <small id="nameHelp" class="form-text text-muted" style="color: rgb(219, 40, 40)">{{ $message }}</small>
        @enderror

        @if (session()->has('msgSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('msgSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('msgFailed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('msgFailed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('userExist'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('userExist') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleteSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('deleteFaild'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleteFaild') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('selfDelete'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('selfDelete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>
