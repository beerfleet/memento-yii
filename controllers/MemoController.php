<?php

namespace app\controllers;

use app\models\Memo;
use app\models\MemoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Tag;

/**
 * MemoController implements the CRUD actions for Memo model.
 */
class MemoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Memo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MemoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Memo model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Memo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Memo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->save()) {
                    $this->assignTagsToMemo($model, $model->tagNames ?? []);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
            $model->tagNames = [];
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Memo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->tagNames = $model->getTagNames();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->save()) {
                    $this->assignTagsToMemo($model, $model->tagNames ?? []);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Memo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Memo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Memo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Memo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Assigns tags to a memo.
     * @param Memo $memo
     * @param array $tagNames
     */
    private function assignTagsToMemo($memo, $tagNames)
    {
        $tagNames = array_values(array_filter((array) $tagNames, static fn($tagName) => $tagName !== null && $tagName !== ''));
        $existing = array_map(static fn($tag) => $tag->name, $memo->tags);

        foreach (array_values(array_diff($existing, $tagNames)) as $tagName) {
            $tag = Tag::findOne(['name' => $tagName]);
            if ($tag) {
                $memo->unlink('tags', $tag, true);
            }
        }

        foreach (array_values(array_diff($tagNames, $existing)) as $tagName) {
            $tag = Tag::findOne(['name' => $tagName]) ?: new Tag(['name' => $tagName]);
            if ($tag->isNewRecord && !$tag->save()) {
                continue;
            }
            $memo->link('tags', $tag);
        }
    }
}
