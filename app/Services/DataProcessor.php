<?php

namespace App\Services;

use App\Repositories\Eloquent\ProcessRepository;

class DataProcessor {

    protected object $process;

    /**
     * @param ProcessRepository $processRepository
     */
    public function __construct(ProcessRepository $processRepository)
    {
        $this->process=$processRepository;

    }

    /**
     * @param $file
     * @return void
     */
    public function serviceProcessFile($file){

        $results = $this->process->processFile($file);

        return view('partials.process_content',['results'=>$results])->render();

    }

    /**
     * @return string
     */
    public function serviceFetchFromPublicAPI():string{

    $data  =  $this->process->fetchFromPublicAPI();

    $results=[];

    foreach ($data as $value){
        array_push($results,['title'=>$value['title']['rendered'],'body'=>$value['content']['rendered'],'created_at'=>$value['date']]);
   }
      return view('partials.process_content',['results'=>$results])->render();

    }


}
