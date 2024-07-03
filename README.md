# backend-template

## .env説明

```
# ユーザログインのトークン有効期限
SANCTUM_TOKEN_LIFETIME_MINUTES=1440

# フロントエンドのURL
FRONTEND_URL=

# PINCODEの有効期限設定
PINCODE_LIFETIME_MINUTES=30
```



## ログの記録

```
\LogService::outInfoLog('カスタムパラメータログ', ['key1' => 'value1', 'key2' => 'value2'])

\LogService::outInfoLog('これは情報ログです', ['操作' => 'テスト操作']);
\LogService::outDebugLog('これはデバッグログです');
\LogService::outWarningLog('これは警告ログです');
\LogService::outErrorLog('これはエラーログです');
\LogService::outAlertLog('これはアラートログです');
```



グローバルな例外処理

```
app/Exceptions/Handler.php
```

