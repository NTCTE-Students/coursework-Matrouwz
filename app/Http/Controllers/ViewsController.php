<?php

namespace App\Http\Controllers;


use App\Models\Gift;
use Orchid\Attachment\Models\Attachment;

class ViewsController extends Controller
{
    public function index()
    {
        $query = Gift::query();

        if (!is_null(request('category'))) {
            $query->where('category', request('category'));
        }

        if (!is_null(request('sort'))) {
            $sortOrder = request('sort') === 'asc' ? 'asc' : 'desc';
            $query->orderBy('price', $sortOrder);
        }

        $gifts = $query->get()->map(function ($gift) {
            $image = Attachment::find($gift->image);
            $gift->image = $image ? $image->url() : null;
            return $gift;
        });

        return view("index", [
            'gifts' => $gifts,
        ]);
    }

    public function register()
    {
        return view("pages.register");
    }

    public function login()
    {
        return view("pages.login");
    }

    public function checks()
    {
        return view("pages.checks");
    }

    public function gift(Gift $gift)
    {
        return view("pages.gift", [
            'gift' => $gift,
        ]);
    }
}
