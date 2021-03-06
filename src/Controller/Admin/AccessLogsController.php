<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Form\Admin\AccessLogsFilterForm;
use Cake\I18n\Time;

class AccessLogsController extends AdminController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('AccessLogExcludes');
  }

  public function index() {
    $form = new AccessLogsFilterForm();

    $form->setData($this->request->getQuery());

    if (empty($this->request->getQuery('created_from'))) {
      $form->setData([
        'created_from' => Time::now()
            ->setTimezone('Asia/Tokyo')
            ->hour(0)->minute(0)->second(0)
            ->subYear(1)->addDay(1)
            ->i18nFormat('yyyy-MM-dd', 'Asia/Tokyo'),
      ]);
    }

    $conditions = [];

    if (!empty($form->getData('session_id'))) {
      $conditions[] = ['AccessLogs.session_id' => $form->getData('session_id')];
    }

    if (!empty($form->getData('path'))) {
      $conditions[] = ['AccessLogs.path' => $form->getData('path')];
    }

    if (!empty($form->getData('user_agent'))) {
      $conditions[] = ['AccessLogs.user_agent' => $form->getData('user_agent')];
    }

    if (!empty($form->getData('ip_address'))) {
      $conditions[] = ['AccessLogs.ip_address' => $form->getData('ip_address')];
    }

    if (!empty($form->getData('created_from'))) {
      $conditions[] = [
        'AccessLogs.created >=' => (new Time($form->getData('created_from'), 'Asia/Tokyo'))
            ->setTimezone('UTC'),
      ];
    }

    if (!empty($form->getData('created_to'))) {
      $conditions[] = [
        'AccessLogs.created <=' => (new Time($form->getData('created_to'), 'Asia/Tokyo'))
            ->setTimezone('UTC'),
      ];
    }

    $accessLogExcludes = $this->AccessLogExcludes->find()
        ->toList();

    $sessionIdsToExclude = [];
    $userAgentsToExclude = [];
    $ipAddressesToExclude = [];

    foreach ($accessLogExcludes as $accessLogExclude) {
      if (!$accessLogExclude['is_active']) {
        continue;
      }

      if (!empty($accessLogExclude['session_id'])) {
        $sessionIdsToExclude[] = $accessLogExclude['session_id'];
      }

      if (!empty($accessLogExclude['user_agent'])) {
        $userAgentsToExclude[] = $accessLogExclude['user_agent'];
      }

      if (!empty($accessLogExclude['ip_address'])) {
        $ipAddressesToExclude[] = $accessLogExclude['ip_address'];
      }
    }

    if (!empty($sessionIdsToExclude)) {
      $conditions[] = [
        'AccessLogs.session_id NOT IN' => $sessionIdsToExclude,
      ];
    }

    if (!empty($userAgentsToExclude)) {
      $conditions[] = [
        'AccessLogs.user_agent NOT IN' => $userAgentsToExclude,
      ];
    }

    if (!empty($ipAddressesToExclude)) {
      $conditions[] = [
        'AccessLogs.ip_address NOT IN' => $ipAddressesToExclude,
      ];
    }

    $accessLogsQuery = $this->AccessLogs->find()
        ->where($conditions)
        ->order(['AccessLogs.created' => 'desc']);

    $accessLogsCount = $accessLogsQuery->count();

    $accessLogs = $this->paginate($accessLogsQuery, [
      'limit' => 100,
    ]);

    $this->set(compact([
      'accessLogExcludes',
      'accessLogs',
      'accessLogsCount',
      'form',
    ]));
  }
}

