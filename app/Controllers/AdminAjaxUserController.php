<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxUserController extends BaseController
{

	public function ajax_admin_user_delete($idUser)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					$userToDelete = new \App\Models\User();
					$data['userToDelete'] = $userToDelete->getUserBySendingId($idUser);

					return view('espace_admin/users/modals/ajax_admin_users_delete_modal',$data);
			}
	}

	
	public function ajax_admin_user_modify($idUser)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
			// Cette fonction va récupérer tout les éléments nécessaires à l'affichage de l'utilisateur dans le formulaire
					// Recupération de l'utilisateur en question
					$user = new \App\Models\User();
					$userData['user'] = $user->getUserBySendingId($idUser);

					// Récupération de son rôle (ID) actuel
					$roleUser = new \App\Models\User_Role();
					$userData['roleId'] = $roleUser->getRoleUserBySendingIdUser($idUser); 

					// Récupération de tout les rôles pour les placer dans le form select
					$role = new \App\Models\Role();
					$userData['allRoles'] = $role->getAllRoles();

					// Récupération du nom de rôle de l'utilisateur actuel (pour pouvoir inscrire son rôle actuel dans le choix lors de l'update)
					$userData['roleUserActuel'] = $role->getRoleNameBySendingIdUser($idUser);

					
					
					return view('espace_admin/users/modals/ajax_admin_users_modify_modal',$userData);
			}
	}


	public function ajax_admin_user_read($data)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{          
			$user = new \App\Models\User();
			$userData['user'] = $user->getUserBySendingId($data);
			return view('espace_admin/users/modals/ajax_admin_users_read_modal',$userData);
			}
	}

	public function ajax_admin_user_disable($idUser)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					$userToDisable = new \App\Models\User();
					$data['userToDisable'] = $userToDisable->getUserBySendingId($idUser);

					return view('espace_admin/users/modals/ajax_admin_users_disable_modal',$data);
			}
	}


}