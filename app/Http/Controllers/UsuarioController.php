<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\User;
use App\Rol;
use App\UserLog;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function login(Request $request){
        $credenciales = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:25'],
            'password' => ['required', 'string', 'min:6', 'max:18']
        ]);

        $remember_me = $request->filled('remember');

        if(Auth::attempt($credenciales, $remember_me)){
            //Guardar Histórico
            $usuariolog = new UserLog();
            $usuariolog->usuario = $request->input('name');
            $usuariolog->accion = 'login';
            $usuariolog->ipclient = $request->getClientIp(true);
            $usuariolog->save();

            $request->session()->regenerate();
            return redirect('/');
        }else{
            return redirect('/login')->withInput()->withError('Las Credenciales ingresadas son incorrectas');
        }
    }

    public function logout(Request $request){
        $user_name = Auth::user()->name;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //Guardar Histórico
        $usuariolog = new UserLog();
        $usuariolog->usuario = $user_name;
        $usuariolog->accion = 'logout';
        $usuariolog->ipclient = $request->getClientIp(true);
        $usuariolog->save();
        return redirect('/login');
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = User::with('rol')->where('estado', true)->orderby('created_at', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('password', function($row){
                    return '<a href="javascript:void(0)" class="resetear_password btn btn-info btn-sm">Restablecer</a>';
                })
                ->addColumn('action', function($row){
                    return '<a href='.url("usuario/edit/".$row->id).' class="btn btn-warning btn-sm">Editar</a>';
                })
                ->addColumn('rol', function (User $user) {
                    return $user->rol->nombre;
                })
                ->rawColumns(['password', 'action'])
                ->make(true);
        }
        return view('usuario.listado');
    }

    public function save(Request $request){
        $other_name_user = User::where('name', $request->input('nombre_usuario'))->get();

        if(count($other_name_user) == 0){
            $usuario = new User();
            $usuario->nombres = $request->input('nombres');
            $usuario->apellidos = $request->input('apellidos');
            $usuario->dni = $request->input('dni');
            $usuario->email = $request->input('email');
            $usuario->rol_id = $request->input('rol');
            $usuario->name = $request->input('nombre_usuario');
            $usuario->password = Hash::make($request->input('password_aper'));
            $usuario->estado = true;
            $usuario->save();
            return response()->json(['code'=>200, 'message'=>'Registro Guardado con Éxito']);
        }else{
            return response()->json(['code'=>406, 'message'=>'El Nombre de Usuario ya está en uso']);
        }
    }

    public function add(){
        return view('usuario.registro', ['roles' => Rol::all()]);
    }

    public function edit($id){
        $usuario = User::find($id);
        $roles = Rol::all();
        return view("usuario.actualizacion", compact("usuario", "roles"));
    }

    public function update(Request $request){
        $other_name_user = User::where('name', $request->input('nombre_usuario'))->get();

        if(count($other_name_user) == 0){
            $usuario = User::find($request->input('idUsuario'));
            $usuario->nombres = $request->input('nombres');
            $usuario->apellidos = $request->input('apellidos');
            $usuario->dni = $request->input('dni');
            $usuario->email = $request->input('email');
            $usuario->rol_id = $request->input('rol');
            $usuario->estado = true;
            $usuario->save();
            return response()->json(['code'=>200, 'message'=>'Registro Actualizado con Éxito']);
        }else{
            return response()->json(['code'=>406, 'message'=>'El Nombre de Usuario ya está en uso']);
        }
    }

    public function delete($id){
        $respuesta = 404;
        $usuarioObtenido = User::find($id);
        //$usuarioBuscado->estado = false;
        if ($usuarioObtenido->delete()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }

    public function resetpwd(Request $request){
        $usuarioObtenido = User::find($request->input('idUsuario'));
        $usuarioObtenido->password = Hash::make($request->input('new_password'));
        $usuarioObtenido->save();

        //Guardar Histórico
        $usuariolog = new UserLog();
        $usuariolog->usuario = $usuarioObtenido->name;
        $usuariolog->accion = 'resetpwd';
        $usuariolog->ipclient = $request->getClientIp(true);
        $usuariolog->save();

        return response()->json(['code'=>200, 'message'=>'Contraseña restablecida con Éxito']);
    }

    public function cambiopwd(Request $request){
        $message = "La Contraseña actual no es correcta";
        $code = 404;
        $pwd_actual = $request->input('pwd_actual');
        $usuarioObtenido = User::find($request->input('idUsuario'));
        if(Hash::check($pwd_actual, $usuarioObtenido->password)){
            //Contraseñas iguales
            $usuarioObtenido->password = Hash::make($request->input('new_password'));
            $message = "Contraseña Cambiada con Éxito";
            $code = 200;
        }

        $usuarioObtenido->save();
        return response()->json(['code'=>$code, 'message'=>$message]);
    }

    public function pagecambiopwd(){
        return view('usuario.cambiopwd');
    }
}
