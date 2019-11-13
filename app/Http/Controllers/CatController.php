<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Cat;
use Laravel\Weaving;

class CatController extends Controller
{
    //글 모두 보기
    public function index(){

        $catlist = Cat::all();

        //최근글을 위에
        $catlist=Cat::latest()->get();
        $catlist=Cat::orderBy('no', 'DESC')
                    ->orderBy('cat', 'DESC')
                    ->get();

        return view('cat.index', [
            'catlist' => $catlist
        ]);

    }

    //선택한 글 보여주기
    public function show(Cat $cat){

      //SELECT * FROM weavings a join cats b on a.cat=b.id 
      //WHERE a.cat = (select id from cats where id=2)

       $catid=$cat['id'];

       $orderlist=DB::table('weavings')
       ->select('weavings.created_at','weavings.title','weavings.size','weavings.packing',
       'weavings.color','weavings.wiggle','weavings.qty','weavings.memo')
       ->leftjoin('cats', 'cats.id', '=', 'weavings.cat')
       ->whereIn("weavings.cat", function ($query) use ($catid) {
        $query->select('id')
            ->from('cats')
            ->where('id', $catid);
        })->get();

        
        
       // select cat,no,qty from cats where id in (select id from cats where id=2)
        $orderNo=DB::table('cats')
       ->select('cat', 'no', 'qty','status')
       ->whereIn("id", function ($query) use ($catid) {
        $query->select('id')
            ->from('cats')
            ->where('id', $catid);
        })->get();


        return view('cat.show', [
            'orderlist' => $orderlist,
            'orderNo' => $orderNo
        ]);
    }
    

}
