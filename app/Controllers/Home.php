<?php namespace App\Controllers;
use App\Models;
session_start();
class Home extends BaseController
{
	public function index()
	{
		return view('website/index');
	}

	public function afterRegistration()
	{
		return view('website/afterRegistration');
	}

	
	public function login()
	{
		return view('website/login');
	}

	public function articles()
	{
		// Avant de retourner l'affiche des news ; execution d'une requête SQL qui permet d'afficher toutes les news sur la page.
		$article = new \App\Models\Article();
    $data['article'] = $article->getAllArticlesByOrderTime_CreatedDesc();
		return view('website/articles',$data);
	}

	public function salons()
	{
		// Avant de retourner la liste des salons ; execution d'une requête SQL qui permet d'afficher tout les salons sur la page.
		$salon = new \App\Models\Salon();
		$listSalon['salon'] = $salon->getAllSalons();
		
		// Chargement des photos également
		$salonPhoto = new \App\Models\Salon_Photo();
		$listSalon['photo'] = $salonPhoto->getAllPhotosOfAllSalons();

		return view('website/listeSalons',$listSalon);
	}



	//--------------------------------------------------------------------
}
