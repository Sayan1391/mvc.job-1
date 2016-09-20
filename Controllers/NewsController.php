<?php

require __DIR__ . '/../classes/DatabaseClass.php';

require __DIR__. '/../Core/Components/CView.php';

/**
 * Created by PhpStorm.
 * @author Sayan
 * Date: 16.09.2016
 * Time: 14:18
 * @package controllers
 */
class NewsController
{
    /**
     * @author Sayan
     * рендерим представления с формой добавления записи
     */
    public function actionCreate()
    {
        $view = new CView();
        $view->render('create');
    }

    /**
     * @author Sayan
     * @throws Exception
     * добавляем информацию в базу данных. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionCreateProcess()
    {
        $dbObj = new DatabaseClass();
        $result = $dbObj->insert('news17', ['title' => $_POST['title'], 'description' => $_POST['description']]);

        if ($result === false) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }

    /**
     * @author Sayan
     * выводим всю информацию из базы данных
     */
    public function actionIndex()
    {
        $dbObj = new DatabaseClass();
        $result = $dbObj->findAll('news17');

        $view = new CView();
        $view->render('index', [
            'result' => $result,
        ]);
    }

    /**
     * @author Sayan
     * выводим информацию из базы данных указанного Id
     */
    public function actionView()
    {
        $dbObj = new DatabaseClass();
        $result = $dbObj->findOne('news17', $_GET['id']);

        $view = new CView();
        $view->render('view', [
            'result' => $result,
        ]);
    }

    /**
     * @author Sayan
     * рендерим представления с формой обновления записи
     */
    public function actionUpdate()
    {
        $dbObj = new DatabaseClass();
        $result = $dbObj->findOne('news17', $_GET['id']);
        
        $view = new CView();
        $view->render('update', [
            'result' => $result,
        ]);
    }

    /**
     * @author Sayan
     * @throws Exception
     * редактируем информацию в базе данных. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionUpdateProcess()
    {
        $dbObj = new DatabaseClass();
        $result = $dbObj->update('news17', ['title' => $_POST['title'], 'description' => $_POST['description']], ['id' => $_POST['id']]);

        if ($result === false) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }

    /**
     * @author Sayan
     * @throws Exception
     * рендерим представления с формой удаления записи. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionDelete()
    {
        $dbObj = new DatabaseClass();
        $result = $dbObj->delete('news17', ['id' => $_GET['id']]);

        if ($result === false) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }
}