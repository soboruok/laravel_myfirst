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

<div class="row mt-10">
  <div class="col-1">
  </div>
  <div class="col-10">
        <h3> Things to do  </h3>
        <form action="/weavings" method="POST">
        <!--CSRF Protection -->
        @csrf
            <div class="form-group p-3 border bg-info">
                <h4> Work Order   </h4>
                <select multiple class="form-control @error('cat') is-invalid @enderror"
                name="cat"  value="{{ old('cat')?old('cat'):''}}" id="cat">
                    <option selected></option>
                    @foreach($catlist as $cat)
                    <option value="{{ $cat->id }}">
                  
                    {{ $cat->cat }}( {{ $cat->no }} ) / 
                    {{ $cat->packing }} /
                    {{ $cat->title }}( {{ $cat->size }} )
                    {{ $cat->color }} / ( {{ $cat->wiggle }} ) /
                    {{ "Remaining:". $cat->qty }} EA
                    
                    </option>
                    @endforeach
                </select>
               
                @error('cat')
                    {{"Please select Work Order"}}
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Mat Name</label>
                <select class="form-control @error('title') is-invalid @enderror" id="title" 
                name="title" value="{{ old('title')?old('title'):''}}">
                    <option selected></option>
                    <option value="Family">Family Size</option>
                    <option value="Olympic">Olympic Size</option>
                    <option value="Elite">Olympic Elite Size</option>
                    <option value="Custom">Custom Size</option>
                </select>

                @error('title')
                    {{"Please select Mat"}}
                @enderror
            </div>
            

            <div class="form-group w-75 p-3 p-1 size">
                <label for="size">Mat Size</label>
                <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" 
                name="size" placeholder="Enter size" value="{{ old('size')?old('size'):''}}"> 
               
            </div>

            <div class="form-group">
                <label for="machine">Which Machine?</label>
                <select class="form-control @error('machine') is-invalid @enderror" id="machine" 
                name="machine" value="{{ old('machine')?old('machine'):''}}">
                    <option slected></option>
                    <option value="OL">OLD LOOM</option>
                    <option value="NL">NEW LOOM</option>
                    <option value="AL">AUTO LOOM</option>
                </select>
                @error('machine')
                    {{"Please select machine"}}
                @enderror
            </div>

            <div class="form-group">
                <label for="packing">Stage</label>
                <select class="form-control @error('packing') is-invalid @enderror" id="packing" 
                name="packing" value="{{ old('packing')?old('packing'):''}}">
                    <option slected></option>
                    <option value="raw">Raw</option>
                    <option value="nwr">no wiggles(Roll)</option>
                    <option value="nwf">no wiggles(Fold)</option>
                    <option value="wr">wiggled(Roll)</option>
                    <option value="wf">wiggled(Fold)</option>
                </select>
                @error('packing')
                    {{"Please select Stage"}}
                @enderror

                <div class="form-group w-75 p-3 p-1 package">
                    <input type="text" class="form-control @error('wiggle') is-invalid @enderror" id="wiggle" 
                    name="wiggle" placeholder="Enter wiggle pattern" value="{{ old('wiggle')?old('wiggle'):''}}"> 
                </div>
            </div>

            <div class="form-group color">
                <label for="color">Color</label>
                <select class="form-control @error('color') is-invalid @enderror" id="color" 
                name="color" value="{{ old('color')?old('color'):''}}">
                    <option slected></option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="yellow">Yellow</option>
                    <option value="black">Black</option>
                </select>
               
            </div>
            

            <div class="form-group">
                <label for="Title">Q'ty</label> 
                <select class="form-control @error('qty') is-invalid @enderror" id="qty" 
                name="qty" value="{{ old('qty')?old('qty'):''}}">
                    <option slected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                @error('qty')
                    {{"Please select Q'ty"}}
                @enderror
            </div>

            <div class="form-group">
                <label for="memo">Memo:</label>
                <textarea class="form-control @error('title') is-invalid @enderror" rows="5" id="memo" name="memo" placeholder="Enter memo">
                {{ old('memo') ? old('memo') :''}}
                </textarea>
                
            </div>



            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- 유효성체크 -->
        <!--
        @if($errors->any())
            {{ $errors }}
        @endif
        -->
  </div>
  <div class="col-1"></div>
</div>


    
@endsection
