<?php

namespace App\Http\Controllers;

use App\Compliance;
use App\CustomParser;
use Faker\Generator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Importer;
use DB;
use Excel;

class ComplianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //api/compliance
    public function index()
    {
        //

        // return response(Compliance::all()->jsonSerialize(), Response::HTTP_OK);
        return view('test.excel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
        //

        // $compliance = new Compliance();
        // $compliance->compliance_name = $faker->sentence(1);
        // $compliance->compliance_description = $faker->sentence(3);
        // $compliance->compliance_status = $faker->sentence(1);
        // $compliance->save();

        // return response($compliance->jsonSerialize(), Response::HTTP_CREATED);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $compliance = new Compliance();
        // $compliance->compliance_name = $request->compliance_name;
        // $compliance->compliance_description = $request->compliance_description;
        // $compliance->compliance_status = $request->compliance_status;
        // $compliance->save();

        // return response($compliance->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compliance  $compliance
     * @return \Illuminate\Http\Response
     */
    public function show(Compliance $compliance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compliance  $compliance
     * @return \Illuminate\Http\Response
     */
    public function edit(Compliance $compliance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compliance  $compliance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compliance $compliance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compliance  $compliance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Compliance::destroy($id);

        return response(null, Response::HTTP_OK);
    }

    public function importFile(){

        return view('test.excel');
    }

    public function importExcel(Request $request){

        $validator = Validator::make($request->all(), [
            'file' => 'required|max:5000|mimes:xlsx, xls, csv, pdf'
        ]);

        if($validator->passes()){
            $dateTime = date('Ymd_His');
            $file = $request->file('file');
            $fileName = $dateTime . '-' . $file->getClientOriginalName();
            $savePath = public_path('/upload/');
            $file->move($savePath, $fileName); 
        
            // $excel = Importer::make('Excel');
            // $excel->hasHeader(true);
            // $excel->skip(1);
            // $excel->setParser(new CustomParser);
            // $excel->load($savePath.$fileName);
            // $collection = $excel->getCollection();
            // $description = array_column($collection->toArray(), 'Description');
            // array_splice($rows2, 0, 1);

            $excel = Importer::make('Excel');
            $excel->load($savePath.$fileName);
            $collection = $excel->getCollection();

            $dataName = $collection[0][1];
            // $data = $collection;

            
            // for($i=0; $i<sizeof($collection); $i++){
            //     $compliance = new Compliance();
            //     $compliance->compliance_name = $dataName;
            //     $compliance->compliance_description = json_encode($collection[$i]);
            //     $compliance->compliance_status = 'Active';
            //     $compliance->save();
            // }
            

            // echo $data;
                       
            $compliance = new Compliance();
            $compliance->compliance_name = $dataName;
            $compliance->compliance_description = $collection;
            $compliance->compliance_status = 'Active';
            $compliance->save();

            // return response($compliance->jsonSerialize(), Response::HTTP_CREATED);
            return response("File upload successfully", Response::HTTP_CREATED);

        } else {
            return redirect()->back()
                ->with(['errors'=>$validator->errors()->all()]);
        }

    }


    public function loadExcel(){

        $datas = Compliance::all()->jsonSerialize();


        return response($datas, Response::HTTP_OK);
    }

    // -----------------------------------------------------------

    public function saveExcel(Request $request){

        // $validator = Validator::make($request->all(), [
        //     'file' => 'required|max:5000|mimes:xlsx, xls, csv, pdf'
        // ]);

        // if($validator->passes()){
        //     $dateTime = date('Ymd_His');
        //     $file = $request->file('file');
        //     $fileName = $dateTime . '-' . $file->getClientOriginalName();
        //     $savePath = public_path('/upload/');
        //     $file->move($savePath, $fileName);  

        //     $compliance = new Compliance();
        //     $compliance->compliance_name = $fileName;
        //     $compliance->save();

        //     // return response($compliance->jsonSerialize(), Response::HTTP_CREATED);
        //     return var_dump('paso');

        // } else {
        //     // return redirect()->back()
        //     //     ->with(['errors'=>$validator->errors()->all()]);

        //     return var_dump('no paso');
        // }

        // $validator = Validator::make($request->all(), [
        //     'file' => 'required|max:5000|mimes:xlsx, xls, csv, pdf'
        // ]);


        // if($validator->passes()){

        //     $dateTime = date('Ymd_His');
        //     $file = $request->file('file');
        //     $fileName = $dateTime . '-' . $file->getClientOriginalName();
        //     $savePath = public_path('/upload/');
        //     $file->move($savePath, $fileName);  

        //     $excel = Importer::make('Excel');
        //     $excel->load($savePath.$fileName);
        //     $collection = $excel->getCollection();


        //     var_dump($collection[0]);
        //     // for($row=0; $row<sizeof($collection); $row++){
        //     //     try{
        //     //         var_dump($collection[$row]);
        //     //     }
        //     //     catch(\Exception $e)
        //     //     {
        //     //         return back()->withError($e->getMessage())->withInput();
        //     //         // return redirect()->back()
        //     //         //     ->with(['errors'=> [0 => 'Please provide a correct file']]);
        //     //     }
        //     // }

        //     // return redirect()->back()
        //     //     ->with(['success'=>'File uploaded successfully']);
        // }else {
        //     return redirect()->back()
        //         ->with(['errors'=>$validator->errors()->all()]);
        // }

    }


}
