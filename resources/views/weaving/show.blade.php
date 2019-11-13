<!--라라벨에서 제공하는 해더-->
@extends('layouts.app')

@section('title')
   weaving
@endsection

@section('content')



<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <h3> Today's Tasks  </h3>
    
    <a href="/weavings/create">
        <button type="submit" class="btn btn-success">Create Today's task</button>
    </a>
    <a href="/weavings">
        <button type="submit" class="btn btn-dark">View All task</button>
    </a>

    <table class="table w-100">
        <thead>
        <tr>
            <th>title</th>
            <th>size</th>
            <th>machine</th>
            <th>packing</th>
            <th>wiggle</th>
            <th>color</th>
            <th>qty</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $weavingID->title }}</td>
            <td>{{ $weavingID->size }}</td>
            <td>{{ $weavingID->machine }}</td>
            <td>{{ $weavingID->packing }}</td>
            <td>{{ $weavingID->wiggle }}</td>
            <td>{{ $weavingID->color }}</td>
            <td>{{ $weavingID->qty }}</td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <th colspan="7">Memo</th>
        </tr>
        <tr>
            <td colspan="7">
                {{ $weavingID->memo }}
            </td>
        </tr>
        </tbody>
    </table>

    <div class="form-group">
        <a href="/weavings/{{ $weavingID->id }}/edit">
            <button type="submit" class="btn btn-primary">Edit</button>
        </a>
        <form method="Post" action="/weavings/{{ $weavingID->id }}" class="float-right">
            @csrf
            @method('Delete')
            <button type="submit" class="btn btn-danger">Del</button>
        </form>
    </div>
    
  </div>

  </div>
  <div class="col-2"></div>
</div>



    
@endsection
