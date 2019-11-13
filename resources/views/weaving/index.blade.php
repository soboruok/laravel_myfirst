<!--라라벨에서 제공하는 해더-->
@extends('layouts.app')



@section('title')
    about
@endsection

@section('content')

<script> 

$(function() {
    $('.size').hide(); 
    $('#title').change(function(){
        if($('#title').val() == 'Custom') {
            $('.size').show(); 
        } else {
            $('.size').hide(); 
        } 
    });

    
    $('.package').hide(); 
    $('#packing').change(function(){
        if($('#packing').val() == 'wr' || $('#packing').val() == 'wf') {
            $('.package').show();
        } else {
            $('.package').hide(); 
        } 
    });

    $('.color').hide();
    $('#packing').change(function(){
        if($('#packing').val() == 'raw'){
            $('.color').hide(); 
           
        } else {
            $('.color').show(); 
        }
    })

});

</script>

<div class="row">
  <div class="col-2">
  </div>
  <div class="col-8">
        <h3> Weaving Machine  </h3>
        <a href="/weavings/create">
         <button type="submit" class="btn btn-success">Create Today's task</button>
        </a>
        <table class="table w-100">
        <thead>
            <tr>
                <th>Regdated Date</th>
                <th>Stage</th>
                <th>Title</th>
                <th>Size</th>
                <th>Machine</th>
                <th>Wiggle</th>
                <th>Color</th>
                <th>Q'ty</th>
                <th>Select</th>
            </tr>
        </thead>
        @foreach($weavinglist as $weavinglist)
        <tbody>
            <tr>
                <td>{{ $weavinglist->created_at }}</td>
                <td>{{ $weavinglist->packing }}</td>
                <td>{{ $weavinglist->title }}</td>
                <td>{{ $weavinglist->size }}</td>
                <td>{{ $weavinglist->machine }}</td>
                <td>{{ $weavinglist->wiggle }}</td>
                <td>{{ $weavinglist->color }}</td>
                <td>{{ $weavinglist->qty }}</td>
                <td>
                <div class="form-group">
                    <a href="/weavings/{{ $weavinglist->id }}">
                        <button type="submit" class="btn btn-primary">View</button>
                    </a>
                </div>
            
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

  </div>
  <div class="col-2"></div>
</div>


    
@endsection
