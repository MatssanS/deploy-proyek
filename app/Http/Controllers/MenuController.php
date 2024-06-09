<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga_menu' => 'required',
            'deskripsi' => 'required',
            'foto_menu_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_menu' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('foto_menu_path')) {
            $imagePath = $request->file('foto_menu_path')->store('uploads', 'public');
        }

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga_menu,
            'deskripsi' => $request->deskripsi,
            'foto_menu_path' => $imagePath, // Ensure to store the image path in the database
            'status_menu' => $request->status_menu,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dibuat.');
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga_menu' => 'required',
            'deskripsi' => 'required',
            'foto_menu_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_menu' => 'required',
        ]);

        if ($request->hasFile('foto_menu_path')) {
            if ($menu->foto_menu_path) {
                Storage::disk('public')->delete($menu->foto_menu_path);
            }
            $menu->foto_menu_path = $request->file('foto_menu_path')->store('uploads', 'public'); // Update the image path
        }

        $menu->nama_menu = $request->nama_menu;
        $menu->harga_menu = $request->harga_menu;
        $menu->deskripsi = $request->deskripsi;
        $menu->status_menu = $request->status_menu;
        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->foto_menu_path) {
            Storage::disk('public')->delete($menu->foto_menu_path);
        }
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
