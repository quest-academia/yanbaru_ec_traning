<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TOrder extends Model
{
    /**
     * ユーザIDをキーに注文履歴データを取得する。
     *
     * @param int $userId
     * @param string $orderBaseNumber
     * @param string $orderDetailNumber
     * @return Obj
     */
    public function getDetails($userId, $orderBaseNumber = null, $orderDetailNumber = null)
    {
        $orderBaseSql = DB::table('t_orders as base')
            ->join('t_orders_details as detail', 'base.id', '=', 'detail.order_id')
            // 注文IDとユーザーIDで絞る
            ->where([
                ['base.user_id', ':user_id'],
                ['base.id', ':id'],
                ['detail.order_detail_number', ':order_detail_number'],
            ])
            ->select(
                'base.id',
                'base.user_id',
                'base.order_date',
                'detail.shipment_status_id',
                'detail.products_id',
                'detail.order_detail_number',
                'detail.order_quantity',
                'detail.shipment_date'
            ) //メインでクエリ結合に必要なカラムを記述
            ->toSql();
        $orderHistoryData = DB::table(DB::raw('('.$orderBaseSql.') AS orderBase'))
            ->leftJoin('m_shipments_statuses', 'orderBase.shipment_status_id', '=', 'm_shipments_statuses.id')
            ->leftJoin('m_products', 'orderBase.products_id', '=', 'm_products.id')
            ->leftJoin('m_categories', 'm_products.category_id', '=', 'm_categories.id')
            ->leftJoin('m_users', 'orderBase.user_id', '=', 'm_users.id')
            ->leftJoin('m_users_classifications', 'm_users.user_classification_id', '=', 'm_users_classifications.id')
            ->setBindings(
                [
                    ':user_id' => $userId,
                    ':id' => $orderBaseNumber,
                    ':order_detail_number' => $orderDetailNumber
                ]
            )
            ->select(
                'orderBase.id', //注文ID
                'order_date', //注文日時
                'order_detail_number', //注文番号
                'order_quantity', //商品個数
                'shipment_date', //発送日
                'products_id', //商品ID
                'shipment_status_id', //発送状態
                'shipment_status_name', //発送状態名
                'products_id', //商品ID
                'product_name', //商品名
                'category_id', //カテゴリID
                'category_name', //カテゴリ名
                'price', //値段
                DB::raw("COALESCE(order_quantity, 0) * COALESCE(price, 0) AS sub_ttl"),
                'last_name', //姓
                'first_name', //名
                'zipcode', //郵便番号
                'prefecture', //都道府県
                'municipality', //市町村
                'address', //番地
                'apartments', //建物名
                'company_name', //企業名
                'phone_number' //電話番号
            ) //描画に使う値を記述
            ->get();
        return $orderHistoryData;
    }


    /**
     * ユーザIDをキーにグループ化した注文履歴データを取得する。
     *
     * @param int $userId
     * @param int $maxCountPerPage
     * @param bool $termFlg
     * @return Obj
     */
    public function getBaseOrder($userId, $maxCountPerPage, $termFlg = false)
    {
        $termTo = date("Y-m-d"); //todays date
        $termFrom   = date('Y-m-d', strtotime("-3 month")); //before 3 month
        $orderBaseSql = DB::table('t_orders as base')
            ->join('t_orders_details as detail', 'base.id', '=', 'detail.order_id')
            ->select(
                'base.id',
                'base.user_id',
                // 日付だけを切り取り
                DB::raw("substr(base.order_date, 1, 10) AS order_date"),
                'detail.order_detail_number',
                // 発送状態はCASE文で3だったら発送済それ以外は準備中
                DB::raw("CASE WHEN detail.shipment_status_id = 3 THEN '発送済' ELSE '準備中' END AS shipment_status")
            )
            ->where('base.user_id', ':user_id')
            //期間指定フラグがtrueだったら期間指定する
            ->when($termFlg, function ($query, $termFlg) {
                return $query->whereBetween('order_date', [':termFrom', ':termTo']);
            })
            // 注文番号ごとにまとめる -> 1注文IDあたりに同じ注文番号の伝票(detail)が複数紐づく想定(detailに枝番を設ける際はハイフン以降を切り取るなど必要)
            ->groupBy(
                'base.id',
                'base.user_id',
                'order_date',
                'detail.order_detail_number',
                DB::raw("CASE WHEN detail.shipment_status_id = 3 THEN '発送済' ELSE '準備中' END")
            )
            ->toSql();
        // 上記のクエリをサブクエリとして以下のクエリに注入
        $orderHistoryData = DB::table(DB::raw('('.$orderBaseSql.') AS orderBase'))
            ->leftJoin('m_users', 'orderBase.user_id', '=', 'm_users.id')
            ->leftJoin('m_users_classifications', 'm_users.user_classification_id', '=', 'm_users_classifications.id')
            ->select(
                'orderBase.id', //注文ID
                'order_date', //注文日時
                'order_detail_number', //注文番号
                'shipment_status', // 注文状態
                'last_name', //姓
                'first_name', //名
                'zipcode', //郵便番号
                'prefecture', //都道府県
                'municipality', //市町村
                'address', //番地
                'apartments', //建物名
                'company_name', //企業名
                'phone_number' //電話番号
            ) //描画に使う値を記述
            ->setBindings([':user_id'=>$userId, ':termFrom'=>$termFrom, ':termTo'=>$termTo])
            ->paginate($maxCountPerPage);
        return $orderHistoryData;
    }

    /**
     * 注文データを削除する
     *
     * @param int $userId
     * @param string $orderBaseNumber
     * @return bool
     */
    public function deleteOrder($userId, $orderBaseNumber)
    {
        $result = false;
        if ($userId && $orderBaseNumber) {
            $deleteCount = DB::table('t_orders')
            ->where('id', '=', $orderBaseNumber)
            ->where('user_id', '=', $userId)
            ->delete();
            $result = $deleteCount > 0 ? true : false;
        }
        return $result;
    }
}
