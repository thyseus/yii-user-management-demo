<?php

// This is the bootstrap script of the yii user management demo application.
// It is not meant for any productive use.
require_once(dirname(__FILE__).'/vendor/yiisoft/yii/framework/yii.php');

Yii::createWebApplication(
  array(
    'aliases' => array(
      'user' => 'application.vendor.thyseus.yii-user-management.user',
      'role' => 'application.vendor.thyseus.yii-user-management.role',
      'profile' => 'application.vendor.thyseus.yii-user-management.profile',
      'registration' => 'application.vendor.thyseus.yii-user-management.registration',
      'avatar' => 'application.vendor.thyseus.yii-user-management.avatar',
      'usergroup' => 'application.vendor.thyseus.yii-user-management.usergroup',
      'friendship' => 'application.vendor.thyseus.yii-user-management.friendship',
      'message' => 'application.vendor.thyseus.yii-user-management.message',
    ),
    'basePath'=>dirname(__FILE__),
    'name'=>'Yii User Management Demo Application',
    'import'=>array(
      'application.models.*',
      'application.components.*',
      'user.components.*',
      'user.models.*',
    ),
    'modules'=>array(
      'user' => array(
        'debug' => true,
        'loginType' => 7, // username, email and hybridauth
        'hybridAuthProviders' => array('Facebook', 'Twitter'),
      ),
      'role' => array(),
      'registration' => array(),
      'profile' => array(),
      'avatar' => array(),
      'usergroup' => array(),
      'friendship' => array(),
      'message' => array(),
    ),
    'components'=>array(
      'cache' => array('class' => 'system.caching.CFileCache'),
      'user'=>array(
        'class' => 'user.components.YumWebUser',
        'allowAutoLogin'=>true,
      ),
      'urlManager'=>array(
        'urlFormat'=>'path',
        'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        ),
      ),
      'db'=>array(
        'connectionString' => 'mysql:host=localhost;dbname=yii_user_management_demo',
        'emulatePrepare' => true,
        'tablePrefix' => '',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
      ),
      'errorHandler'=>array(
        'errorAction'=>'site/error',
      ),
    )
  )

)->run();
?>
