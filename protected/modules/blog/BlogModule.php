<?php
Yii::setPathOfAlias('BlogModule', dirname(__FILE__));

class BlogModule extends CWebModule implements IUrlRewriteModule
{

    /**
     * @var string
     */
    public $defaultController = 'post';

    public $controllerMap = array(
        'my' => array(
            'class' => 'BlogModule.controllers.front.MyPostController'),
        'member' => array(
            'class' => 'BlogModule.controllers.front.MemberPostController'),
    );


    static public function getDbTablePrefix()
    {
        return 'blog_';
    }

    /**
     * @var array

    public $controllerMap = array(
     * 'album'=>array(
     * 'class'=>'BlogModule.controllers.blogAlbumController'),
     * );
     */


    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'blog.models.*',
            'blog.components.*',
        ));

        //  Yii::app()->theme = 'dlfBlog';
        // Raise onModuleCreate event.
        if (Yii::app() instanceof CWebApplication) {
            Yii::app()->onModuleCreate(new CEvent($this));
        }

    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {

            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }


    /**
     * Method to return urlManager-parseable url rules
     * @return array An array of urlRules for this object
     * -------------------------------------------------------
     * return array(
     *  );
     *----------------------------------------------------------
     * 常用规则：
     * 模块名和控制器同名：'forum/<action:\w+>'=>'forum/forum/<action>',
     *
     *----------------------------------------------------------
     */
    public static function getUrlRules()
    {
        return array(
            'view/<controller:\w+>-<title:.*?>-<id:\d+>' => 'blog/<controller>/view',
            'tags/<tag:.*?>' => 'blog/post/list',
            'category/<alias:.*?>-<category:.*?>' => 'blog/post/list',
            'date/<year:\d+>-<month:\d+>' => 'blog/post/list',
            // '/'=>'blog/post/index', //使用home
            'blog/member/u-<u:\d+>' => 'blog/member/list',
            '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
        );
    }

    //.......................................................\\
    /**
     *
     * @param array $commentData
     */
    public function serviceHandleCommentCreate($commentData)
    {
        $model = $commentData['model'];
        $modelId = $commentData['model_id'];

        if ($model == 'Post') {
            // $eq = EasyQuery::instance('blog_post');
            /*
            Post::model()->updateCounters(array(
                'cmt_count'=>1,
            ));
            */
            Post::model()->updateByPk($modelId, array(
                'cmt_count' => new CDbExpression('cmt_count + 1 '),
                'last_cmt_time' => time(),
            ));
        }
    }

    /**
     * @param array $commentData
     */
    public function serviceHandleCommentsDeleted($commentData)
    {
        $model = $commentData['model'];
        $modelId = $commentData['model_id'];

        if ($model == 'Post') {
            // $eq = EasyQuery::instance('blog_post');
            /*
            Post::model()->updateCounters(array(
                'cmt_count'=>1,
            ));
            */
            Post::model()->updateByPk($modelId, array(
                'cmt_count' => $commentData['model_cmt_count'],
               // 'last_cmt_time' => time(),
            ));
        }
    }
    //.......................................................//
}
