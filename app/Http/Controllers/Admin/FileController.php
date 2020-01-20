<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\File;
use App\Media_Type;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public $bytes;

    public function FormatSizeUnits($filesize)
    {
        if ($filesize >= 1073741824) {
            $this->bytes = number_format($filesize / 1073741824, 2) . ' GB';
        } elseif ($filesize >= 1048576) {
            $this->bytes = number_format($filesize / 1048576, 2) . ' MB';
        } elseif ($filesize >= 1024) {
            $this->bytes = number_format($filesize / 1024, 2) . ' KB';
        } elseif ($filesize > 1) {
            $this->bytes = $filesize . ' bytes';
        } elseif ($filesize == 1) {
            $this->bytes = $filesize . ' byte';
        } else {
            $this->bytes = '0 bytes';
        }

        return $this->bytes;
    }

    public function index()
    {
        $files = File::orderBy('created_at', 'DESC')->paginate(30);
        $users = User::all();
        $media_type = Media_Type::all();
        return view('file.index', [
            'files' => $files,
            'users' => $users,
            'media_type' => $media_type
        ]);
    }

    public function Dropzone(Request $request)
    {
        if ($request->hasFile('file')) {
            // $this->validate($request, [
            //     'file' => 'required|mimes:png,jpg,pdf,mp3,mp4|max:20000'
            // ]);
            $namewithextension = $request->file->getClientOriginalName(); //Name with extension 'filename.jpg'
            $filename = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $request->file->getClientOriginalExtension();
            $filesize = $request->file->getSize();
            $upload_name = Auth::user()->username . " " . date('m-d H-i-s') . " " . md5(mt_rand(1000000, 9999999)) . '.' . $extension;
            $address = $request->file->storeAs('public/upload', $upload_name);

            $fileModel = new File;
            $fileModel->file_name = $filename;
            $fileModel->file_format = $extension;
            $fileModel->file_size = $this->FormatSizeUnits($filesize);
            if ($extension == "mp4") {
                $fileModel->file_type = '1';
            } elseif ($extension == "mkv") {
                $fileModel->file_type = '1';
            } elseif ($extension == "mp3") {
                $fileModel->file_type = '2';
            } elseif ($extension == "pdf") {
                $fileModel->file_type = '3';
            } elseif ($extension == "docx") {
                $fileModel->file_type = '3';
            } elseif ($extension == "jpg") {
                $fileModel->file_type = '4';
            } elseif ($extension == "png") {
                $fileModel->file_type = '4';
            } else {
                $fileModel->file_type = '0';
            }
            $fileModel->file_description = "";
            $fileModel->file_address = $address;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->save();
            return redirect('/file')->with('success', 'File uploaded successfully');

            // return $request->file->store('public/upload');
        } else {
            return redirect('/file')->with('danger', 'The upload list is empty! (Please select a file(s) to upload)');
        }
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            foreach ($request->file as $file) {
                // $this->validate($request, [
                //     'file' => 'required|mimes:png,jpg,pdf,mp3,mp4|max:20000'
                // ]);
                $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
                $filename = explode('.', $namewithextension)[0]; // Filename 'filename'
                $extension = $file->getClientOriginalExtension();
                $filesize = $file->getSize();
                $upload_name = Auth::user()->username . " " . date('m-d H-i-s') . " " . md5(mt_rand(1000000, 9999999)) . '.' . $extension;
                $address = $file->storeAs('public/upload', $upload_name);

                $fileModel = new File;
                $fileModel->file_name = $filename;
                $fileModel->file_format = $extension;
                $fileModel->file_size = $this->FormatSizeUnits($filesize);
                if ($extension == "mp4") {
                    $fileModel->file_type = '1';
                } elseif ($extension == "mkv") {
                    $fileModel->file_type = '1';
                } elseif ($extension == "mp3") {
                    $fileModel->file_type = '2';
                } elseif ($extension == "pdf") {
                    $fileModel->file_type = '3';
                } elseif ($extension == "jpg") {
                    $fileModel->file_type = '4';
                } elseif ($extension == "png") {
                    $fileModel->file_type = '4';
                } else {
                    $fileModel->file_type = '0';
                }
                $fileModel->file_description = "";
                $fileModel->file_address = $address;
                $fileModel->user_id = Auth::user()->id;
                $fileModel->save();
            }
            return redirect('/file')->with('success', 'File uploaded successfully');

            // return $request->file->store('public/upload');
        } else {
            return redirect('/file')->with('danger', 'The upload list is empty! (Please select a file(s) to upload)');
        }
    }

    public function Edit($id)
    {
        $files = File::find($id);
        return view('file.edit-file', ['files' => $files]);
    }

    public function UpdateInfo(Request $request, $id)
    {
        if (!empty($request->input('filename'))) {
            $fileModel = File::find($id);
            $fileModel->file_name = $request->input('filename');
            $fileModel->file_description = $request->input('description');
            $fileModel->save();
            return redirect('/file')->with('success', 'File uploaded successfully');
        } else {
            return redirect('/file')->with('danger', 'The upload list is empty! (Please select a file(s) to upload)');
        }
    }

    public function UpdateFile(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            $namewithextension = $request->file->getClientOriginalName(); //Name with extension 'filename.jpg'
            $filename = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $request->file->getClientOriginalExtension();
            $filesize = $request->file->getSize();
            $upload_name = Auth::user()->username . " " . date('m-d H-i-s') . " " . md5(mt_rand(1000000, 9999999)) . '.' . $extension;
            $address = $request->file->storeAs('public/upload', $upload_name);

            $fileModel = File::find($id);
            $fileModel->file_name = $filename;
            $fileModel->file_format = $extension;
            $fileModel->file_size = $this->FormatSizeUnits($filesize);
            if ($extension == "mp4") {
                $fileModel->file_type = '1';
            } elseif ($extension == "mkv") {
                $fileModel->file_type = '1';
            } elseif ($extension == "mp3") {
                $fileModel->file_type = '2';
            } elseif ($extension == "pdf") {
                $fileModel->file_type = '3';
            } elseif ($extension == "docx") {
                $fileModel->file_type = '3';
            } elseif ($extension == "jpg") {
                $fileModel->file_type = '4';
            } elseif ($extension == "png") {
                $fileModel->file_type = '4';
            } else {
                $fileModel->file_type = '0';
            }
            $fileModel->file_description = "";
            $fileModel->file_address = $address;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->save();

            return redirect('/file')->with('success', 'File Replased successfully');

            // return $request->file->store('public/upload');
        } else {
            return redirect('/file')->with('danger', 'The upload list is empty! (Please select a file(s) to upload)');
        }
    }

    public function Distroy($id)
    {
        $deletefile = File::find($id);
        $deletefile->delete();
        Storage::delete($deletefile->file_address);
        return redirect('/file')->with('success', 'File deleted successfully');
    }

    public function Show($id)
    {
        $downloadfile = File::find($id);
        return Storage::download($downloadfile->file_address, $downloadfile->file_name . "." . $downloadfile->file_format);
    }
}
