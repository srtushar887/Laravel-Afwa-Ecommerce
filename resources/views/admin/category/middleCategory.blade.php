@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Middle Category</h4>

                <div class="page-title-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createTopCategory">Create New</button>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a class="navbar-brand">Category List</a>
                        <form class="form-inline" action="{{route('admin.search.mid.category')}}" method="get">
                            @csrf
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Top Category Name</th>
                                <th>Middle Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mid_cats as $mcat)
                                <?php
                                $top_ct = \App\top_category::where('id',$mcat->top_cat_id)->first();

                                ?>
                                <tr>
                                    <td>
                                        @if ($top_ct)
                                            {{$top_ct->category_name}}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>{{$mcat->category_name}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTopCategory{{$mcat->id}}"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteTopCategory{{$mcat->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteTopCategory{{$mcat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Middle Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.delete.middlecategory')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this top category ?
                                                        <input type="hidden" class="form-control" name="delete_category" value="{{$mcat->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                                <div class="modal fade" id="editTopCategory{{$mcat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Middle Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.update.middlecategory')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Main Category</label>
                                                        <select class="form-control" name="top_cat_id">
                                                            <option value="0">select any</option>
                                                            @foreach($top_cats as $tcat)
                                                                <option value="{{$tcat->id}}" {{$mcat->top_cat_id == $tcat->id ? 'selected' : ''}}>{{$tcat->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Category Name</label>
                                                        <input type="text" class="form-control" name="category_name" value="{{$mcat->category_name}}">
                                                        <input type="hidden" class="form-control" name="edit_category" value="{{$mcat->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                            </tbody>
                        </table>
                        {{$mid_cats->links()}}
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>





    <div class="modal fade" id="createTopCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Middle Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.save.middlecategory')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Main Category</label>
                            <select class="form-control" name="top_cat_id">
                                <option value="0">select any</option>
                                @foreach($top_cats as $tcat)
                                    <option value="{{$tcat->id}}">{{$tcat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Middle Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
