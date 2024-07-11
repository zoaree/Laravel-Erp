<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoutingController extends Controller
{

    /**
     * Constructor method to apply middleware
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Redirects authenticated users to index page, non-authenticated to login
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect('index');
        } else {
            return redirect('login');
        }
    }

    /**
     * Displays a view based on the first route parameter
     */
    public function root(Request $request, $first)
    {
        $mode = $request->query('mode');
        $demo = $request->query('demo');

        if ($first == "assets") {
            return redirect('home');
        }

        // Dinamik görünüm yolunu oluştur
        $viewPath = $first;

        // Görünüm dosyasının mevcut olup olmadığını kontrol et
        if (view()->exists($viewPath)) {
            return view($viewPath, ['mode' => $mode, 'demo' => $demo]);
        }

        // Görünüm bulunamazsa hata döndür
        abort(404, "View [$viewPath] not found.");
    }

    /**
     * Second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {
        $mode = $request->query('mode');
        $demo = $request->query('demo');

        if ($first == "assets") {
            return redirect('home');
        }

        // Dinamik görünüm yolunu oluştur
        $viewPath = $first . '.' . $second;

        // Görünüm dosyasının mevcut olup olmadığını kontrol et
        if (view()->exists($viewPath)) {
            return view($viewPath, ['mode' => $mode, 'demo' => $demo]);
        }

        // Görünüm bulunamazsa hata döndür
        abort(404, "View [$viewPath] not found.");
    }

    /**
     * Third level route
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {
        $mode = $request->query('mode');
        $demo = $request->query('demo');

        if ($first == "assets") {
            return redirect('home');
        }

        // Dinamik görünüm yolunu oluştur
        $viewPath = $first . '.' . $second . '.' . $third;

        // Görünüm dosyasının mevcut olup olmadığını kontrol et
        if (view()->exists($viewPath)) {
            return view($viewPath, ['mode' => $mode, 'demo' => $demo]);
        }

        // Görünüm bulunamazsa hata döndür
        abort(404, "View [$viewPath] not found.");
    }
}
