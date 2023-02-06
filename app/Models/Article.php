<?php
namespace App\Models;

class Article extends \CodeIgniter\Model
{

    protected $table = 'Articles';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','title','body_content','time_created','creator_firstname'];

    public $ID;
    public $title;
    public $body_content;
    public $time_created;
    public $creator_firstname;

    

    public function getAllArticles()
    {
        $query = $this->db->query("SELECT * FROM articles ORDER BY title ASC");
        $data['article'] = $query->getResultArray();
        return $data['article'];
        
    }

    public function getAllArticlesByOrderTime_CreatedDesc()
    {
        $query = $this->db->query("SELECT * FROM articles ORDER BY time_created DESC");
        $data['article'] = $query->getResultArray();
        return $data['article'];
    }


    public function insertNewArticleIntoTableArticle($data)
    {
        $this->insert($data);

    }


    public function getArticleBySendingIdArticle($idArticle)
    {
        $query = $this->db->query("SELECT * FROM articles WHERE ID = '" .  $idArticle . "'");
        $row['article'] = $query->getResultArray();
        return $row['article'];
    }
    


    public function updateArticle($data)
    {
      $this->db->query("UPDATE articles 
                        SET title =  '" .  $data['title'] . "',
                            body_content = '" . $data['body_content'] . "'           
                            WHERE ID = '" .  $data['ID'] . "'");   
    }

     
    public function deleteArticleFromTableArticles($idArticle)
    {           
      $this->db->query("DELETE FROM articles WHERE ID =  '" .  $idArticle . "'");                 
    }
        
        

      



}