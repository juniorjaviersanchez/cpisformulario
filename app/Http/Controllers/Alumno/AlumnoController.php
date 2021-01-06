<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Modelos
use App\Models\Alumno\AlumnoModel;

//REQUERIMIENTOS
use App\Http\Requests\Producto\AlumnoCreateRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('alumnosLista');
    }

    public function listTable(Request $request)
    {
        $Alumno =  AlumnoModel::all();  
        return datatables($Alumno)
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoCreateRequest $request)
    {
        //
        if ($request->ajax())
        {
            $AlumnoModel = new AlumnoModel;

            $AlumnoModel->nombres = $request->nombres;
            $AlumnoModel->apellidos = $request->apellidos;
            $AlumnoModel->username = $request->username;
            $AlumnoModel->password = bcrypt($request->password);
            $AlumnoModel->idvaucher = $request->idvaucher;

            if($request->hasFile('imgvaucher')){
                $file= $request->imgvaucher;
                $file->move(public_path().'/imgvauchers',$file->getClientOriginalName());
                $AlumnoModel->imgvaucher=$file->getClientOriginalName();
            }

            $result = $AlumnoModel->save();
            
            if ($result){
                return response()->json(['success'=>'true']);
            } 
            else
            {
              return response()->json(['success'=>'false']);  
            }

        }
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
        //
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
        //
    }
}
