<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Adverisement;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendProductController extends Controller
{
    public function productsIndex(Request $request)
    {
        // Initialize products query
        $products = Product::withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->with(['variants', 'category', 'productImageGalleries'])
            ->where(['status' => 1, 'is_approved' => 1]);

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $products->where('category_id', $category->id);
        } elseif ($request->has('subcategory')) {
            $subcategory = SubCategory::where('slug', $request->subcategory)->firstOrFail();
            $products->where('sub_category_id', $subcategory->id);
        } elseif ($request->has('childcategory')) {
            $childCategory = ChildCategory::where('slug', $request->childcategory)->firstOrFail();
            $products->where('child_category_id', $childCategory->id);
        } elseif ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->firstOrFail();
            $products->where('brand_id', $brand->id);
        } elseif ($request->has('search')) {
            $products->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('long_description', 'like', '%' . $request->search . '%')
                    ->orWhereHas('category', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->search . '%')
                            ->orWhere('long_description', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Apply price range filter if present and valid
        $products->when($request->has('range'), function ($query) use ($request) {
            $price = explode(';', $request->range);
            if (count($price) == 2) {
                $from = $price[0];
                $to = $price[1];

                return $query->where(function ($query) use ($from, $to) {
                    $query->where(function ($query) use ($from, $to) {
                        $query->where('offer_price', '>=', $from)
                            ->where('offer_price', '<=', $to)
                            ->where('offer_start_date', '<', now())
                            ->where('offer_end_date', '>', now());
                    })->orWhere(function ($query) use ($from, $to) {
                        $query->where('price', '>=', $from)
                            ->where('price', '<=', $to)
                            ->where(function ($query) {
                                $query->whereNull('offer_price')
                                    ->orWhere('offer_end_date', '<', now());
                            });
                    });
                });
            }
        });


        // Paginate the results
        $products = $products->orderBy('id', 'DESC')->paginate(12);

        // Fetch categories and brands
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        // Fetch banner ad
        $productpage_banner_section = Adverisement::where('key', 'productpage_banner_section')->first();
        $productpage_banner_section = json_decode($productpage_banner_section?->value);

        return view('frontend.pages.product', compact('products', 'categories', 'brands', 'productpage_banner_section'));
    }



    /** Show product detail page */
    public function showProduct(string $slug)
    {
        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)->where('status', 1)->first();
        $reviews = ProductReview::where('product_id', $product->id)->where('status', 1)->paginate(10);
        return view('frontend.pages.product-detail', compact('product', 'reviews'));
    }

    public function chageListView(Request $request)
    {
       Session::put('product_list_style', $request->style);
    }
}
