<?php

namespace app\controllers;
use app\models\Post;

class PostController extends AppController{

	public function actionIndex(){

		//$posts = Post::find()->all(); // select all column from table "post"
		//$posts = Post::find()->select('id, title, text, excerpt')->limit(2)->orderby('id desc')->all(); // select column "id, text, excerpt" from table "post"
		$query = Post::find()->select('id, title, text, excerpt')->orderby('id desc');
		$pages = new \yii\data\Pagination(['totalCount'=>$query->count(), 'pageSize' => 2, 'pageSizeParam'=>false,'forcePageParam'=>false]);

		$posts = $query -> offset($pages -> offset)->limit($pages->limit)->all();
		//$this->debug($posts);

		//$hello = "Привет, $name!";
		//return $this->render('index');
		//return $this->render('index',['key' => $hello]); // в виде доступна переменная $key
		//return $this->render('index',compact('hello')); // в виде доступна переменная $hello
		return $this->render('index',compact('posts','pages')); // в виде доступна переменная $hello
	}

	public function actionView(){
		$id = \Yii::$app->request->get('id');
		$post = Post::findone($id);
		if(empty($post)) throw new \yii\web\HttpException(404,'Такой страницы нет');
		return $this->render('view',compact('post'));

	}
}