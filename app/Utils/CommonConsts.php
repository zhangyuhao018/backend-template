<?php

namespace App\Utils;


class CommonConsts
{

  // -----------------メッセージ関連-------------------------------------
  const MSG_ICMIR001 = "%sを登録しました。";

  const MSG_ICMIR002 = "%sが完了しました。";

  const MSG_ICMIR003 = "%sのお手続きを開始いたします";

  const MSG_ICMIR004 = "%sのお手続きを完了いたしました";

  const MSG_ICMUR001 = "%sを変更しました。";

  const MSG_ICMUR002 = "%sを新規作成しました。";

  const MSG_ICMDR001 = "%sを削除しました。";

  const MSG_ICMDR002 = "%sを取消しました。";

  const MSG_ICMDR003 = "%sが存在するため、削除できません。";
  
  const MSG_ICMDR004 = "%sが指定されていないため、%s削除処理に失敗しました。";

  const MSG_ICMDR005 = "%sが指定されていません。";

  const MSG_ICMCR001 = "%sが見つかりませんでした。";

  const MSG_ICMCR002 = "%sのアップロードに失敗しました。"; 

  const MSG_ECMIR001 = "ログアウトしました。";
  
  const MSG_ECMIR002 = "ログインしました。";
  
  const MSG_REGISTER_SUCCESS01 = "登録が完了しました。";

  const MSG_COMMENT_SUCCESS02 = "コメントが完了しました。";
  const MSG_COMMENT_SUCCESS03 = "クリップが完了しました。";
  const MSG_COMMENT_SUCCESS05 = "いいねが完了しました。";
  const MSG_COMMENT_SUCCESS04 = "退会が完了しました。";

  
  const MSG_CHANGE_01 = "更新が完了しました。";
  const MSG_ECMCM001 = "エラーが発生しました。";

  const MSG_ECMCR001 = "該当操作を実行する権限がありません。";

  const MSG_ECMCR002 = "該当ページが見つかりません。";

  const MSG_ECMCR003 = "認証期限が切れました。再ログインしてください。";

  const MSG_ECMCR004 = "入力内容にて不備があります。";

  const MSG_ECMCR005 = "CSRFトークンが一致しません。";

  const MSG_ECMCR006 = "ログインできません。メールアドレス・パスワードをご確認ください。";

  const MSG_ECMCR007 = "データベース操作に失敗しました。";

  const MSG_ECMCR008 = "システムエラーが発生しました。";

  const MSG_ECMCR009 = "OpenIM側で問題が発生しました。";

  const MSG_ECMCR010 = "Line側で問題が発生しました。";
  
  const MSG_ECMCR011 = "登録メール送信に失敗しました。";

  const MSG_ECMCR012 = "S3側で問題が発生しました。";

  // リクエスト関連
  const REQ_PARAM_DATA = 'data';

  const REQ_PARAM_ITEM = 'item';

  const REQ_PARAM_ATTR = 'attr';

  const REQ_PARAM_IDS = 'ids';

  const REQ_PARAM_ATTR_FORM = 'attrFm';

  const REQ_PARAM_ATTR_ACCOUNT_FORM = 'attrActFm';

  const REQ_PARAM_ATTR_DETAIL = 'attrDtl';
  const REQ_PARAM_ATTR_ATTACH = 'attrAttach';

  const REQ_PARAM_DEFINED = 'defined';

  const REQ_PARAM_ATTACH_TYPE_ALL = 'ALL';

  const REQ_PARAM_ATTACH_TYPE_CSV = 'CSV';

  const REQ_PARAM_ATTACH_TYPE_PDF = 'PDF';

  // レスポンス関連
  const RES_JSON_STATUS_NORMAL = 1;

  const RES_JSON_STATUS_APP_ERROR = 8;

  const RES_JSON_STATUS_SYS_ERROR = 9;

  const RES_JSON_KEY_STATUS = 'status';

  const RES_JSON_KEY_ERRORS = 'errors'; 

  const RES_JSON_KEY_TOKEN = 'token';

  const RES_JSON_KEY_ERROR_CODE = 'errorCode';

  const RES_JSON_KEY_MSG = 'msg';

  const RES_JSON_KEY_RST = 'rst';
  const RES_JSON_KEY_PAGINATION = 'pagination';

