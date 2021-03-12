<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\category as ModelsCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
    //listar todos los posts 
    public function index(){
        $post = Post::all();
        //dd($post);
        return response()->json(['posts'=> $post]);
    }

    //mostrar post individual detalle post
    public function individual($id){
        $post = Post::findOrfail($id);
        //dd($post);
        return response()->json(['post'=> $post]);
    }


// lista todos los post de una categoria
public function categoryPost($id)
{
    //llamamos a la categoria segun el id que mandemos en el request 
    $category = ModelsCategory::findOrFail($id);
    // declaramos $ post para acceder a los post de la categoria con el id enviado por el request
    $posts = Post::where('category_id', $category->id)
    ->latest('id')
    ->get();
    return response()->json(
        [
        'category'=>$category,
        'posts'=>$posts
        ]); 

}
public function categoryPosthome()
{
    //llamamos a las categorias
    $categories = ModelsCategory::all()->take(3);
// return ($categories.'entra a categorias');
    $array = array();
    foreach($categories as $category){
        $posts = Post::where('category_id',$category->id)
        ->limit(3)
        ->get();
        $array[] = $posts;
    }
    //return $array;

   return response()->json(
        [
        'category'=>$categories,
        'posts'=>$array
        ]);  
    }

}
