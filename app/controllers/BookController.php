<?php

class BookController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        
    }

    public function registerAction(){
        $data = json_decode(file_get_contents('php://input'), TRUE);

    	$registerbook = new Book();
    	$registerbook->assign(array(
    				'nama_buku' => $data["nama_buku"],
    				'jenis_buku' => $data["jenis_buku"],
    				'pengarang' => $data["pengarang_buku"],
    				'penerbit' => $data["penerbit_buku"], 
    			)
    		);
    	$registerbook->save();
        echo true;
    }

    public function updateAction(){
        $data = json_decode(file_get_contents('php://input'), TRUE);
        $id  = $data["id"];

        $book = Book::findFirstById($id);
        
        $book->nama_buku = $data["nama_buku"];
        $book->jenis_buku = $data["jenis_buku"];
        $book->pengarang = $data["pengarang_buku"];
        $book->penerbit = $data["penerbit_buku"];

        $book->save();
        echo true;
    }

    public function deleteAction($id){
        $data = json_decode(file_get_contents('php://input'), TRUE);
        $id  = $data["id"];
        
        $book = Book::findFirstById($id);
        $book->delete();
        
        echo true;
    }

    public function readAction(){
        $data_buku = Book::find();
        echo json_encode($data_buku);       
    }
}

