<!--라라벨에서 제공하는 해더-->
@extends('layouts.app')



@section('title')
    about
@endsection

@section('content')


<div class="row mt-10">
  <div class="col-2">
  </div>
  <div class="col-8">
        <h3> Weaving Machine  </h3>
        <form action="/weavings/{{ $weavingID->id }}" method="POST">
        <!--CSRF Protection -->
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="title">Mat Name</label>
                <select class="form-control @error('title') is-invalid @enderror" id="title" name="title" >
                    <option value="">Select Mat</option>
                    <option value="Family"  {{ $weavingID->title=='Family'  ? 'selected' : '' }}>Family Size</option>
                    <option value="Olympic" {{ $weavingID->title=='Olympic' ? 'selected' : '' }}>Olympic Size</option>
                    <option value="Elite"   {{ $weavingID->title=='Elite'   ? 'selected' : '' }}>Olympic Elite Size</option>
                    <option value="Custom"  {{ $weavingID->title=='Custom'  ? 'selected' : '' }}>Custom Size</option>
                </select>

                @error('title')
                    {{$message}}
                @enderror
            </div>
            

            <div class="form-group w-75 p-3 p-1 size">
                <label for="size">Mat Size</label>
                <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" 
                name="size"  value="{{ old('size')?old('size'): $weavingID->size }}"> 
               
            </div>

            <div class="form-group">
                <label for="machine">Which Machine?</label>
                <select class="form-control @error('machine') is-invalid @enderror" id="machine" name="machine"  >
                    <option value="">Select Machine</option>
                    <option value="OL" {{ $weavingID->machine=='OL' ? 'selected' : '' }}>OLD LOOM</option>
                    <option value="NL" {{ $weavingID->machine=='NL' ? 'selected' : '' }}>NEW LOOM</option>
                    <option value="AL" {{ $weavingID->machine=='AL' ? 'selected' : '' }}>AUTO LOOM</option>
                </select>
                @error('machine')
                    {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="packing">Package</label>
                <select class="form-control @error('packing') is-invalid @enderror" id="packing" name="packing" >
                    <option value="">Select Package</option>
                    <option value="raw" {{ $weavingID->packing=='raw' ? 'selected' : '' }}>Raw</option>
                    <option value="nwr" {{ $weavingID->packing=='nwr' ? 'selected' : '' }}>no wiggles(Roll)</option>
                    <option value="nwf" {{ $weavingID->packing=='nwf' ? 'selected' : '' }}>no wiggles(Fold)</option>
                    <option value="wr"  {{ $weavingID->packing=='wr' ? 'selected' : '' }}>wiggled(Roll)</option>
                    <option value="wf"  {{ $weavingID->packing=='wf' ? 'selected' : '' }}>wiggled(Fold)</option>
                </select>

                <div class="form-group w-75 p-3 p-1 package">
                    <input type="text" class="form-control @error('wiggle') is-invalid @enderror" id="wiggle" 
                    name="wiggle"  value="{{ old('wiggle')?old('wiggle'):$weavingID->wiggle}}"> 
                </div>

                @error('wiggle')
                    {{$message}}
                @enderror
            </div>

            <div class="form-group color">
                <label for="color">Color</label>
                <select class="form-control @error('color') is-invalid @enderror" id="color" name="color">
                    <option value="">Select color</option>
                    <option value="green"   {{ $weavingID->color=='green' ? 'selected' : '' }}>Green</option>
                    <option value="blue"    {{ $weavingID->color=='blue' ? 'selected' : '' }}>Blue</option>
                    <option value="yellow"  {{ $weavingID->color=='yellow' ? 'selected' : '' }}>Yellow</option>
                    <option value="black"   {{ $weavingID->color=='black' ? 'selected' : '' }}>Black</option>
                </select>
               
            </div>
            

            <div class="form-group">
                <label for="Title">Q'ty</label> 
                <select class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty">
                    <option value="">Select Q'ty</option>
                    <option value="1" {{ $weavingID->qty==1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $weavingID->qty==2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $weavingID->qty==3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $weavingID->qty==4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ $weavingID->qty==5 ? 'selected' : '' }}>5</option>
                </select>
                @error('qty')
                    {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="memo">Memo:</label>
                <textarea class="form-control @error('memo') is-invalid @enderror" rows="5" id="memo" name="memo" >
                {{ old('memo') ? old('memo') :$weavingID->memo}}
                </textarea>
                
            </div>



            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- 유효성체크 -->
        @if($errors->any())
            {{ $errors }}
        @endif
  </div>
  <div class="col-2"></div>
</div>


    
@endsection

