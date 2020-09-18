<?php

namespace App\Http\Controllers\Admin;

use App\end_category;
use App\Http\Controllers\Controller;
use App\middle_category;
use App\top_category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function top_category()
    {
        $top_cats = top_category::paginate(15);
        return view('admin.category.topCategory',compact('top_cats'));
    }

    public function top_category_save(Request $request)
    {
        $new_top_cate = new top_category();
        $new_top_cate->category_name = $request->category_name;
        $new_top_cate->category_icon = $request->category_icon;
        $new_top_cate->save();
        return back()->with('success','Top Category Successfully Created');

    }


    public function top_category_update(Request $request)
    {
        $update_top_cat = top_category::where('id',$request->edit_category)->first();
        $update_top_cat->category_name = $request->category_name;
        $update_top_cat->category_icon = $request->category_icon;
        $update_top_cat->save();
        return back()->with('success','Top Category Successfully Updated');
    }

    public function top_category_delete(Request $request)
    {
        $delete_top_cat = top_category::where('id',$request->delete_category)->first();
        $delete_top_cat->delete();
        return back()->with('success','Top Category Successfully Deleted');
    }


    public function top_category_search(Request $request)
    {
        $search = $request->search;
        $top_cats = top_category::where('category_name','LIKE',"%$search%")->paginate(15);
        return view('admin.category.topCategorySearch',compact('top_cats','search'));
    }



    public function middle_category()
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::paginate(15);
        return view('admin.category.middleCategory',compact('top_cats','mid_cats'));
    }

    public function middle_category_save(Request $request)
    {
        $mid_cat_save = new middle_category();
        $mid_cat_save->top_cat_id = $request->top_cat_id;
        $mid_cat_save->category_name = $request->category_name;
        $mid_cat_save->save();

        return back()->with('success','Middle Category Successfully Created');
    }

    public function middle_category_update(Request $request)
    {
        $update_mid_cat = middle_category::where('id',$request->edit_category)->first();
        $update_mid_cat->top_cat_id = $request->top_cat_id;
        $update_mid_cat->category_name = $request->category_name;
        $update_mid_cat->save();

        return back()->with('success','Middle Category Successfully Updated');
    }

    public function middle_category_delete(Request $request)
    {
        $del_mid_cat = middle_category::where('id',$request->delete_category)->first();
        $del_mid_cat->delete();
        return back()->with('success','Middle Category Successfully Deleted');
    }

    public function middle_category_search(Request $request)
    {
        $search = $request->search;
        $mid_cats = middle_category::where('category_name','LIKE',"%$search%")->paginate(15);
        $top_cats = top_category::all();
        return view('admin.category.midCategorySearch',compact('mid_cats','search','top_cats'));
    }



    public function end_category()
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        $end_cats = end_category::paginate(15);
        return view('admin.category.endCategory',compact('top_cats','mid_cats','end_cats'));
    }

    public function end_category_save(Request $request)
    {
        $new_end_cat = new end_category();
        $new_end_cat->top_cat_id = $request->top_cat_id;
        $new_end_cat->middle_cat_id = $request->middle_cat_id;
        $new_end_cat->category_name = $request->category_name;
        $new_end_cat->save();

        return back()->with('success','End Category Successfully Created');

    }

    public function end_category_update(Request $request)
    {
        $update_end_cat = end_category::where('id',$request->edit_category)->first();
        $update_end_cat->top_cat_id = $request->top_cat_id;
        $update_end_cat->middle_cat_id = $request->middle_cat_id;
        $update_end_cat->category_name = $request->category_name;
        $update_end_cat->save();

        return back()->with('success','End Category Successfully Updated');
    }

    public function end_category_delete(Request $request)
    {
        $delete_end_delete = end_category::where('id',$request->delete_category)->first();
        $delete_end_delete->delete();
        return back()->with('success','End Category Successfully Deleted');
    }


    public function end_category_search(Request $request)
    {
        $search = $request->search;
        $end_cats = middle_category::where('category_name','LIKE',"%$search%")->paginate(15);
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        return view('admin.category.endCategorySearch',compact('end_cats','search','top_cats','mid_cats'));
    }

}
