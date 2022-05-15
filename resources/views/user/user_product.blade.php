@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">

            <h2 class="modal-title">Add/Edit Products</h2>
    <form  action="{{route('user.product.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="container">
            <div class="row justify-content-center">
            <div class ="row">
                @csrf
                <div class="col-lg-12">
                    <label class="form-control-label">Title : </label>
                    <input type="text" id="txturl" name="title" class="form-control ">
                </div>


                <div class="col-lg-12">
                    <label class="form-control-label">Description: </label>
                    <textarea name="description" id="editor" class="form-control cols="40"  rows="10"></textarea>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputZip">Price :</label>
                    <input type="text" name="price" placeholder="0.00" class="form-control" id="inputZip">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Discount :</label>
                    <input type="text" name="discount" placeholder="0.00" class="form-control" id="inputZip">
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-control-label">Featured: </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="featured"><input type="checkbox" name="discount" value="0" /></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1" name="thumbnail" >upload file : </label>
                    <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="col-lg-3">
                    <ul class="list-group row">
                        <li class="list-group-item active"><h5>Status</h5></li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <select class="form-control" id="status" name="status">
                                    <option value="1">Pending</option>
                                    <option value="2">Publish</option>
                                </select>
                            </div>

                        </li>

                        <li class="list-group-item active"><h5>Select Categories</h5></li>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Add from this Categories :</label>
                            <select class="form-control" name="category_id" id="exampleFormControlSelect1">

                                @if($categories->count() >0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </ul>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="submit" name="submit" class="btn btn-primary btn-block " value="Add Product" />
                        </div>

                    </div>
                </div>
            </div>



        </div>

    </form>

@endsection
