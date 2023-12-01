<?php
namespace App\Repositories\Eloquent;
use App\Repositories\Interfaces\EloquentInterface;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

abstract class EloquentRepository implements EloquentInterface
{
    public function processFile($file)
    {
        $data = self::readFile($file);

        return $data;
    }

    public  function fetchFromPublicAPI()
    {
        $data=[];
        $maxAttempts = 7;
        $perPage = 140;

        for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
            $response = Http::get('https://techcrunch.com/wp-json/wp/v2/posts', [
                'per_page' => $perPage
            ]);

            if ($response->successful() && $response->json() != []) {
                $data = $response->json();
                break;
            }
            $perPage -= 20;
        }

           return $data;

    }
    public function readFile($file)
    {
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/upload'), $fileName);

        $filePath=public_path('upload/'.$fileName);

        // Parse CSV or Excel content based on file extension
        if ($file->getClientOriginalExtension() === 'csv') {
            $data = self::parseCsv($filePath);
        } elseif ($file->getClientOriginalExtension() === 'xlsx') {
            $data = self::parseExcel($filePath);
        } else {
            // Handle other file types if needed
            throw new \Exception('Unsupported file format');
        }

        return $data;
    }

    private static function parseCsv($filePath)
    {
        $csvFile = fopen($filePath, 'r');
        $results=[];
        while (($data = fgetcsv($csvFile)) !== false) {
            array_push($results,['title'=>$data[0],'body'=>$data[1],'created_at'=>$data[2]]);

        }
        fclose($csvFile);

        return $results;

    }

    private static function parseExcel($filePath)
    {
        $data = Excel::toArray([], $filePath);
        $results=[];
        foreach ($data[0] as $value){
          array_push($results,['title'=>$value[0],'body'=>$value[1],'created_at'=>$value[2]]);
         }
        return $results;

    }


}
