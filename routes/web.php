<?php

use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $alunos = DB::table('alunos')->count();
    $usuarios = DB::table('usuarios')->count();
    return view('inicio.inicio', compact('alunos', 'usuarios'));
})->name('inicio');

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::post('/login', [usuariosController::class, 'login'])->name('login_post');

Route::get('/logout', [usuariosController::class, 'logout'])->name('logout_post');

Route::get('/redefinir-senha', function () {
    if (isset($_GET['codigo'])) {
        return view('login.redefinir_senha2');
    } else {
        return view('login.redefinir_senha1');
    }
})->name('redefinir_senha');

Route::prefix('/alunos')->group(function () {
    Route::get('/', function () {
        return view('alunos.alunos');
    })->name('alunos_get');

    Route::get('/alterar', function () {
        return view('alunos.alterar');
    })->name('alunos_alterar_get');

    Route::get('/cadastrar', function () {
        return view('alunos.cadastrar');
    })->name('alunos_cadastrar_get');

    Route::get('/visualizar', function () {
        return view('alunos.visualizar');
    })->name('alunos_visualizar_get');
});

Route::prefix('/perfil')->group(function () {
    Route::get('/', function () {
        return view('perfil.perfil');
    })->name('perfil_get');

    Route::post('/', [usuariosController::class, 'alterar_senha'])->name('alterar_senha_post');
});

Route::prefix('/usuarios')->group(function () {
    Route::get('/', function () {
        $usuarios = DB::table('usuarios')->get();
        return view('usuarios.usuarios', compact('usuarios'));
    })->name('usuarios_get');

    Route::get('/alterar', function () {
        if (isset($_GET['id'])) {
            $usuario = DB::table('usuarios')->where('id_usuario', $_GET['id'])->count();
            if ($usuario > 0) {
                $dados_usuario = DB::table('usuarios')->where('id_usuario', $_GET['id'])->get();
                return view('usuarios.alterar', compact('dados_usuario'));
            } else {
                return redirect()->route('usuarios_get');
            }
        } else {
            return redirect()->route('usuarios_get');
        }
    })->name('usuarios_alterar_get');

    Route::post('alterar', [usuariosController::class, 'alterar'])->name('usuarios_alterar_post');

    Route::get('/cadastrar', function () {
        return view('usuarios.cadastrar');
    })->name('usuarios_cadastrar_get');

    Route::post('/cadastrar', [usuariosController::class, 'cadastrar'])->name('usuarios_cadastrar_post');

    Route::get('/visualizar', function () {
        if (isset($_GET['id'])) {
            $usuario = DB::table('usuarios')->where('id_usuario', $_GET['id'])->count();
            if ($usuario > 0) {
                $dados_usuario = DB::table('usuarios')->where('id_usuario', $_GET['id'])->get();
                return view('usuarios.visualizar', compact('dados_usuario'));
            } else {
                return redirect()->route('usuarios_get');
            }
        } else {
            return redirect()->route('usuarios_get');
        }
    })->name('usuarios_visualizar_get');

    Route::post('remover', [usuariosController::class, 'remover'])->name('usuarios_remover_post');
});
