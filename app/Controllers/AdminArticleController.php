<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminArticleController extends BaseController
{

	public function addArticle()
			{

					// Check si le titre de l'article n'est pas vide
					if(empty($_POST["articleTitle"]))
					{
							// Article vide => retour vue avec une erreur
							// On attribue une variable de session pour faire "pop" un message d'erreur lors de la redirection
					$_SESSION['errorLogArticle'] = array('Le titre doit être obligatoire pour l\'ajout d\'un nouvel article !');
					return redirect()->to(base_url('AdminController/admin_show_articles'));
					}
					$article = new \App\Models\Article();

					$creator = new \App\Models\User();
					$dataCreator = $creator->getUserBySendingId($_SESSION['user']->ID);

					$dataArticle = array("title"=>$_POST["articleTitle"],
															"body_content"=>$_POST["articleBody"],		 
															"creator_firstname"=>$dataCreator[0]['firstname']);
				
					$article->insertNewArticleIntoTableArticle($dataArticle);
					// On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
					$_SESSION['successLogArticle'] = array('L\'article "'. $_POST["articleTitle"] . '" a bien été posté !');
					return redirect()->to(base_url('AdminController/admin_show_articles'));

			}


    public function modifyArticle()
			{
					if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
					{
							// Check si le nom de l'article entré par l'admin n'est pas vide           
									if(empty($_POST['articleTitle']))
									{ 
										// Article vide => retour vue avec une erreur
										// On attribue une variable de session pour faire "pop" un message d'erreur lors de la redirection
										$_SESSION['errorLogArticle'] = array('Le titre doit être obligatoire pour modifier votre article !');
										return redirect()->to(base_url('AdminController/admin_show_articles'));
										
									}
								

							// Si les informations entrées sont valides, on va les modifier dans la database.

											// Création d'une instance article
											$article = new \App\Models\Article();
											// Assignation des valeurs postées dans une variable
											$dataArticleToModify = array("title"=>$_POST["articleTitle"],                                                     
																																		"body_content"=>$_POST["articleBody"],
																																		"ID"=>$_POST["articleId"]);
											// Ensuite, on UPDATE ces valeurs dans la db.
											$article->updateArticle($dataArticleToModify);
											
											// On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
											$_SESSION['successLogArticle'] = array('L\'article "'. $_POST["articleTitle"] . '" a bien été modifié !');
											return redirect()->to(base_url('AdminController/admin_show_articles'));

					}
			}


		public function deleteArticle($idArticle)
			{
					if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
						{
								// Création d'une instance article
								$article = new \App\Models\Article();

								// On va garder en mémoire son nom pour l'afficher dans le message de succes, puis ensuite delete l'article
								$dataArticle['article'] = $article->getArticleBySendingIdArticle($idArticle);
								$articleToDelete = $article->deleteArticleFromTableArticles($idArticle);

								// On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
								$_SESSION['successLogArticle'] = array('L\'article "'. $dataArticle['article'][0]['title'] . '" a bien été modifié !');
								return redirect()->to(base_url('AdminController/admin_show_articles'));
						}
			}



	
}
