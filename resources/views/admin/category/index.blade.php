@extends('admin.layouts.master', ['title' => 'Category'])

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Category</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" data-toggle="modal" data-target="#exampleModal1" class="btn btn-info btn-round"><i
                                        class="fa fa-plus mr-2"></i> Add New Category</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
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
                                <th>Sno</th>
                                <th>Category Name</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($categorys as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-right">
                                        <form action="{{ route('category.destroy', $item->id) }}" method="post"
                                              class="form">

                                            <a href="" data-toggle="modal"
                                               data-target="#exampleModall{{ $item->id }}"
                                               class="btn btn-warning btn-link btn-icon btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm "><i
                                                    class="fa fa-times"></i></button>

                                        </form>

                                    </td>
                                </tr>


                            @empty

                            @endforelse

                            </tbody>
                        </table>
                    </div><!-- end content-->
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div>

    {{-- Add department modal --}}

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input required name="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                                   id="name">
                        </div>

                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-round">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Add department modal end --}}

    {{-- Edit department model --}}
    @forelse ($categorys as $item)
        <div class="modal fade" id="exampleModall{{ $item->id }}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>

                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('category.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" class="col-form-label">Category Name:</label>
                                <input name="name" type="text" value="{{ $item->name }}"
                                       class="form-control  @error('name') is-invalid @enderror" id="name">
                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-round">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    @empty

    @endforelse

    {{-- Edit department modal end --}}

@endsection
