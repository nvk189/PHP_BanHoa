<?php

namespace App\Http\Controllers;

use  App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $type = Type::get();
        return view('type.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all('pt_name');
        $type = Type::create($data);
        if ($type) {

            return redirect('type')->with('status', 'thêm thành công!');
        } else {
            return back()->withErrors(['error' => 'lỗi thêm sản phẩm ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $type = Type::find($id);
        return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id, Type $type)
    {
        $data = $request->only(['pt_name']);
        $productId = $request->input('pt_id');

        $tp = $type->where('pt_id', $productId)->update($data);


        if ($tp) {
            return redirect('type/create')->with('status', 'Cập nhật thành công!');
        } else {
            return back()->withErrors(['error' => 'Lỗi cập nhật sản phẩm']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::statement('CALL DeletePrType(?)', [$id]);
        return redirect()->back()->with('status', 'xóa thành công');
    }
}
