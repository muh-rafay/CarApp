@extends('admin.layouts.master', ['title' => 'Cars'])

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Cars</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" data-toggle="modal" data-target="#exampleModal1" class="btn btn-info btn-round"><i
                                        class="fa fa-plus mr-2"></i> Add New Car</a>
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
                                <th>Car Name</th>
                                <th>Category</th>
                                <th>Model</th>
                                <th>Make</th>
                                <th>Color</th>
                                <th>Registration No</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($cars as $car)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $car->name }}</td>
                                    <td>{{ $car->category->name }}</td>
                                    <td>{{ $car->make }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->registration_no }}</td>
                                    <td class="text-right">
                                        <form action="{{ route('cars.destroy', $car->id) }}" method="post"
                                              class="form">

                                            <a href="" data-toggle="modal"
                                               data-target="#exampleModall{{ $car->id }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Car</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('cars.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-form-label">Car Name:</label>
                            <input required name="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                                   id="name">
                        </div>

                        <div class="form-group">
                            <label for="category_id" class="col-form-label">Category:</label>
                            <select required name="category_id" class="form-control  @error('category_id') is-invalid @enderror"
                                    id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                </div>

                        <div class="form-group">
                            <label for="make" class="col-form-label">Make:</label>
                            <input required name="make" type="text" class="form-control  @error('make') is-invalid @enderror"
                                   id="make">
                        </div>
                        <div class="form-group">
                            <label for="model" class="col-form-label">Model:</label>
                            <input required name="model" type="text" class="form-control  @error('model') is-invalid @enderror"
                                   id="model">
                        </div>
                        <div class="form-group">
                            <label for="color" class="col-form-label">Color:</label>
                            <input required name="color" type="text" class="form-control  @error('color') is-invalid @enderror"
                                   id="color">
                        </div>
                        <div class="form-group">
                            <label for="registration_no" class="col-form-label">Registration No:</label>
                            <input required name="registration_no" type="text" class="form-control  @error('registration_no') is-invalid @enderror"
                                   id="registration_no">
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
    {{-- Add department modal end --}}

    {{-- Edit department model --}}
    @forelse ($cars as $car)
        <div class="modal fade" id="exampleModall{{ $car->id }}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>

                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('cars.update', $car->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" class="col-form-label">Car Name:</label>
                                <input required name="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                                       id="name" value="{{ $car->name }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="col-form-label">Category:</label>
                                <select required name="category_id" class="form-control  @error('category_id') is-invalid @enderror"
                                        id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if ($car->category_id == $category->id)
                                                    selected
                                                @endif
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="make" class="col-form-label">Make:</label>
                                <input required name="make" type="text" class="form-control  @error('make') is-invalid @enderror"
                                       id="make" value="{{ $car->make }}">
                            </div>
                            <div class="form-group">
                                <label for="model" class="col-form-label">Model:</label>
                                <input required name="model" type="text" class="form-control  @error('model') is-invalid @enderror"
                                       id="model" value="{{ $car->model }}">
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-form-label">Color:</label>
                                <input required name="color" type="text" class="form-control  @error('color') is-invalid @enderror"
                                       id="color" value="{{ $car->color }}">
                            </div>
                            <div class="form-group">
                                <label for="registration_no" class="col-form-label">Registration No:</label>
                                <input required name="registration_no" type="text" class="form-control  @error('registration_no') is-invalid @enderror"
                                       id="registration_no" value="{{ $car->registration_no }}">
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
