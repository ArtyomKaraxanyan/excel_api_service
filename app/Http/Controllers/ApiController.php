<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use App\Services\DataProcessor;
class ApiController extends Controller
{

    protected $process;
    public function __construct(DataProcessor $dataProcessor)
    {
        $this->process=$dataProcessor;
    }

    /**
     * @param Request $request
     * @return string|null
     */
    public function processFile (FileRequest $request)
    {
        $file = $request->file('file');

        if ($file) {

            $data = $this->process->serviceProcessFile($file);

        } else {

            $data= $this->process->serviceFetchFromPublicAPI();
        }

        return $data;
    }
}
