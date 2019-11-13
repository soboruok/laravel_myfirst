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
        @foreach($orderNo as $orderNo)
        <h3>{{ $orderNo->cat }}:{{ $orderNo->no }}, Quota : {{ $orderNo->status }} </h3>
       
        <table class="table w-100">
        <thead>
            <tr>
                <th>Date</th>
                <th>Stage</th>
                <th>title</th>
                <th>size</th>
                <th>color</th>
                <th>wiggle</th>
                <th>Completed</th>
                <th>memo</th>
            </tr>
        </thead>
        @endforeach

        @foreach($orderlist as $orderlist)
        <tbody>
            <tr>
                <td>{{ $orderlist->created_at }}</td>
                <td>
                    <?php  if ($orderlist->packing=='raw'){ ?>
                        {{ "Making Mat" }}
                    <?php   }  ?>

                    


                </td>
                <td>{{ $orderlist->title }}</td>
                <td>{{ $orderlist->size }}</td>
                <td>{{ $orderlist->color }}</td>
                <td>{{ $orderlist->wiggle }}</td>
                <td>{{ $orderlist->qty }}</td>
                <td>{{ $orderlist->memo }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>

  </div>
  <div class="col-2"></div>
</div>


    
@endsection
