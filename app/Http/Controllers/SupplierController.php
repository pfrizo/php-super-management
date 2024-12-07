<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /*public function index(){
        $suppliers = [
            0 => [
                'name' => 'supplier1',
                'status' => 'I',
                'cnpj' => ''
            ]
        ];

        return view('app.supplier.index', compact('suppliers'));
    }*/

    public function index(){
        return view('app.supplier.index');
    }

    public function list(Request $request){

        $suppliers = Supplier::with(['products'])->where('name', 'like', '%'.$request->input('name').'%')
            ->where('website', 'like', '%'.$request->input('website').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(3);


        return view('app.supplier.list', ['suppliers' => $suppliers, 'request' => $request->all()]);
    }

    public function add(Request $request){

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
            $rules = [
                'name' => 'required|min:3|max:50',
                'website' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'name.max' => 'O campo nome deve ter no máximo 50 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email.email' => 'O campo E-mail não foi preenchido corretamente',
            ];

            $request->validate($rules, $feedback);

            $supplier = new Supplier();
            $supplier->create($request->all());

            $msg = 'Cadastro concluído com sucesso!';
        }

        if($request->input('_token') != '' && $request->input('id') != ''){
            $supplier = Supplier::find($request->input('id'));
            $update = $supplier->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso!';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.supplier.edit', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.supplier.add', ['msg' => $msg]);
    }

    public function edit($id, $msg = ''){

        $supplier = Supplier::find($id);

        return view('app.supplier.add', ['supplier' => $supplier, 'msg' => $msg]);

    }

    public function delete($id){
        Supplier::find($id)->delete();
        //Supplier::find($id)->forceDelete();

        return redirect()->route('app.supplier');
    }
}
