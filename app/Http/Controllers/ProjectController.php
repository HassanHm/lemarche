<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

// CATEGORY FUNCTIONS --------------------------------------------------------------->
    public function listCategory()
    {

        $listCategory = DB::table('category_tbl')
            ->orderBy('category_id', 'desc')
            ->paginate(10);

        return view('category.listCategory')->with('listCategory', $listCategory);
    }



    public function addCategory(Request $request)
    {

        return view('category.addCategory');
    }

    public function addNewCategory(Request $request)
    {


        $categoryAdd = DB::table('category_tbl')->insertGetId([
            'category_name' => $request->category_name

        ]);
        $message = "Record has been added successfully";

        return redirect()->route('category.addCategory')->withErrors($message);
    }



    public function editCategory(Request $request)
    {
        $editCategory = DB::table('category_tbl')->where('category_id', $request->id)->first();

        return view('category.editCategory')->with('editCategory', $editCategory);
     
    }


    public function updateCategory(Request $request)
    {
        $category_update =
            DB::table('category_tbl')->where('category_id', $request->category_id)
                                     ->update([
                                            'category_name' => $request->category_name

                                                 ]);
        $message = "Record has been updated successfully";

        return redirect()->back()->withErrors($message);
    }

    public function deleteCategory(Request $request)
    {
        DB::table('category_tbl')
            ->where('category_id', $request->id)
            ->delete();



        $message = "Record has been deleted successfully";
        return redirect()->back()->withErrors($message);
    }

// SUBCATEGORY FUNCTIONS --------------------------------------------------------------->
public function listSubcategory()
{

    $listSubcategory = DB::table('subcategory_tbl')
                        ->leftJoin('category_tbl', 'category_tbl.category_id', 'subcategory_tbl.category_id')
                        ->orderBy('subcategory_id', 'desc')
                        ->paginate(10);

    return view('subcategory.listSubcategory')->with('listSubcategory', $listSubcategory);
}



public function addSubcategory(Request $request)
{
    $listCat = DB::table('category_tbl')->orderBy('category_id', 'desc')->get();

    return view('subcategory.addSubcategory')->with('listCat', $listCat);
}

public function addNewSubcategory(Request $request)
{


    $subcategoryAdd = DB::table('subcategory_tbl')->insertGetId([
        'category_id' =>$request->category_id,
        'subcategory_name' => $request->subcategory_name

    ]);
    $message = "Record has been added successfully";

    return redirect()->route('subcategory.addSubcategory')->withErrors($message);
}



public function editSubcategory(Request $request)
{
    $editSubcategory = DB::table('subcategory_tbl')
    ->leftJoin('category_tbl', 'category_tbl.category_id', 'subcategory_tbl.category_id')
    ->where('subcategory_tbl.subcategory_id', $request->id)
    ->first();

   

    $listCat = DB::table('category_tbl')->orderBy('category_id', 'desc')->get();


    return view('subcategory.editSubcategory')->with('editSubcategory', $editSubcategory)
                                              ->with('listCat', $listCat);
 
}


