<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\User;
use App\Imagem;
use Auth;
use Image;
use Validator;

class UploadController extends Controller
{

    /**
     * Handles the file upload
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws UploadMissingFileException
     */
    public function upload(Request $request) {

      $this->validate(request(), [
            
           'file' => 'required'
        ]);

      //dd($request);
        // create the file receiver
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        // check if the upload is success
        if ($receiver->isUploaded()) {
            // receive the file
            $save = $receiver->receive();
            // check if the upload has finished (in chunk mode it //will send smaller files)
            if ($save->isFinished()) {
                // save the file and return any response you need
                return $this->saveFile($save->getFile());
            } else {
                // we are in chunk mode, lets send the current progress
                /** @var AbstractHandler $handler */
                $handler = $save->handler();
                return response()->json([
                    "done" => $handler->getPercentageDone(),
                ]);
            }
        } else {
            throw new UploadMissingFileException();
        }
    }
    /**
     * Saves the file
     *
     * @param UploadedFile $file
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function saveFile(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $normalName = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension
        
        $fileName = $this->createFilename($file);
        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        // Group files by the date (week
        $dateFolder = date("Y-m-W");
        // Build the file path
        $filePath = "upload/{$mime}/{$dateFolder}/";
        $finalPath = public_path("fotos/".$filePath);
        // move the file name
        $file->move($finalPath, $fileName);
        // setando a foto
        $location = public_path('images/' .$fileName);
        $userId = Auth::id();

        Imagem::create([
            'nome' => $fileName,
            'apelido' => $normalName,
            'valor' => null,
            'descricao' => null,
            'caminho' => "fotos/".$filePath,
            'categoria' => null,
            'situacao' => 'nv',
            'user_id' => $userId,

        ]);

         //protected $fillable = ['id', 'nome', 'apelido', 'valor', 'descricao', 'caminho', 'user_id'];

        return response()->json([
            'path' => $filePath,
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }
    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension
        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;

        return $filename;
    }

    
}