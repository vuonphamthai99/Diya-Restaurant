<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function showListTable(){
        $tables = Table::all();
        return view('staff.table-manage.table-list',compact('tables'));
    }
    public function showDetailTable(){
        return view('staff.table-manage.detail-table');
    }
    public function showEditTable($idTable){
        $table = Table::find($idTable);
        return view('staff.table-manage.detail-table',compact('table'));
    }

    public function storeTable(Request $request){
        if($request->idTable){
            Table::where('id',$request->idTable)->update([
                'section' => $request->section,
                'capacity' => $request->capacity,
                'status' => $request->status
            ]);
        return redirect()->route('showListTable')->with('success','Sửa thông tin bàn thành công!');

        }

        Table::create([
            'section' => $request->section,
            'capacity' => $request->capacity,
            'status' => $request->status
        ]);
        return redirect()->route('showListTable')->with('success','Thêm bàn thành công!');
    }
}
