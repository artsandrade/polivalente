<?php

use App\Http\Controllers\alunosController;
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
Route::middleware(['usuario_logado'])->group(function () {

    Route::get('/login', function () {
        return view('login.login');
    })->name('login');
    
});

Route::post('/login', [usuariosController::class, 'login'])->name('login_post');

Route::get('/redefinir-senha', function () {
    if (isset($_GET['codigo'])) {
        $recuperacao_senha = DB::table('usuarios_recuperacao_senha')->where('id_recuperacao', $_GET['codigo'])->count();
        if ($recuperacao_senha > 0) {
            $recuperacao_senha = DB::table('usuarios_recuperacao_senha')->where('id_recuperacao', $_GET['codigo'])->first();
            return view('login.redefinir_senha2', compact('recuperacao_senha'));
        } else {
            return redirect()->route('redefinir_senha');
        }
    } else {
        return view('login.redefinir_senha1');
    }
})->name('redefinir_senha');

Route::post('/redefinir-senha1', [usuariosController::class, 'redefinir_senha1'])->name('redefinir_senha1_post');

Route::post('/redefinir-senha2', [usuariosController::class, 'redefinir_senha2'])->name('redefinir_senha2_post');

Route::middleware(['autenticacao'])->group(function () {

    Route::middleware(['tipo_usuario'])->group(function () {

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

    });

    Route::get('/', function () {
        $alunos = DB::table('alunos')->count();
        $usuarios = DB::table('usuarios')->count();
        return view('inicio.inicio', compact('alunos', 'usuarios'));
    })->name('inicio');
    
    Route::get('/logout', [usuariosController::class, 'logout'])->name('logout_post');

    Route::prefix('/alunos')->group(function () {
        Route::get('/', function () {
            $alunos = DB::table('alunos')->get();
            return view('alunos.alunos', compact('alunos'));
        })->name('alunos_get');
    
        Route::get('/alterar', function () {
            if (isset($_GET['id'])) {
                $aluno = DB::table('alunos')->where('id_aluno', $_GET['id'])->count();
                if ($aluno > 0) {
                    $dados_aluno = DB::table('alunos')->where('id_aluno', $_GET['id'])->get();
                    $arquivos_aluno = DB::table('alunos_arquivos')->where('aluno_id', $_GET['id'])->get();
                    $usuarios = DB::table('usuarios')->get();
                    return view('alunos.alterar', compact('dados_aluno', 'arquivos_aluno', 'usuarios'));
                } else {
                    return redirect()->route('alunos_get');
                }
            } else {
                return redirect()->route('alunos_get');
            }
        })->name('alunos_alterar_get');
    
        Route::post('alterar', [alunosController::class, 'alterar'])->name('alunos_alterar_post');
    
        Route::get('baixar_arquivo', [alunosController::class, 'baixar_arquivo'])->name('alunos_baixar_arquivo_get');
    
        Route::get('/cadastrar', function () {
            return view('alunos.cadastrar');
        })->name('alunos_cadastrar_get');
    
        Route::post('cadastrar', [alunosController::class, 'cadastrar'])->name('alunos_cadastrar_post');
    
        Route::get('/visualizar', function () {
            if (isset($_GET['id'])) {
                $aluno = DB::table('alunos')->where('id_aluno', $_GET['id'])->count();
                if ($aluno > 0) {
                    $dados_aluno = DB::table('alunos')->where('id_aluno', $_GET['id'])->get();
                    $arquivos_aluno = DB::table('alunos_arquivos')->where('aluno_id', $_GET['id'])->get();
                    $usuarios = DB::table('usuarios')->get();
                    return view('alunos.visualizar', compact('dados_aluno', 'arquivos_aluno', 'usuarios'));
                } else {
                    return redirect()->route('alunos_get');
                }
            } else {
                return redirect()->route('alunos_get');
            }
            return view('alunos.visualizar');
        })->name('alunos_visualizar_get');
    
        Route::post('remover', [alunosController::class, 'remover'])->name('alunos_remover_post');
    
        Route::post('remover_arquivo', [alunosController::class, 'remover_arquivo'])->name('alunos_remover_arquivo_post');        
    });
    
    Route::prefix('/perfil')->group(function () {
        Route::get('/', function () {
            return view('perfil.perfil');
        })->name('perfil_get');
    
        Route::post('/', [usuariosController::class, 'alterar_senha'])->name('alterar_senha_post');
    });
    
});