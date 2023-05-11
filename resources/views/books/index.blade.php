@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  @include('layouts.alert')
    <div class="row">
      <div class="col-5 col-sm-9 col-xl-11 p-0">
        <h4 class="mb-1 mb-sm-0">Data Buku</h4>
      </div>
      
      <div class="col-12 col-sm-1 d-flex align-items-start justify-content-end">
        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto" data-toggle="modal" data-target="#createData">
          <span>Create</span>
        </button>
      </div>
    </div>

    <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
            <th scope="col">Price</th>
            <th scope="col">Published At</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
    
        <tbody>
          @foreach ($books as $book)
              <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>{{ $book->title }}</td>
                <td>{{ $book->user->name }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->published_at }}</td>
                <td><button type="button" class="btn btn-outline-warning btn-icon btn-icon-end w-100 w-sm-auto" data-toggle="modal" data-target="#updateData{{ $book->id }}">Edit
                </button></td>
                <td><a href="{{ url('books/'.$book->id. '/delete') }}" class="btn btn-danger">Delete</a></td>
              </tr>
          @endforeach
    
        </tbody>
    
      </table>
    </div>
</div>
@endsection
@push('modals')
    @include('books.modals.create')
    @include('books.modals.update')
@endpush