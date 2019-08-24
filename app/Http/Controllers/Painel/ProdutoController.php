<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

use Illuminate\Http\validate;

use \App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{

    private $product;

    public function __construct(Product $product){

        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'Listagem dos produtos';
        $products = $this->product->all();
        
        return view('painel.products.index',compact('products','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = ['Eletronicos','Moveis','Limpeza','Banho'];

        $title = 'Cadastrar Novo Produto';
        return view('painel.products.create-edit',compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {

       // dd($request->only(['name','number']));//Pega alguns campos
       // dd($request->except(['name']));//Pega todos os campos except name

       

        //Pega os dados do formulario
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active']))? 0 : 1;

       


       /*$messages = [
                'name.required'=>'O campo nome é de preenchimento obrigatório',
                'number.numeric'=>'O campo número precisa ser apenas números',
                'number.required'=>'O campo número é de preenchimento obrigatório',
       ];

       // $this->validate($request,$this->product->rules,$messages);outra forma de validar

       $validate = validator($dataForm,$this->product->rules,$messages);
       if($validate->fails()){
            return redirect()
                    ->route('produtos.create')
                    ->withErrors($validate)
                    ->withInput();
       }

       // dd($request->all());
       */

        //Faz o cadastro
        $insert = $this->product->create($dataForm);

        if($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //REcura o produto pelo id
        $product = $this->product->find($id);

        $title = "Editar Produto: {$product->name}";

        $categories = ['Eletronicos','Moveis','Limpeza','Banho'];

        return view('painel.products.create-edit',compact('title','categories','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'id =>'.$id;
    }

    public function testes(){;


       /* $prod = $this->product;

        $prod->name = 'Nome do Produto';
        $prod->number = '123456';
        $prod->active = '1';
        $prod->category = 'eletronicos';
        $prod->description = 'descrição do produto';
        $insert = $prod->save();

        if($insert)
            return 'inserido com sucesso';
        else
            return'Falha ao inserir';
            */
            //=========================================
            /*
            $insert = $this->product->create([

               'name' => 'Nome do Produto',
               'number' => '123456',
               'active' => '1',
               'category' => 'eletronicos',
               'description' => 'descrição do produto'

            ]);
                if($insert)
                    return 'inserido com sucesso ID => '.$insert->id;
                else
                    return'Falha ao inserir';
                    */
                    //=========================================

                    //UPDATE PRODUTOS

                    /*
                    $prod = $this->product->where('number',123456);//atualiza pelo valor number

                    //$prod = $this->product->find(5);//atualiza pelo id 
                    $update = $prod->update([

                        'name' => 'Produto update',
                        'number' => '123',
                        'active' => '1',
                        'description' => 'descrição do produto update'
         
                    ]);

                    if($update)
                        return 'Produto atualizado';
                    else
                        return 'Produto não atualizado';
                        */

            //DELETA

            $prod = $this->product->where('number',1234)->delete();//deleta produto por outra coluna
            //$prod = $this->product->destroy(2);//deletar por id
            if($prod)
                return 'produto deletado';
            else
                return  'produto não deletado';
    }
}
