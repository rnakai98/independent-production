<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->paginate(5);

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'stock' => 'required',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
                'stock' => $request->stock,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }


    // 検索機能
    public function item_search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $query = Item::query();
        // 文字を入力して検索ボタンを押した場合
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        // 空欄で検索ボタンを押した場合
        } else {
            // $items = Item::where('items.status', 'active')
            // ->select()
            // ->get();

        //return view('item.index', compact('items'));
        return redirect('/items');
        }

        $items = $query->paginate(5);

        return view('item.index', compact('items', 'keyword'));
    }

    //削除機能
    public function item_destroy($id)
    {
        // itemsテーブルから指定のIDのレコード1件を取得
        $item = Item::find($id);
        // レコードを削除
        $item->delete();
        

        // return view('item.index', compact('items'));
        return redirect('/items');
    }

    // 編集画面の表示
    public function item_showedit($id)
    {
        // itemsテーブルから指定のIDのレコード1件を取得
        $item = Item::find($id);

        return view('item_showedit', compact('item'));
    }

    // 編集機能
    public function item_edit(Request $request){
        
        //既存のレコードを取得して、編集してから保存する
        $item = Item::where('id', '=', $request->id)->first();
        $item->name = $request->name;
        $item->type = $request->type;
        $item->detail = $request->detail;
        $item->stock = $request->stock;
        $item->save();

        // $items = Item
        //     ::where('items.status', 'active')
        //     ->select()
        //     ->get();

            return redirect('/items');
    }
}
