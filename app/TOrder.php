<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TOrder extends Model
{
    /**
     * 注文詳細を取得
     */
    public function details()
    {
        return $this->hasMany('App\TOrderDetail', 'order_id');
    }

    /**
     * ユーザIDをキーに注文履歴データを取得する。
     * 取得出来ない場合はfalseを返す。
     *
     * @param int $userId
     * @param bool $termFlg
     * @return Obj
     */
    public function getDetails($userId = null, $termFlg = false)
    {
        if (!$userId) {
            return false;
        }
        $termFrom = '2020-12-07 00:00:00'; //todays date
        $termTo   = '2020-12-09 00:00:00'; //after 3 month
        $orderBaseSql = DB::table('t_orders as base')
            ->join('t_orders_details as detail', 'base.id', '=', 'detail.order_id')
            ->where('base.user_id', ':user_id')
            //期間指定フラグがtrueだったら期間指定する
            ->when($termFlg, function ($query, $termFlg) {
                return $query->whereBetween('order_date', [':termFrom', ':termTo']);
            })
            ->select(
                'base.id',
                'base.user_id',
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
            ->setBindings([':user_id'=>$userId, ':termFrom'=>$termFrom, ':termTo'=>$termTo,])
            ->select(
                'orderBase.id', //注文ID
                'resist_date', //注文日時
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
            ->paginate(15);
        return $orderHistoryData;
    }
}
