<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Weaving;
use Laravel\Cat;

class Weavingcontroller extends Controller
{
    public function index(){

        $weavinglist = Weaving::all();

        //최근글을 위에
        $weavinglist=Weaving::latest()->get();
        $weavinglist=Weaving::orderBy('created_at', 'DESC')
                    ->orderBy('packing', 'DESC')
                    ->get();
                    

        return view('weaving.index', [
            'weavinglist' => $weavinglist
        ]);

    }


    public function create()
    {

        $catlist = Cat::all();

        //최근글을 위에
        $catlist=Cat::latest()->get();
        $catlist=Cat::orderBy('no', 'DESC')
                    ->orderBy('cat', 'DESC')
                    ->get();

        return view('weaving.create', [
            'catlist' => $catlist
        ]);

    }

    public function store(Request $request){
       
        //validation 체크
        request()->validate([
            'cat' => 'required',
            'title' => 'required',
            'machine' => 'required',
            'packing' => 'required',
            'qty' => 'required'
        ]);

        $values=([
            'title' => $request->input('title'),
            'size' => $request->input('size'),
            'machine' => $request->input('machine'),
            'packing' => $request->input('packing'),
            'wiggle' => $request->input('wiggle'),
            'color' => $request->input('color'),
            'qty' => $request->input('qty'),
            'memo' => $request->input('memo'),
            'cat' => $request->input('cat')
        ]);

        /*
        echo "title:". $values['title']; echo "<br>";
        echo "size:".$values['size'];echo "<br>";
        echo "machine:".$values['machine'];echo "<br>";
        echo "packing:".$values['packing'];echo "<br>";
        echo "wiggle:".$values['wiggle'];echo "<br>";
        echo "color:".$values['color'];echo "<br>";
        echo "qty:".$values['qty'];echo "<br>";
        echo "memo:".$values['memo'];
        exit;
        */
        

        if ($values['packing']=='nwr'){
            $values['packing']='no wiggles(Roll)';
        } else if ($values['packing']=='nwf'){
            $values['packing']='no wiggles(Fold)';
        } else if ($values['packing']=='wr'){
            $values['packing']='no wiggles(Fold)';
        } else if ($values['packing']=='wf'){
            $values['packing']='wiggled(Fold)';
        }

        if ($values['title']=='Family'){
            $values['size']='12x6';
        } else if ($values['title']=='Olympic'){
            $values['size']='14x6';
        } else if ($values['title']=='Elite'){
            $values['size']='14x7';
        }      
        
        
        //
        
        $Weaving=Weaving::create($values);
        //echo "cat:".$Weaving;

        //update cats set qty=qty-1 where id='$values['cat']'
        $catid=$values['cat'];
        $sql5 = "update cats set qty=qty-1 where id='$catid' ";
        DB::statement($sql5);
        
        
        return redirect('/weavings/'.$Weaving->id);

    }

    public function show(Weaving $weavingID){

        echo $weavingID;
        
        return view('Weaving.show', [
            'weavingID' => $weavingID
        ]);
        
    }

    public function edit(Weaving $weavingID){
        return view('Weaving.edit', [
            'weavingID' => $weavingID
        ]);
    }

    public function update(Weaving $weavingID, Request $request){


        //모델의 Task를 생성한다. 
        $weavingID->update([
            'title' => $request->input('title'),
            'size' => $request->input('size'),
            'machine' => $request->input('machine'),
            'packing' => $request->input('packing'),
            'wiggle' => $request->input('wiggle'),
            'color' => $request->input('color'),
            'qty' => $request->input('qty'),
            'memo' => $request->input('memo')
        ]);

 
        return redirect('/weavings/'.$weavingID->id);
    }

}
