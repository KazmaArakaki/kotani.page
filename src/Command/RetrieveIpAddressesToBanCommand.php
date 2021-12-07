<?php
declare(strict_types=1);

namespace App\Command;

use App\Exception\Exception as AppException;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\I18n\Time;
use Cake\Log\Log;

class RetrieveIpAddressesToBanCommand extends Command {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('InvalidAccessLogs');
  }

  public function execute(Arguments $args, ConsoleIo $io) {
    $ipAddressesToBan = $this->InvalidAccessLogs->find()
        ->select([
          'ip_address',
        ])
        ->where([
          ['ban_until_datetime >' => Time::now('UTC')],
        ])
        ->group([
          'ip_address',
        ])
        ->order([
          'MAX(ban_until_datetime)' => 'desc',
        ])
        ->reduce(function ($ipAddresses, $invalidAccessLog) {
          return implode('', [
            $ipAddresses,
            !empty($ipAddresses) ? "\n" : '',
            $invalidAccessLog['ip_address'],
          ]);
        }, '');

    $io->out($ipAddressesToBan);
  }
}

