<?php

namespace App\Http\Controllers;

use Spatie\Image\Image;
use App\Models\Announce;


use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Jobs\WatermarkImage;
use Illuminate\Http\Request;
use App\Models\AnnounceImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use App\Jobs\GoogleVisionRemoveFaces;
use App\Http\Requests\AnnounceRequest;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class AnnounceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','search']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announces= Announce::where('is_accepted', true)->orderBy('created_at','desc')->get();

        return view('announce.index',compact('announces'));
    }




    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret= $request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())), 16, 36));
        $categories= Category::all();
        return view('announce.create',compact('categories', 'uniqueSecret'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnounceRequest $request)
    {
        
        $announce = Announce::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id,
        ]);

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);

        $images = array_diff($images, $removedImages);

        foreach ($images as $image) {
            $i = new AnnounceImage();

            $fileName = basename($image);
            $newFileName = "public/announces/{$announce->id}/{$fileName}";
            Storage::move($image, $newFileName);
        
            $i->file = $newFileName;
            $i->announce_id=$announce->id;

            $i->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file,250, 250),
                new ResizeImage($i->file,500, 500),
                
            ])->dispatch($i->id);
        }

        Storage::deleteDirectory(storage_path("app/public/temp/{$uniqueSecret}"));
        
        return redirect(route('home'))->with('message', 'Annuncio creato con successo!');
       
    }

    public function uploadImage(Request $request){
        
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json([
            'id' => $fileName
        ]);
    }

    public function removeImage(Request $request){

        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->input('id');

        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);

        return response()->json('ok');
    }

    public function getImages(Request $request){

        $uniqueSecret= $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);

        $data = [];

        foreach ($images as $image) {
            $data[] = [
                'id' => $image,
                'src' => AnnounceImage::getUrlByFilePath($image,120,120),
            ];
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function show(Announce $announce)
    {
        return view('announce.show', compact('announce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function edit(Announce $announce)
    {
        if(Auth::user()->id != $announce->user_id){
            return redirect(route('announce.index'))->with('alert','Non sei autorizzato a modificare questo annuncio');
        }else{
            $categories= Category::all();
            return view('announce.edit',compact('announce', 'categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announce $announce)
    {
        if(Auth::user()->id != $announce->user_id){
            return redirect(route('announce.index'))->with('alert','Non sei autorizzato a modificare questo annuncio');
        }else{
            $announce->update([
                'name'=> $request->name,
                'description'=> $request->description,
                'price'=> $request->price,
                'category_id'=> $request->category,
            ]);
            $announce->is_accepted=null;
            $announce->save();
            return redirect(route('announce.userAnnounce'))->with('message','il tuo annuncio è stato modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announce $announce)
    {
        // if(Auth::user()->id != $announce->user_id){
        //     return redirect(route('announce.index'))->with('alert','Non sei autorizzato a eliminare questo annuncio');
        // }else{
        //     $announce->images()->detach();
        //     $announce->delete();
        //     return redirect(route('announce.index'))->with('message','il tuo annuncio è stato eliminato correttamente');
        // }
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $announces = Announce::search($q)->get();
        return view('announce.search', compact('q', 'announces'));
    }

    public function userAnnounce(Request $request)
    {
        $announces = Announce::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('announce.userAnnounce', compact('announces'));
    }
}