  // レスポンスエラーコード419
  const RES_APP_ERROR_CODE_CSRF_ERROR = 419;

  const RES_APP_ERROR_CODE_INPUT_ERROR = 601;

  // データ不整合でDB処理がエラー発生
  const RES_APP_ERROR_CODE_DB_DATA_ERROR = 602;
  // 未知原因でDB処理がエラー発生
  const RES_APP_ERROR_CODE_DB_ERROR = 692;

  const RES_APP_ERROR_CODE_LOGIC_ERROR = 603;

  // 未知原因でメール送信処理がエラー発生
  const RES_APP_ERROR_CODE_MAIL_ERROR = 694;

  // 未知原因でS3処理がエラー発生
  const RES_APP_ERROR_CODE_S3_ERROR = 695;

  // 未知原因でOCR処理がエラー発生
  const RES_APP_ERROR_CODE_OCR_ERROR = 696;

  // ファイル出力関連
  const FILE_KEY_CONTENTS = 'contents';

  const FILE_KEY_HEADERS = 'headers';

  // CSV出力関連
  const CSV_KEY_CONTENTS = 'contents';

  const CSV_KEY_HEADERS = 'headers';

  // 採番管理
  const TB_ASSIGNMENT_MGR = "assignment_mgr";

  const KEY_ASSIGNMENT_TYPE = "type";

  const KEY_ASSIGNMENT_DEFINED = "defined";

  const KEY_ASSIGNMENT_ASSIGNMENT = "assignment";

  const ASSIGNMENT_BASE_CD = 1;

  const KEY_FILES_TYPE = 'type';

  const EXT_FILES_DAT = '.dat';
  const EXT_FILES_TXT = '.txt';
  const EXT_FILES_CSV = '.csv';
  const EXT_FILES_PDF = '.pdf';

  const KEY_FILES_PATH = 'path';

  const KEY_FILES_REG_DATE = 'reg_date';

  const KEY_FILES_TARGET_DATE = 'target_date';

  const KEY_FILES_TARGET_DATE_START = "target_date_start";

  const KEY_FILES_TARGET_DATE_END = "target_date_end";

  const KEY_FILES_NAME = 'name';

  const KEY_FILES_F_STATUS = "f_status";

  const FLG_FILES_STATUS_INVALID = 9;

  const FLG_FILES_STATUS_VALID = 1;

  const KEY_FILES_RELATION = 'files';
  const KEY_FILE_RELATION = 'file';
  const KEY_FILES_FOREIGN_KEY = "file_id";
  const KEY_CREATOR_RELATION = 'creator';

  const JP_YEAR_INT
  = [
    1 => 1867,
    2 => 1911,
    3 => 1925,
    4 => 1988,
    5 => 2018,
  ];

  // ステータス管理
  const TB_STATUS_MGR = "status_mgr";
  const KEY_STATUS_MGR_RELATION = 'statusMgrs';
  const KEY_STATUS_MGR_FOREIGN_KEY = "ref_id";
  const KEY_STATUS_MGR_TARGET_DATE = "target_date";
  const KEY_STATUS_MGR_TYPE = "type";
  const FLG_STATUS_MGR_TYPE_1 = '1';
  const FLG_STATUS_MGR_TYPE_2 = '2';
  const FLG_STATUS_MGR_TYPE_3 = '3';
  const FLG_STATUS_MGR_TYPE_4 = '4';
  const KEY_STATUS_MGR_STATUS = "status";
  const FLG_STATUS_MGR_STATUS_1 = '1';
  const FLG_STATUS_MGR_STATUS_2 = '2';
  const FLG_STATUS_MGR_STATUS_3 = '3';
  const FLG_STATUS_MGR_STATUS_4 = '4';
  const FLG_STATUS_MGR_STATUS_8 = '8';
  const KEY_STATUS_MGR_DETAIL = "detail";

  // スケジュール管理
  const TB_SCHEDULE_MGR = "schedule_mgr";
  const KEY_SCHEDULE_MGR_TYPE = "type";
  const KEY_SCHEDULE_MGR_START_DATE = "start_date";
  const KEY_SCHEDULE_MGR_END_DATE = "end_date";
  const KEY_SCHEDULE_MGR_TARGET_DATE = "target_date";
}
