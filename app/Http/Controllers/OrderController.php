<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TOrder; //モデル呼び出し

class OrderController extends Controller
{
    /**
     * 注文履歴を表示する
     */
    public function showOrderHistory(Request $request)
    {
        // 初回ロードは3ヶ月取得ボタンを表示する
        $showAllBtn = false;
        // 3ヶ月取得ボタン経由でコントローラー叩いた場合の判別用フラグ
        $termFlg = $request->input('term');
        // モデルインスタンス化
        $orderModel = new TOrder();
        // ログイン中のユーザー情報取得
        $userId = 1;
        // 詳細データの取得
        $orderHistoryData = $orderModel->getDetails($userId, $termFlg);
        // 3ヶ月or全件 表示ボタン出しわけ
        if ($termFlg) {
            $showAllBtn = true;
        }
        return view('order.order_history', ['orderHistoryData' => $orderHistoryData, 'showAllBtn' => $showAllBtn]);
    }

    /**
     * 注文詳細を表示する
     */
    public function showOrderDetail()
    {
        return view('order/order_detail');
    }
}
