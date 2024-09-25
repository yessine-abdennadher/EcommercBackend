<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Categorie as ModelsCategorie;
use Exception;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories=categorie::all();
            return response( )->json($categories);

        }catch(\Exception $e){
            return response()->json("impossible d afficher le ");
        }
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {try{
        $categories=new Categorie(
            ["nomcategorie"=>$request->input("nomcategorie"),"imagecategorie"=>$request-> input("imagecategorie")]
            
        );
        $categories->save();
        return response()->json(data: $categories);
    }catch(\Throwable $th)  {

        return response()->json("probleme d ajout");

    }

    }

    /**}
     * Display the specified resource.
     */
    public function show( $id)
    {
        {try{
            $categories=Categorie::findOrFail($id);
            return response()->json($categories);

           
        }catch(\Exception $e)  {
    
            return response()->json("probleme d ajout");
    
        }
    
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $categories = Categorie::findOrFail($id);
            $categories->update($request->all());
            return response()->json($categories );


        }catch(\Exception $e){
            return response()->json('modification impossible');

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $id)
    { try{
        $categories = Categorie::findOrFail($id);
            $categories->delete();
        return response()->json('categorie supprimée !');

    }catch(Exception $e){
    return response()->json("suppression impossible");
        //
    }
    }}
