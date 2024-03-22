<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminDocumentation(){
        return view('admin.admin_documentation');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileUpdate(Request $request){

        $request->validate([

            'email' => 'required|email',
            // 'phone' => 'required|digits:9'
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Succesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminPassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_password',compact('profileData'));
    }

    public function AdminPasswordUpdate(Request $request){

        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'
        ]);
      
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $notification = array(
            'message' => 'Admin Password Updated Succesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminUserNew(){
        return view('admin.admin_user_new');
    }

    public function AdminUserCreate(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->save();
        $notification = array(
            'message' => 'User Created Succesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminUserList()
    {
        $userList = User::where('role','user')->get();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.admin_user_list',compact('userList'));
    }

    public function AdminUserView($id)
    {
        $profileData = User::find($id);

        return view('admin.admin_user_view',compact('profileData'));
    }

    public function AdminUserDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Succesfully!',
            'alert-type' => 'success'
        );

        $userList = User::where('role','user')->get();

        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);

        return view('admin.admin_user_list',compact('userList'))->with($notification);
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminUserPrint($id)
    {
        $user = User::find($id);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
        ];

        $pdf = Pdf::loadView('admin.admin_user_pdf', $data);
        return $pdf->download('print_user.pdf');
    }

}
