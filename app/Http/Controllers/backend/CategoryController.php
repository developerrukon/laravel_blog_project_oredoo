<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //categories
        $categories = Category::with(['subCatagories' => function($query){
            $query->withCount('posts');
        }])->withCount('posts')->where('status',1)->whereNull('parent_id')->orderBy('id','desc')->paginate(30);
        //trash categories
        $trashCategories = Category::onlyTrashed()->orderBy('id','desc')->select('id','name','slug','description','image','status')->paginate(30);
        return view('backend.category.index', compact('categories', 'trashCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('image');
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'nullable|max:500',
            'image' => 'required|mimes:png,jpg,jpeg|max:5000',
        ]);
        if($request->file('image')){
            $image_name = $request->name.'_'.Str::uuid().'.'.$image->extension();
            Image::make($image)->crop(200,200)->save(public_path('storage/category/'.$image_name));
        }
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent,
            'description' => $request->description,
            'image' => $image_name,
        ]);
        return back()->with('success', 'Category Created Successful.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category->with('posts');
        return  view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('backend.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $img = $request->file('image');

        $request->validate([
        'name' => 'required | max:100| unique:categorys,name,'.$category->id,
        'parent' => 'nullable|',
        'description' => 'nullable|max:500',
        'image' => 'nullable|mimes:png,jpg,jpeg|max:1000',
        ]);
        $image_name = null;
        if($img){
            $image_name = $request->name.'_'.Str::random(6).'.'.$img->extension();
            if(file_exists(public_path('storage/category/'.$category->image))){
                Storage::delete('category/'.$category->image);
            }
            $image_name = $request->name.'_'.Str::uuid().'.'.$request->file('image')->extension();
            // Storage::putFileAs('category', $request->file('image'), $image_name);
            Image::make($request->file('image'))->crop(200,200)->save(public_path('storage/category/'.$image_name));

        }else{
            $image_name = $category->image;
        }
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent,
            'description' => $request->description,
            'image' => $image_name,
        ]);
        return redirect(route('backend.category.index'))->with('success', 'Category Update Successful.!');
    }

    /**
     * Remove the specified delete from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Delete Category Successful.!');
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $data = Category::onlyTrashed()->find($id);
        $data->restore();
        return back()->with('success', 'Delete Restore Successful.!');
    }
    /**
     * Remove the specified permanent delete from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function permanentDelete($id)
    {
        $data = Category::onlyTrashed()->findOrFail($id);
        if($data->image){
            Storage::delete('category/'.$data->image);
        };
        $data->forceDelete();
        return back()->with('success', 'Delete Category Successful.!');
    }
}