public function updateSubcategory(Request $request)
{
    $subcategory_update =
        DB::table('subcategory_tbl')->where('subcategory_id', $request->subcategory_id)
                                 ->update([
                                        'category_id' =>$request->category_id,
                                        'subcategory_name' => $request->subcategory_name

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}

public function deleteSubcategory(Request $request)
{
    DB::table('subcategory_tbl')
        ->where('subcategory_id', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}


    
// ATTRIBUTE FUNCTIONS --------------------------------------------------------------->
public function listAttribute()
{

    $listAttribute = DB::table('attribute_tbl')
                        ->orderBy('attribute_id', 'desc')
                        ->paginate(10);

    return view('attribute.listAttribute')->with('listAttribute', $listAttribute);
}



public function addAttribute(Request $request)
{
    return view('attribute.addAttribute');

}

public function addNewAttribute(Request $request)
{


    $attributeID = DB::table('attribute_tbl')->insertGetId([
        'attribute_name' => $request->attribute_name

    ]);


  $values=  explode(',', $request->attribute_values);
  
  foreach($values as  $v)
  {
    DB::table('value_tbl')->insertGetId([
        'attribute_id'=>$attributeID,
        'value_name'=>$v 

    ]);
  }

    $message = "Record has been added successfully";

    return redirect()->route('attribute.addAttribute')->withErrors($message);
}



public function editAttribute(Request $request)
{
    $editAttribute = DB::table('attribute_tbl')->where('attribute_id', $request->id)->first();

    return view('attribute.editAttribute')->with('editAttribute', $editAttribute);
 
}


public function updateAttribute(Request $request)
{
    $attribute_update =
        DB::table('attribute_tbl')->where('attribute_id', $request->attribute_id)
                                 ->update([
                                    'attribute_name' => $request->attribute_name

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}

public function deleteAttribute(Request $request)
{
    DB::table('attribute_tbl')
        ->where('attribute_id', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}

// PRODUCT FUNCTIONS --------------------------------------------------------------->
public function listProduct()
{

    $listProduct = DB::table('product_tbl')
                        ->leftJoin('subcategory_tbl', 'subcategory_tbl.subcategory_id', 'product_tbl.subcategory_id')
                        ->orderBy('product_id', 'desc')
                        ->paginate(10);

    return view('product.listProduct')->with('listProduct', $listProduct);
}



public function addProduct(Request $request)
{
    $listSub = DB::table('subcategory_tbl')->orderBy('subcategory_id', 'desc')->get();
  
      return view('product.addProduct')->with('listSub', $listSub);

}

public function addNewProduct(Request $request)
{

    $attributeAdd = DB::table('product_tbl')->insertGetId([
        'product_name' => $request->product_name,
        'subcategory_id' => $request->subcategory_id,
        'product_quantity' => $request->product_quantity,
        'product_price' => $request->product_price

    ]);
    $message = "Record has been added successfully";

    return redirect()->route('product.addProduct')->withErrors($message);
}



public function editProduct(Request $request)
{
    $editProduct = DB::table('product_tbl')->where('product_id', $request->id)->first();
    $listSub1 = DB::table('subcategory_tbl')->orderBy('subcategory_id', 'desc')->get();
   
    return view('product.editProduct')->with('editProduct', $editProduct)
                                          ->with('listSub1', $listSub1);
 
}


public function updateProduct(Request $request)
{
    $product_update =
        DB::table('product_tbl')->where('product_id', $request->product_id)
                                 ->update([
                                    'product_name' => $request->product_name,
                                    'product_quantity' => $request->product_quantity,
                                    'product_price' => $request->product_price,
                                    'subcategory_id' => $request->subcategory_id

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}

public function deleteProduct(Request $request)
{
    DB::table('product_tbl')
        ->where('product_id', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}

// NOTIFICATION FUNCTIONS --------------------------------------------------------------->


public function deleteNotification(Request $request)
{
    DB::table('notification_tbl')
        ->where('notification', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}

public function listNotification()
{

    
    $listNotification = DB::table('notification_tbl')
                        ->leftJoin('users', 'notification_tbl.user_id', 'users.id')
                        ->leftJoin('product_tbl', 'notification_tbl.product_id', 'product_tbl.product_id')
                        ->orderBy('notification_id', 'desc')
                        ->paginate(10);

    return view('notification.listNotification')->with('listNotification', $listNotification);
}



public function addNotification(Request $request)
{
    $listUsers = DB::table('users')->orderBy('id', 'desc')->get();
    $listProducts = DB::table('product_tbl')->orderBy('product_id', 'desc')->get();
  
      return view('notification.addNotification')->with('listUsers', $listUsers)
                                                 ->with('listProducts', $listProducts);

}

public function addNewNotification(Request $request)
{

    $addNewNotification = DB::table('notification_tbl')->insertGetId([
        'notification_title' => $request->notification_title,
        'notification_descr' => $request->notification_descr,
        'user_id' => $request->user_id,
        'product_id' => $request->product_id

    ]);
    $message = "Record has been added successfully";

    return redirect()->route('notification.addNotification')->withErrors($message);
}

public function editNotification(Request $request)
{
    $editNotification = DB::table('notification_tbl')
    ->leftJoin('users', 'users.id', 'notification_tbl.user_id')
    ->where('notification_tbl.notification_id', $request->id)
    ->first();

   

    $listUser = DB::table('users')->orderBy('id', 'desc')->get();
    $listProduct = DB::table('product_tbl')->orderBy('product_id', 'desc')->get();


    return view('notification.editNotification')->with('editNotification', $editNotification)
                                              ->with('listUser', $listUser)
                                              ->with('listProduct', $listProduct);
 
}


public function updateNotification(Request $request)
{
    $updateNotification =
        DB::table('notification_tbl')->where('notification_id', $request->notification_id)
                                 ->update([
                                    'notification_title' => $request->notification_title,
                                    'notification_descr' => $request->notification_descr,
                                    'user_id' => $request->user_id,
                                    'product_id' => $request->product_id

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}


// BANNER FUNCTIONS --------------------------------------------------------------->
public function listBanner()
{

    $listBanner = DB::table('banner_tbl')
                        ->leftJoin('product_tbl', 'product_tbl.product_id', 'banner_tbl.product_id')
                        ->orderBy('banner_id', 'desc')
                        ->paginate(10);

    return view('banner.listBanner')->with('listBanner', $listBanner);
}



public function addBanner(Request $request)
{
    $listProducts = DB::table('product_tbl')->orderBy('product_id', 'desc')->get();

    return view('banner.addBanner')->with('listProducts', $listProducts);
}

public function addNewBanner(Request $request)
{


    $bannerAdd = DB::table('banner_tbl')->insertGetId([
        'product_id' =>$request->product_id,
        'banner_url' => $request->banner_url,
        'banner_expired_date' => date('Y-m-d', strtotime($request->banner_expired_date))


    ]);
    $message = "Record has been added successfully";

    return redirect()->route('banner.addBanner')->withErrors($message);
}



public function editBanner(Request $request)
{
    $editBanner = DB::table('banner_tbl')->where('banner_id', $request->id)->first();

    $listProname = DB::table('product_tbl')
    ->leftJoin('banner_tbl', 'banner_tbl.product_id', 'product_tbl.product_id')
    ->where('banner_tbl.banner_id', $request->id)
    ->first();

    $listProducts = DB::table('product_tbl')->orderBy('product_id', 'desc')->get();

    return view('banner.editBanner')->with('editBanner', $editBanner)
                                    ->with('listProname', $listProname)
                                    ->with('listProducts', $listProducts);
 
}


public function updateBanner(Request $request)
{
    $banner_update =
        DB::table('banner_tbl')->where('banner_id', $request->banner_id)
                                 ->update([
                                    'product_id' =>$request->product_id,
                                    'banner_url' => $request->banner_url,
                                    'banner_expired_date' => $request->banner_expired_date

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}

public function deleteBanner(Request $request)
{
    DB::table('banner_tbl')
        ->where('banner_id', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}


// Dboy FUNCTIONS --------------------------------------------------------------->
public function listDboy()
{

    $listDboy = DB::table('users')
                        ->where('type','=','3')
                        ->orderBy('id', 'desc')
                        ->paginate(10);

    return view('dboy.listDboy')->with('listDboy', $listDboy);
}



public function addDboy(Request $request)
{

    return view('dboy.addDboy');
}

public function addNewDboy(Request $request)
{


    $dboyAdd = DB::table('users')->insertGetId([
        'name' =>$request->name,
        'phone' => $request->phone,
        'type' => '3'


    ]);
    $message = "Record has been added successfully";

    return redirect()->route('dboy.addDboy')->withErrors($message);
}



public function editDboy(Request $request)
{
    $editDboy = DB::table('users')->where('id', $request->id)
                                  ->first();

    return view('dboy.editDboy')->with('editDboy', $editDboy);
 
}


public function updateDboy(Request $request)
{
    $dboy_update =
        DB::table('users')->where('id', $request->id)
                                 ->update([
                                    'name' =>$request->name,
                                    'phone' => $request->phone

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}

public function deleteDboy(Request $request)
{
    DB::table('users')
        ->where('id', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}


// CITY FUNCTIONS --------------------------------------------------------------->
public function listCity()
{

    $listCity = DB::table('city_tbl')
                        ->orderBy('city_id', 'desc')
                        ->paginate(10);

    return view('city.listCity')->with('listCity', $listCity);
}



public function addCity(Request $request)
{

    return view('city.addCity');
}

public function addNewCity(Request $request)
{


    $cityAdd = DB::table('city_tbl')->insertGetId([
        'city_name' =>$request->city_name,
        'city_shipping_price' => $request->city_shipping_price


    ]);
    $message = "Record has been added successfully";

    return redirect()->route('city.addCity')->withErrors($message);
}



public function editCity(Request $request)
{
    $editCity = DB::table('city_tbl')->where('city_id', $request->id)
                                  ->first();

    return view('city.editCity')->with('editCity', $editCity);
 
}


public function updateCity(Request $request)
{
    $city_update =
        DB::table('city_tbl')->where('city_id', $request->city_id)
                                 ->update([
                                    'city_name' =>$request->city_name,
                                    'city_shipping_price' => $request->city_shipping_price

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}

public function deleteCity(Request $request)
{
    DB::table('city_tbl')
        ->where('city_id', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}

// Order FUNCTIONS --------------------------------------------------------------->
public function listOrder()
{

    $listOrder = DB::table('order_tbl')
                        ->leftJoin('address_tbl', 'address_tbl.address_id', 'order_tbl.address_id')
                        ->leftJoin('users', 'users.id', 'order_tbl.user_id')
                        ->orderBy('order_id', 'desc')
                        ->paginate(10);

    return view('order.listOrder')->with('listOrder', $listOrder);
}



public function addOrder(Request $request)
{

    $users = DB::table('users')->orderBy('id', 'desc')->get();
    $address = DB::table('address_tbl')->orderBy('address_id', 'desc')->get();

    return view('order.addOrder')->with('users', $users)
                                 ->with('address', $address);
}

public function addNewOrder(Request $request)
{


    $cityAdd = DB::table('order_tbl')->insertGetId([
        'user_id' =>$request->user_id,
        'address_id' => $request->address_id,
        'order_number' => $request->order_number,
        'order_totalprice' => $request->order_totalprice,
        'order_status' => 'P'


    ]);
    $message = "Record has been added successfully";

    return redirect()->route('order.addOrder')->withErrors($message);
}



public function editOrder(Request $request)
{
    $users = DB::table('users')->orderBy('id', 'desc')->get();
    $address = DB::table('address_tbl')->orderBy('address_id', 'desc')->get();

    $editOrder = DB::table('order_tbl')->where('order_id', $request->id)->first();
   
   

    return view('order.editOrder')->with('editOrder', $editOrder)
                                  ->with('users', $users)
                                  ->with('address', $address);
 
}


public function updateOrder(Request $request)
{
    $order_update =
        DB::table('order_tbl')->where('order_id', $request->order_id)
                                 ->update([
                                    'user_id' =>$request->user_id,
                                    'address_id' => $request->address_id,
                                    'order_number' => $request->order_number,
                                    'order_totalprice' => $request->order_totalprice

                                             ]);
    $message = "Record has been updated successfully";

    return redirect()->back()->withErrors($message);
}

public function deleteOrder(Request $request)
{
    DB::table('order_tbl')
        ->where('order_id', $request->id)
        ->delete();



    $message = "Record has been deleted successfully";
    return redirect()->back()->withErrors($message);
}

}