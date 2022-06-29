@extends('admin.layouts.master' , ['title' => 'Users'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Users</h4>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <div id="alert">

                            </div>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    {{ session('success') }}
                                </div>

                            @endif
                            @if (session()->has('fail'))
                                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    {{ session('fail') }}
                                </div>

                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                              class="form">
                                            <a href=""  data-toggle="modal" data-target="#exampleModall{{ $user->id }}" class="btn btn-warning btn-link btn-icon btn-sm"><i class="fa fa-edit"></i></a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm "><i
                                                    class="fa fa-times"></i></button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- end content-->
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div>

    {{-- Edit department model --}}
    @forelse ($users as $user)
        <div class="modal fade" id="exampleModall{{ $user->id }}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>

                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="editname" class="col-form-label">Name:</label>
                                <input name="name" type="text" value="{{ $user->name }}"
                                       class="form-control  @error('name') is-invalid @enderror" id="editname">
                            </div>

                            <div class="form-group">
                                <label for="editemail" class="col-form-label">Email:</label>
                                <input name="email" type="email" value="{{ $user->email }}"
                                       class="form-control  @error('email') is-invalid @enderror" id="editemail">
                            </div>

                            <div class="form-group">
                                <label for="editpassword" class="col-form-label">Password:</label>
                                <input name="password" type="password" placeholder="Leave empty for previous password"
                                       class="form-control  @error('password') is-invalid @enderror" id="editpassword">
                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-round">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @empty

    @endforelse

    {{-- Edit department modal end --}}

@endsection

