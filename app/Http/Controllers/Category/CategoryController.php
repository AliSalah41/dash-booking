<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:category-list' . session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:category-create' . session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit' . session('appKey'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete' . session('appKey'), ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('appKey', session('appKey'))->get();

        return view('admin.Categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            // 'en.title' => 'required|string',
            // 'ar.title' => 'required|string',
            // 'fr.title' => 'required|string',
            // 'de.title' => 'required|string',
            // 'es.title' => 'required|string',
            // 'en.description' => 'required|string',
            // 'ar.description' => 'required|string',
            // 'fr.description' => 'required|string',
            // 'de.description' => 'required|string',
            // 'es.description' => 'required|string',

            'title' => 'required|string',
            'description' => 'required|string|max:255',
        ]);

        // $category = Category::create($request->all());


        $category =new Category();
        // remove translatedAttributes from model to store in main table

        // $category->translatedAttributes = [];
        //  // save in category table
        // $enTranslation = $request->en;
        // $title = $enTranslation['title'];
        // $description = $enTranslation['description'];

        // $category->title = $title;
        // $category->description = $description;
        $category->appKey = session('appKey');

        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();





    //   //  Create and save translations for each language
    //     foreach (['en', 'fr', 'ar','de','es'] as $locale) {
    //         $translation = new CategoryTranslation();
    //         $translation->category_id = $category->id;
    //         $translation->locale = $locale;
    //         $translation->title = $request->input("$locale.title");
    //         $translation->description = $request->input("$locale.description");
    //         // Set other translation attributes as needed
    //         $translation->save();
    //     }

        return redirect()->route('category.index')->with('success', __('words.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $category = Category::where('id', $id)->first();

        return view('admin.Categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        // $category = CategoryTranslation::where('category_id', $id)->get();
        $category = Category::where('id', $id)->first();
        // dd($category);
        return view('admin.Categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {



         $category = Category::find($id);

    // Validate the incoming data for both 'en' and 'ar' locales
    $request->validate([
        // 'en.title' => 'required|string',
        // 'en.description' => 'required|string',

        // 'ar.title' => 'required|string',
        // 'ar.description' => 'required|string',

        // 'fr.title' => 'required|string',
        // 'fr.description' => 'required|string',

        // 'de.title' => 'required|string',
        // 'de.description' => 'required|string',

        // 'es.title' => 'required|string',
        // 'es.description' => 'required|string',

        'title' => 'required|string|max:255',
        'description' => 'required|string|max:65000',
    ]);
            // Update the English ('en') translation
    // $category->translateOrNew('en')->title = $request->input('en.title');
    // $category->translateOrNew('en')->description = $request->input('en.description');

    // // Update the Arabic ('ar') translation
    // $category->translateOrNew('ar')->title = $request->input('ar.title');
    // $category->translateOrNew('ar')->description = $request->input('ar.description');

    //   // Update the Arabic ('fr') translation
    //   $category->translateOrNew('fr')->title = $request->input('fr.title');
    //   $category->translateOrNew('fr')->description = $request->input('fr.description');

    //     // Update the Arabic ('de') translation
    // $category->translateOrNew('de')->title = $request->input('de.title');
    // $category->translateOrNew('de')->description = $request->input('de.description');

    //   // Update the Arabic ('es') translation
    //   $category->translateOrNew('es')->title = $request->input('es.title');
    //   $category->translateOrNew('es')->description = $request->input('es.description');

    // // Save the changes to the database
    // $category->save();



    // remove translatedAttributes from model to store in main table

    // $category->translatedAttributes = [];
    //  // save in category table
    // $enTranslation = $request->en;
    // $title = $enTranslation['title'];
    // $description = $enTranslation['description'];

    // $category->title = $title;
    // $category->description = $description;
    // $category->save();
    // $category::update([
    //   'title'=> $request->title,
    //   'description'=> $request->description,
    // ]);

        $category->title =$request->title;
        $category->description =$request->description;
        $category->save();
        return redirect()->route('category.index')->with('success', __('words.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //  dd($id);
        // $category = Category::with('translations')->find($id);

        // foreach ($category->translations as $translation) {
        //     $translation->delete();
        // }
        // $category->delete();



        // $catTrans = CategoryTranslation::where('category_id', $id)->first();
        // return $cat;
        $cat = Category::where('id', $id)->where('appKey', session('appKey'))->first();
        $cat->delete();


        // $catTrans->deleteTranslations();
        //   $catTrans->save();
        return redirect()->route('category.index')->with('success', 'category deleted successfully');
    }
}
