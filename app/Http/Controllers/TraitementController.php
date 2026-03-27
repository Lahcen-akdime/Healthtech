<?php

namespace App\Http\Controllers;

use App\Http\Requests\TraitementRequest;
use App\Http\Resources\TraitementResource;
use App\Models\Traitement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf ;

class TraitementController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/traitement" ,
     *      summary="Display all traitements" ,
     *      description = "Display traitements with name description and doctor name" ,
     *      tags={"traitement"}
     * )
     * @OA\Response(
     * response=200 ,
     * descripton="List of services" 
     * )
     */
    public function index()
    {
        $traitements = Traitement::all();
        return TraitementResource::collection($traitements);
        
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/taitement" ,
     *      summary="store new taitement" ,
     *      description = "store new taitement by form with name and location" ,
     *      tags={"taitement"}
     * )
     * @OA\RequestBody(
     *      required = true , 
     *      description = "taitement informations" ,
     *      @OA\JsonContent(
     *          required={"name","doctorName","description"} ,
     *          @OA\Property(property="name",type="string",example="analyse") ,
     *          @OA\Property(property="doctorName",type="string",example="daved") ,
     *          @OA\Property(property="description",type="text",example="anlyse dor ...")
     *      )
     * ),
     * @OA\Response(
     *      response=200 ,
     *      descripton="taitement added secussfuly"  ,
     *      @OA\JsonContent(
     *          required={"name","doctorName","description"} ,
     *          @OA\Property(property="name",type="string",example="analyse") ,
     *          @OA\Property(property="doctorName",type="string",example="daved") ,
     *          @OA\Property(property="description",type="text",example="anlyse dor ...")
     *      )
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="Something is wrong"
     * )
     */
    public function store(TraitementRequest $request)
    {
        $Traitementdata = $request->validated() ;
        $traitement = Traitement::create($Traitementdata) ;
    }

    /**
     * @OA\Get(
     *      path="/api/traitement/{id}" ,
     *      summary="Display traitement details" ,
     *      description = "Display more informations about traitements" ,
     *      tags={"traitement"}
     * )
     * @OA\Parameter(
     *      name = "id" ,
     *      in = "path" ,
     *      required = true ,
     *      description = "traitement id" ,
     *      @OA\Shema(type="integer",example=1)
     * ) ,
     * @OA\Response(
     * response=200 ,
     * descripton="traitement details"  ,
     * @OA\JsonContent(
     *          @OA\Property(property="name",type="string",example="analyse") ,
     *          @OA\Property(property="doctorName",type="string",example="daved") ,
     *          @OA\Property(property="description",type="text",example="anlyse dor ...")
     *          @OA\Property(property="created_at",type="datetime",example="02/02/2026 12:28:00") ,
     *      )
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="traitement not found"
     * )
     */
    public function show(Traitement $traitement)
    {
        return response()->json($traitement,200) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Traitement $traitement)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/api/traitement/{id}" ,
     *      summary="update traitement" ,
     *      description = "update the traitement by form" ,
     *      tags={"traitement"}
     * )
     *  * @OA\Parameter(
     *      name = "id" ,
     *      in = "path" ,
     *      required = true ,
     *      description = "traitement id" ,
     *      @OA\Shema(type="integer",example=1)
     * ) ,
     * @OA\RequestBody(
     *      required = true , 
     *      description = "update traitement informations" ,
     *      @OA\JsonContent(
     *          required={"name","doctorName","description"} ,
     *          @OA\Property(property="name",type="string",example="analyse") ,
     *          @OA\Property(property="doctorName",type="string",example="daved") ,
     *          @OA\Property(property="description",type="text",example="anlyse dor ...") 
     *      )
     * ),
     * @OA\Response(
     *      response=200 ,
     *      descripton="traitement updated secussfuly"  ,
     *      @OA\JsonContent(
     *          required={"name","doctorName","description"} ,
     *          @OA\Property(property="name",type="string",example="analyse") ,
     *          @OA\Property(property="doctorName",type="string",example="daved") ,
     *          @OA\Property(property="description",type="text",example="anlyse dor ...") 
     *      )
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="Something is wrong"
     * )
     */
    public function update(TraitementRequest $request , Traitement $traitement)
    {
        $traitement->update($request->validated());
        return to_route('traitement.index');
    }

        /**
     * @OA\Delete(
     *      path="/api/traitement/{id}" ,
     *      summary="Delete the traitement" ,
     *      description = "Delete from database" ,
     *      tags={"traitement"}
     * )
     * @OA\Parameter(
     *      name = "id" ,
     *      in = "path" ,
     *      required = true ,
     *      description = "traitement id" ,
     *      @OA\Shema(type="integer",example=1)
     * ) ,
     * @OA\Response(
     * response=200 ,
     * descripton="traitement deleted successfuly"  ,
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="traitement not found"
     * )
     */
    public function destroy(Traitement $traitement)
    {
        $traitement->delete() ;
    }

   /**
     * @OA\Get(
     *      path="/api/traitement/{id}" ,
     *      summary="transform the traitement to pdf" ,
     *      description = "transform the traitement to pdf" ,
     *      tags={"traitement"}
     * )
     * @OA\Parameter(
     *      name = "id" ,
     *      in = "path" ,
     *      required = true ,
     *      description = "traitement id" ,
     *      @OA\Shema(type="integer",example=1)
     * ) ,
     * @OA\Response(
     * response=200 ,
     * descripton="Traitement pdf"  ,
     * ),
     * @OA\Response(
     * response=401 ,
     * descripton="traitement not transformed"
     * )
     */

    public function getPdf($id){
        $test = [
            'test' => 'work',
            'state' => 'good'
        ];
    $traitement = Traitement::find($id) ;
    $traitementData = [
    'name' => $traitement->name ,
    'description' => $traitement->description ,
    'doctorName' => $traitement->doctorName 
    ];
    $pdf = Pdf::loadView('pdf',$traitementData);
    return $pdf->stream() ;
    // return view('pdf',compact('traitement'));
    }
}