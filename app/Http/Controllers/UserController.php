<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'asc')->get()->toArray();
        return Response::json([
                'data' => $user
        ], 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $user = User::create($input);
        $user->save();
        
        $string = 'Data User telah berhasil di Tambahkan dengan id ' . $user->id;
        return Response::json($string);
    }

    public function show($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return Response::json([
                'error' => [
                    'message' => 'User tidak ada',
                ]
            ], 404);
        } else {
             return Response::json([
                'data' => $user->toArray()
             ], 200);
        }
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $user = User::findOrFail($id);
        $users = $user->update($input);

        $string = 'Data User telah berhasil diUpdate dengan id ' . $user->id;
        return Response::json($string);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        $string = 'Data User telah berhasil di Hapus dengan id ' . $user->id;
        return Response::json($string);
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();
        
        $string = 'User dengan id '.$user->id.' telah berstatus '. $user->status;
        return Response::json($string);
    }

    public function nonactive($id)
    {
        $user = User::find($id);
        $user->status = 'nonactive';
        $user->save();

        $string = 'User dengan id '.$user->id.' telah berstatus '. $user->status;
        return Response::json($string);
    }
}
