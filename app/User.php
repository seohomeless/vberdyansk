<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\User;




class User extends Authenticatable
{
    use Notifiable;

		

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'osebe', 'avatar',
    ];

			
	  
	  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
	
	
	
	
	
	/****/
    /**
     * Функция для получения названия роли к которой пользователь принадлежит.
     *
     * @return boolean
     **/
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
    }
    /**
     * Проверка принадлежит ли пользователь к какой либо роли
     *
     * @return boolean
     */
    public function isEmployee()
    {
		
		$role = 1;
        $roles = $this->roles->toArray();
        return !empty($roles);
    }
    /**
     * Проверка имеет ли пользователь определенную роль
     *
     * @return boolean
     */
    public function hasRole($check)
    {
		$role = 1;
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
       
    }
    /**
     * Получение идентификатора роли
     *
     * @return int
     */
    private function getIdInArray($array, $term)
    {
		$role = 1;
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key + 1;
            }
        }
        return false;
    }

    public static function getUserName($user){
        return $user->name;
			$role = 1;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
