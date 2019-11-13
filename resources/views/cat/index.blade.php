<!--라라벨에서 제공하는 해더-->
@extends('layouts.app')



@section('title')
    about
@endsection

@section('content')

<div class="row">
  <div class="col-2">
  </div>
  <div class="col-8">
        <h3> WORK ORDER </h3>
       
        <table class="table w-100">
        <thead>
            <tr>
                <th>Category/Number</th>
                <th>title</th>
                <th>size</th>
                <th>color</th>
                <th>packing</th>
                <th>wiggle</th>
                <th>Quota</th>
                <th>Remaining</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach($catlist as $catlist)
        <tbody>
            <tr>
                <td>{{ $catlist->cat }}/{{ $catlist->no }}</td>
                <td>{{ $catlist->title }}</td>
                <td>{{ $catlist->size }}</td>
                <td>{{ $catlist->color }}</td>
                <td>{{ $catlist->packing }}</td>
                <td>{{ $catlist->wiggle }}</td>
                <td>{{ $catlist->status }}</td>
                <td>{{ $catlist->qty }}</td>
                <td><a href="/cats/{{$catlist -> id}}">Details</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>

  </div>
  <div class="col-2"></div>
</div>


    
@endsection
