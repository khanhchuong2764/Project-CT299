<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductValidate;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\producer;
use App\Models\unit;
use Dotenv\Util\Regex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
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
        ]);
    }

    public function create(Request $request) {  
        $find = [
            'delete' => false
        ];
        $record = CategoryProduct::where($find)->get(); 
        $producers = producer::all()->sortDesc(); 
        $units = unit::all()->sortDesc(); 
        return view('admin.pages.product.create',[
            'titlePage' => 'Thêm Mới Sản Phẩm',
            'record' => $record,
            'producers' => $producers,
            'units' => $units 
        ]);
    }

    public function createPost(ProductValidate $request) { 
        if ($request->file('file')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
            $request['thumbnail']= $uploadedFileUrl;
        }
        $posittion = $request->input('posittion');
        $find = [
            'delete' => false
        ];
        if ($posittion) {
            $posittion = (int)$posittion;
        }else {
            $posittion =Product::where($find)->count() + 1;   
        }
        $request['posittion'] = $posittion;
        Product::create($request->all());
        session()->flash('success', 'Tạo Sản Phẩm Thành Công');
        return redirect("/admin/product");
    }

    public function ChangeStatus(Request $request,string $id,string $status) {   
        Product::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }

    public function changeMulti(Request $request) { 
        $ids = explode(',',$request->input('ids'));
        $type = $request->input('type');
        switch ($type) {
            case 'active':
                Product::whereIn('id', $ids)->update(['status' => 'active']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'inactive':
                Product::whereIn('id', $ids)->update(['status' => 'inactive']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'delete':
                Product::whereIn('id', $ids)->update(
                    [
                        'delete' => true,
                        'DeleteAt' => date('Y-m-d H:i:s')
                    ]
                );
                session()->flash('success', "Đã Xóa Thành Công " . count($ids) .  " Sản Phẩm");
                break;
            case 'posittion':
                foreach ($ids as $key => $value) {
                    [$id,$posittion] = explode('/',$value); 
                    $posittion = (int)$posittion;
                    Product::find($id)->update(['posittion' => $posittion]);
                    session()->flash('success', 'Cập nhật Trạng Thái thành công');
                }
                break;
        }
        return redirect()->back();
    }

    public function Delete(Request $request,string $id) {
        Product::find($id)->update(
            [
                'delete' => true,
                'DeleteAt' => date('Y-m-d H:i:s')
            ]
        );
        session()->flash('success', 'Đã Xóa Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function edit(Request $request,string $id) { 
        $producers = producer::all()->sortDesc(); 
        $units = unit::all()->sortDesc();   
        $category = CategoryProduct::where('delete', false)->get(); 
        $record = Product::find($id);
        return view('admin.pages.product.edit',[
            'titlePage' => 'Chỉnh Sửa Sản Phẩm',
            'record' => $record,
            'producers' => $producers,
            'units' => $units ,
            'category' => $category 
        ]);
    }
    public function editPatch(ProductValidate $request ,string $id) {   
        if ($request->file('file')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
            $request['thumbnail']= $uploadedFileUrl;
        }
        $posittion = $request->input('posittion');
        $find = [
            'delete' => false
        ];
        if ($posittion) {
            $posittion = (int)$posittion;
        }else {
            $posittion =Product::where($find)->count() + 1;   
        }   
        $request['posittion'] = $posittion;
        Product::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function detail(Request $request,string $id) {   
        $record = Product::find($id);
        return view('admin.pages.product.detail',[
            'titlePage' => 'Chi Tiết Sản Phẩm',
            'record' => $record
        ]);
    }
}
