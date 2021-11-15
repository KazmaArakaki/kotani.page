<?php
declare(strict_types=1);

namespace App\Utility;

use Cake\Core\Configure;
use Cake\I18n\Time;
use Cake\Log\Log;

class TwitterApi {
  public static function generateAuthorizationHeader(string $requestMethod, string $requestUrl, array $requestQuery, string $nonce, ?array $oAuthOptionalParams = [], ?string $oAuthTokenSecret = null) {
    $timestamp = Time::now()->toUnixString();

    $oAuthData = [
      'oauth_consumer_key' => Configure::read('Twitter.apiKey'),
      'oauth_nonce' => $nonce,
      'oauth_signature_method' => 'HMAC-SHA1',
      'oauth_timestamp' => $timestamp,
      'oauth_token' => Configure::read('Twitter.accessToken'),
      'oauth_version' => '1.0',
    ];

    if (!empty($oAuthOptionalParams)) {
      $oAuthData = $oAuthOptionalParams + $oAuthData;
    }

    $oAuthData['oauth_signature'] = self::generateSignature($requestMethod, $requestUrl, $requestQuery, $oAuthData, $oAuthTokenSecret);

    $oAuthString = '';

    foreach ($oAuthData as $key => $value) {
      $oAuthString .= !empty($oAuthString) ? ', ' : '';

      $oAuthString .= vsprintf('%s="%s"', [
        rawurlencode($key),
        rawurlencode($value),
      ]);
    }

    return sprintf('OAuth %s', $oAuthString);
  }

  public static function generateSignature(string $requestMethod, string $requestUrl, array $requestQuery, array $oAuthData, ?string $oAuthTokenSecret = null) {
    $signatureBaseData = [];

    foreach ($requestQuery + $oAuthData as $key => $value) {
      $signatureBaseData[rawurlencode($key)] = rawurlencode($value);
    }

    ksort($signatureBaseData);

    $parameterString = '';

    foreach ($signatureBaseData as $key => $value) {
      $parameterString .= !empty($parameterString) ? '&' : '';

      $parameterString .= vsprintf('%s=%s', [
        $key,
        $value,
      ]);
    }

    $signatureBaseString = implode('&', [
      $requestMethod,
      rawurlencode($requestUrl),
      rawurlencode($parameterString),
    ]);

    $signingKey = implode('&', [
      rawurlencode(Configure::read('Twitter.apiKeySecret')),
      rawurlencode(!empty($oAuthTokenSecret) ? $oAuthTokenSecret : Configure::read('Twitter.accessTokenSecret')),
    ]);

    return base64_encode(hash_hmac('sha1', $signatureBaseString, $signingKey, true));
  }
}

