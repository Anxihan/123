# ðèèä¸ SDK
[![Total Downloads](https://poser.pugx.org/laradocs/moguding/d/total.svg)](https://packagist.org/packages/laradocs/moguding)
[![Latest Stable Version](https://poser.pugx.org/laradocs/moguding/v/stable.svg)](https://packagist.org/packages/laradocs/moguding)
[![Latest Unstable Version](https://poser.pugx.org/laradocs/moguding/v/unstable.svg)](https://packagist.org/packages/laradocs/moguding)
[![License](https://poser.pugx.org/laradocs/moguding/license.svg)](https://packagist.org/packages/laradocs/moguding)

ðèèä¸èªå¨ç­¾å°|æå¡ç»ä»¶

## PHP çæ¬
PHP éè¦ 8.0 æä»¥ä¸çæ¬

## å®è£

```php
composer require laradocs/moguding
```

### æ´æ°

```
composer update laradocs/moguding
```

## ç¨æ³

æ³¨ï¼åªè¦æ¯è¿åçæ°æ®å¨é¨é½æ¯æ°ç»

å¦ææ²¡ææ°æ®ä¼è¿å ç©ºæ°ç»

è¯·ä¸è¦ä½¿ç¨ isArray æ¥å¤æ­æ¯ä¸æ¯ç»å½å¤±è´¥ç­ä¸ç³»åæä½ã

æææ°æ®æä¼ç¨ xx/xxx ä»£æ¿ï¼å¹¶ä¸æ¯è¿åççå®æ°æ®ã

åæ°åè¿åçå·ä½éè¦æ°æ®è¯·å¾ä¸çï¼ï¼ï¼


```php
use Laradocs\Moguding\Client;

$factory = new Client();
/**
 * ç¨æ·ç»å½
 * 
 * @param string $device android|ios
 * @param string $phone ææºå·ç 
 * @param string $password å¯ç 
 * 
 * @return array
 */
$user = $factory->login ( $device, $phone, $password );
// ç»å½æåè¿åçéè¦æ°æ®
[
    "userId"   => "xxx",
    "token"    => "xxx",
    "userType" => "student" // è¿éæå¸è´¦å·è¿åçåºè¯¥æ¯ teacherï¼ææ²¡æµè¯è¿
]

/**
 * è·åè®¡å
 * 
 * @param string $token $user['token'] // ç¨æ·ç»å½åè¿åçæ°æ®
 * @param string $userType $user['userType'] // åä¸
 * @param int $userId $user['userId'] // åä¸
 * 
 * @return array
 */
$getPlan = $factory->getPlan ( $token, $userType, $userId );
// è·åè®¡åè¿åçéè¦æ°æ®
// æ³¨ï¼è¿éæ¯äºç»´æ°ç»ï¼å¯ä»¥ç¨ foreach éåã
// åºæ¬ä¸é½å¯ä»¥ç¨ [0]['planId'] ååºæ¥
// å¦ææ¯è¦ç¬¦åå¤§ä¼å°±ç¨ foreach å§ï¼ç¹æ®æåµç¹æ®å¤çã
[
    [
        "planId" => "xxx",
    ]
]

/**
 * æå¡ä¿å­
 * 
 * @param string $token $user['token'] // è¿ä¸ªæ¯ç¨æ·ç»å½è¿åçæ°æ®
 * @param int $userId $user['userId'] // åä¸
 * @param string $province ç // åä¸è¦æå¨ ä¾å¦ï¼ä¸æµ·å¸ / æ±è¥¿ç
 * @param string $city å¸ // åä¸è¦æå¨ ä¾å¦ï¼ä¸æµ·å¸ï¼ç´è¾å¸è¿éæä¸ªç»èï¼ä¹å¯ä»¥ç´æ¥ç¨ $province åéï¼ / åæå¸
 * @param string $address è¯¦ç»å°åï¼å½å®¶çå¸å°åï¼å¯ä»¥å¨èèä¸ä¸é¢çå®ä½ï¼ç´è¾å¸çè¯å°±ä¸è¦å çæå¸(ä¾ï¼å½å®¶ç/å¸xxåºå°å)çåå¸äºéä¸
 * @param float $longitude ç»åº¦ // ä¸é¢æè¯´æ
 * @param float $latitude çº¬åº¦ // ä¸é¢æè¯´æ
 * @param string $type START|ENDãSTART: ä¸ç­|END: ä¸ç­ã
 * @param string $device android|ios
 * @param string $planId $getPlan['planId'] // è¿ä¸ªæ¯è·åè®¡åè¿åç
 * @param string $description å¤æ³¨ï¼éå¿å¡«ï¼
 * @param string $country å½å®¶ï¼é»è®¤æ¯ä¸­å½ï¼
 * 
 * @return array
 */
$save = $factory->save (
    $token,
    $userId,
    $province,
    $city,
    $address,
    $longitude,
    $latitude,
    $type,
    $device,
    $planId,
    $description,
    $country
);
// æå¡ä¿å­è¿åçæ°æ®
[
    "createTime" => "2022-01-15 07:08:49"
    "attendanceId" => "xxxxxxxxxxxxxxxxxxxxxxxx"
]
```

 ð ä¸ç¥éèªå·±æå¨çç»çº¬åº¦ç¹å»ð [ç»çº¬åº¦æ¥è¯¢ - åæ æ¾åç³»ç»](https://jingweidu.bmcx.com)

ä¸è¬è¾å¥å¸åºå°±å¯ä»¥äºï¼ä¾å¦ `åæ`ï¼åé¢ä¸è¦å  `å¸`ï¼

---

> æ°åè½ï¼Server é± - æ¶æ¯éç¥

[Server é±](https://sct.ftqq.com) æ¯ä¸æ¬¾ãææºãåãæå¡å¨ãããæºè½è®¾å¤ãä¹é´çéä¿¡è½¯ä»¶ã

è¯´äººè¯ï¼å°±æ¯ä»æå¡å¨ãè·¯ç±å¨ç­è®¾å¤ä¸æ¨æ¶æ¯å°ææºçå·¥å·ã

ç¨æ³ï¼

```php
/**
 * Server é± - æ¶æ¯éç¥
 * 
 * @params string $title æ é¢
 * @params string $desp åæ
 * 
 * @return void
 */
$factory->sctSend ( SendKey, $title, $desp );
```

## è¯´æ

å¦ææéè¦æ´æ¹å½å®¶åå­¦å¯ä»¥è¿ä¹åï¼

```php
$save = $factory->save (
    ...
    '', // ä½¿ç¨ ''ï½"" åå ä½ç¬¦
    'è²å¾å®¾'
);
```

å¦æå¶å®çé®æé®é¢ï¼è¯·å¨ **[Issues](https://github.com/laradocs/php-moguding-sdk/issues)** æåºã

## åä½

å¦ææ¨æ³åä¸æ­¤é¡¹ç®ï¼è¯·ç¹å»å³ä¸è§ç `Fork` æé®ï¼æä»¬å±åç»´æ¤æ­¤é¡¹ç®ã

## Project supported by JetBrains

Many thanks to Jetbrains for kindly providing a license for me to work on this and other open-source projects.

[![JetBrains](https://resources.jetbrains.com/storage/products/company/brand/logos/jb_beam.svg)](https://www.jetbrains.com/?from=https://github.com/laradocs)
