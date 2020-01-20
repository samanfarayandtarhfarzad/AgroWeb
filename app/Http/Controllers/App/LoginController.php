<?

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $result_username = ['result' => 'username_error'];
        $result_password = ['result' => 'password_error'];

        if (!empty($request->username)) {

            $members = Member::where('username', $request->username)->orWhere('phone', $request->username)->orWhere('email', $request->username)->get();

            if ($members->count() > 0) {

                // $members = Member::where('password', $request->password)->orWhere('phone', $request->username)->orWhere('email', $request->username)->get();

                foreach ($members as $member) {

                    if ($member->password == $request->password) {
                        return response()->json([
                            'data' => [
                                'result' => 'ok',
                                'username' => $member->username,
                                'phone' => $member->phone,
                                'email' => $member->email,
                                'password' => $member->password,
                                'firstname' => $member->firstname,
                                'lastname' => $member->lastname,
                                'roleid' => $member->roleid,
                                'city_id' => $member->city_id,
                                'zipcode' => $member->zipcode,
                                'gender' => $member->gender,
                                'birthdate' => $member->birthdate,
                                'lastlogin' => $member->lastlogin,
                                'status' => $member->status
                            ]
                        ]);
                    } else {
                        return response()->json(['data' => $result_password]);
                    }

                }
            } else {
                return response()->json(['data' => $result_username]);
            }



            // $resault_email = Member::where('email', $request->email)->count();
            // $resault_username = Member::where('username', $request->username)->count();
            // $resault_phone = Member::where('phone', $request->phone)->count();

            // // $member = Member::where('username', $request->username)->get();

            // // ->orWhere('phone','=', $request->phone)->orWhere('email','=', $request->email)

            // $query = Member::query();
            // $columns = ['username', 'phone', 'email'];
            // foreach ($columns as $column) {
            //     $query->orWhere($column, $request->username);
            // }
            // $member = $query->get();



        } else {
            return response()->json(['data' => $result_username]);
        }
    }
}
