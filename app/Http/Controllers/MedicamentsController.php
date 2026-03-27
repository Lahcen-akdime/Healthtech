<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentsRequest;
use App\Models\Medicaments;
use Illuminate\Http\Request;

class MedicamentsController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/medicament" ,
     *      summary="Display all medicaments" ,
     *      description = "Display medicaments with name and location" ,
     *      tags={"medicament"}
     * )
     * @OA\Response(
     * response=200 ,
     * descripton="List of medicaments" 
     * )
     */
    public function index()
    {
        $medcines = Medicaments::all();
        return response()->json($medcines,200);
    }

    /**
     * @OA\Post(
     *      path="/api/medicament" ,
     *      summary="store new medicament" ,
     *      description = "store new medicament by form with name and location" ,
     *      tags={"medicament"}
     * )
     * @OA\RequestBody(
     *      required = true , 
     *      description = "medicament informations" ,
     *      @OA\JsonContent(
     *          required={"name","location"} ,
     *          @OA\Property(property="name",type="string",example="dolyprane") ,
     *          @OA\Property(property="location",type="string",example="USA") ,
     *      )
     * ),
     * @OA\Response(
     * response=200 ,
     * descripton="medicament added secussfuly"  ,
     * @OA\JsonContent(
     *          required={"name","location"} ,
     *          @OA\Property(property="name",type="string",example="dolyprane") ,
     *          @OA\Property(property="location",type="string",example="USA") ,
     *      )
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="Something is wrong"
     * )
     */
    public function store(MedicamentsRequest $request)
    {
        $medcines = $request->validated();
        Medicaments::create($medcines) ;
    }

    /**
     * @OA\Get(
     *      path="/api/medicament/{id}" ,
     *      summary="Display medicament details" ,
     *      description = "Display more informations about medicaments" ,
     *      tags={"medicament"}
     * )
     * @OA\Parameter(
     *      name = "id" ,
     *      in = "path" ,
     *      required = true ,
     *      description = "medicament id" ,
     *      @OA\Shema(type="integer",example=1)
     * ) ,
     * @OA\Response(
     * response=200 ,
     * descripton="medicament details"  ,
     * @OA\JsonContent(
     *          @OA\Property(property="name",type="string",example="dolyprane") ,
     *          @OA\Property(property="location",type="string",example="USA") ,
     *          @OA\Property(property="created_at",type="datetime",example="02/02/2026 12:28:00") ,
     *      )
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="Medicament not found"
     * )
     */
    public function show($id)
    {
        $Medicament = Medicaments::findOrFail($id);
        return response()->json($Medicament,200) ;
    }

    /**
     * @OA\Put(
     *      path="/api/medicament/{id}" ,
     *      summary="update medicament" ,
     *      description = "update the medicament by form" ,
     *      tags={"medicament"}
     * )
     *  * @OA\Parameter(
     *      name = "id" ,
     *      in = "path" ,
     *      required = true ,
     *      description = "medicament id" ,
     *      @OA\Shema(type="integer",example=1)
     * ) ,
     * @OA\RequestBody(
     *      required = true , 
     *      description = "update medicament informations" ,
     *      @OA\JsonContent(
     *          required={"name","doctorName","description"} ,
     *          @OA\Property(property="name",type="string",example="dolyprane") ,
     *          @OA\Property(property="location",type="string",example="USA") ,
     *      )
     * ),
     * @OA\Response(
     * response=200 ,
     * descripton="medicament updated secussfuly"  ,
     * @OA\JsonContent(
     *          required={"name","location"} ,
     *          @OA\Property(property="name",type="string",example="dolyprane") ,
     *          @OA\Property(property="location",type="string",example="USA") ,
     *      )
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="Something is wrong"
     * )
     */
    public function update(MedicamentsRequest $request , $id)
    {
        $Medicament = Medicaments::findOrFail($id);
        return $Medicament->update($request->validated());
    }

    /**
     * @OA\Delete(
     *      path="/api/medicament/{id}" ,
     *      summary="Delete the medicament" ,
     *      description = "Delete from database" ,
     *      tags={"medicament"}
     * )
     * @OA\Parameter(
     *      name = "id" ,
     *      in = "path" ,
     *      required = true ,
     *      description = "medicament id" ,
     *      @OA\Shema(type="integer",example=1)
     * ) ,
     * @OA\Response(
     * response=200 ,
     * descripton="medicament deleted successfuly"  ,
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="Medicament not found"
     * )
     */
    public function destroy(Medicaments $Medicaments)
    {
        return $Medicaments->delete() ;
    }
}
