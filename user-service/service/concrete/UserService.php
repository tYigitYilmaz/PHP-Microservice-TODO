<?php
namespace Service\Concrete;


use Core\Model\Response;
use Data\Entity\User;
use Data\Entity\UserClient;
use Data\Repository\Abst\IUserRepo;
use Firebase\JWT\JWT;
use Illuminate\Support\Carbon;
use Service\Abst\IUserService;

class UserService implements IUserService
{

    protected $iUserRepo;

    public function __construct(IUserRepo $iUserRepo)
    {
        $this->userRepo = $iUserRepo;
    }

    public function register()
    {
        $data = json_decode(file_get_contents("php://input"));

        $user = ([
            'username' => htmlspecialchars($data->username),
            'first_name' => htmlspecialchars($data->firstname),
            'last_name' => htmlspecialchars($data->lastname),
            'email' => htmlspecialchars($data->email),
            'password' => password_hash($data->password, PASSWORD_BCRYPT),
            'created_at' => Carbon::now(),
        ]);

        if (is_null(User::where('email',$data->email)->first())) {
            User::insert($user);
            $user = json_decode(User::where('username', $user['username'])->first(), true);

            $user_client =([
                'client_id' => $user['user_id'],
                'client_secret' => $user['password'],
                'redirect_uri' => 'basicurl.com',
                'grant_types' => 'client_credentials',
                'scope' => 'read',
                'user_id' => $user['user_id'],
            ]);

            UserClient::insert($user_client);
            $response = new Response(true,"User was created.", [],200 );
            $response->send();
        } else {
            $response = new Response(true,"Unable to create user.", [],400 );
            $response->send();
        }
    }

    public function login()
    {
        $data =json_decode(file_get_contents("php://input"));
        $data_db = json_decode(User::where('email',$data->email)->first());

        if (password_verify($data->password, $data_db->password)){
            $user = User::where('username',$data->username)->first();
            $userClient = json_decode(UserClient::where('user_id',$user->user_id)->first());

            $response = new Response(true,[], $userClient,200 );
            $response->send();
        }
        return 'error';
    }
}