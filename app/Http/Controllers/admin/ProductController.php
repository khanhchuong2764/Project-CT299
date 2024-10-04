<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Dotenv\Util\Regex;
use Illuminate\Http\Request;
use League\CommonMark\Util\RegexHelper;
use Nette\Utils\RegexpException;
use PhpParser\Node\Expr\Match_;
use PHPUnit\Framework\Constraint\RegularExpression;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex as UnidataRegex;

use function Termwind\parse;

class ProductController extends Controller
{
    public function index(Request $request) {  
        // $find = [
        //     'delete' => false
        // ];
        // $status = $request->input('status');
        // if ($status) {
        //     $find['status'] = $status;
        // }
        // $keyword = $request->input('keyword');
        // if ($keyword) {
        //     $regex = "'regex:/{$keyword}/i'"    ;
        //     $find['title'] = $regex;
        // }
        // $products = Product::where($find)->get();
        $FillterStatus = [
            [
                'name' => 'Tất Cả',
                'status' => '',
                'class' => ''
            ],
            [
                'name' => 'Hoạt Động',
                'status' => 'active',
                'class' => ''
            ],
            [
                'name' => 'Dừng Hoạt Động',
                'status' => 'inactive',
                'class' => ''
            ]
        ];
        $find = [
            'delete' => false
        ];

        //FillterStatus
        
        $status = $request->input('status');
        if ($status) {
            foreach ($FillterStatus as $key => $value) {
                if($value['status'] == $status) {
                    $FillterStatus[$key]['class']='active';
                }
            }
            $find['status'] = $status;
        }else {
            $FillterStatus[0]['class']='active';
        }
        $productsQuery = Product::where($find);
        
        // Search
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->where('title', 'regexp', $keyword);
        }
        $count = $productsQuery->count();
        $ObjectPagination = [
            'currentPage' => 1,
            'limitItemt' => 3
        ];
        $count = $productsQuery->count();
        $ObjectPagination['totalPage'] = ceil($count / ($ObjectPagination['limitItemt']) );
        $ObjectPagination['currentPage'] =  $request->input('page');    
        $ObjectPagination['skip'] = (($ObjectPagination['currentPage'] - 1 ) * ($ObjectPagination['limitItemt']));
        $products = $productsQuery->skip($ObjectPagination['skip'])->take($ObjectPagination['limitItemt'])->orderBy('posittion', 'desc')->get()  ;
        return view('admin.pages.product.index',[
            'titlePage' => 'Danh Sách Sản Phẩm',
            'products' => $products,
            'keyword' => $keyword,
            'FillterStatus' => $FillterStatus,
            'objectPagi' => $ObjectPagination
            // 'products' => Product::paginate(1)
        ]);
    }

    public function create(Request $request) {   
        dd('Helo');
        // return view('admin.pages.product.create',[
        //     'titlePage' => 'Thêm Mới Sản Phẩm'
        // ]);
    }

    public function createPost(Request $request) {   
        Product::create($request->all());
        return redirect()->back();
    }

    public function ChangeStatus(Request $request,string $id,string $status) {   
        Product::find($id)->update(['status' => $status]);
        return redirect()->back();
    }

    public function changeMulti(Request $request) { 
        $ids = explode(',',$request->input('ids'));
        $type = $request->input('type');
        switch ($type) {
            case 'active':
                Product::whereIn('id', $ids)->update(['status' => 'active']);
                break;
            case 'inactive':
                Product::whereIn('id', $ids)->update(['status' => 'inactive']);
                break;
            case 'delete':
                Product::whereIn('id', $ids)->update(['delete' => true]);
                break;
            case 'posittion':
                foreach ($ids as $key => $value) {
                    [$id,$posittion] = explode('-',$value);  
                    $posittion = (int)$posittion;
                    Product::find($id)->update(['posittion' => $posittion]);
                }
                break;
        }
        return redirect()->back();
    }

    public function Delete(Request $request,string $id) {
        // dd("helo");   
        Product::find($id)->update(['delete' => true]);
        return redirect()->back();
    }
}
