<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxArticleController extends BaseController
{

	public function ajax_admin_article_delete($idArticle)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					// Récupération de l'article en question
					$articleToDelete = new \App\Models\Article();
					$data['articleToDelete'] = $articleToDelete->getArticleBySendingIdArticle($idArticle);

					return view('espace_admin/articles/modals/ajax_admin_articles_delete_modal',$data);
			}
	}

	
	public function ajax_admin_article_modify($idArticle)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					// Récupération de l'article en question	
					$articleToModify = new \App\Models\Article();
					$data['articleToModify'] = $articleToModify->getArticleBySendingIdArticle($idArticle);

					return view('espace_admin/articles/modals/ajax_admin_articles_modify_modal',$data);
			}
	}


	public function ajax_admin_article_read($idArticle)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{          
					// Récupération de l'article en question	
					$articleToRead = new \App\Models\Article();
					$data['articleToRead'] = $articleToRead->getArticleBySendingIdArticle($idArticle);

					return view('espace_admin/articles/modals/ajax_admin_articles_read_modal',$data);
			}
	}


}