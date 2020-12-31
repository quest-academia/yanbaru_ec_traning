<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TOrder; //モデル呼び出し

class OrderController extends Controller
{
    public function __construct()
    {
        // モデルのインスタンス
        $this->model = new TOrder();
    }
    /**
     * 注文履歴を表示する
     */
    public function showOrderHistory(Request $request)
    {
        // 初期値
        $termFlg = array(
                            'term' => false,
                        );
        $deleteResult = '';
        $orderHistoryData = [];
        // 画面に表示する件数
        $maxCountPerPage = 15;
        $page = $request->input('page') ?? 1;
        $pageFrom = (($page - 1) * $maxCountPerPage) + 1;

        // 初回ロードは3ヶ月取得ボタンを表示する
        $showAllBtn = false;
        // 3ヶ月取得ボタン経由でコントローラー叩いた場合の判別用フラグ
        if (!empty($request->input('term'))) {
            $termFlg['term'] = $request->input('term') == '1' ? true : false ;
        }
        // 削除後のリダイレクトで渡された結果があれば
        if ($request->input('deleteResult')) {
            $deleteResult = $request->input('deleteResult');
        }
        // ログイン中のユーザー情報取得
        $user = Auth::user();
        // 履歴一覧データの取得
        if ($user->id) {
            $orderHistoryData = $this->model->getBaseOrder($user->id, $maxCountPerPage, $termFlg['term']);
        }
        // 3ヶ月or全件 表示ボタン出しわけ
        if ($termFlg['term']) {
            $showAllBtn = true;
        }
        return view(
            'order.order_history',
            [
                'orderHistoryData' => $orderHistoryData,
                'showAllBtn'       => $showAllBtn,
                'deleteResult'     => $deleteResult,
                'termFlg'          => $termFlg,
                'pageFrom'         => $pageFrom // 画面に表示する履歴の開始番号
            ]
        );
    }

    /**
     * 注文詳細画面を表示する
     */
    public function showOrderDetail(Request $request)
    {
        $orderHistoryDetails = [];
        // 検索で使用するパラメータをセット
        $orderBaseNumber    = $request->input('orderBaseNumber');
        $orderDetailNumber  = $request->input('orderDetailNumber');
        // 画面で表示するパラメータをセット
        $currentOrderStatus = $request->input('currentOrderStatus');
        // ログイン中のユーザー情報取得
        $user = Auth::user();
        if (!empty($user) && !empty($orderBaseNumber) && !empty($orderDetailNumber)) {
            // 詳細データの取得
            $orderHistoryDetails = $this->model->getDetails($user->id, $orderBaseNumber, $orderDetailNumber);
        }
        return view(
            'order/order_detail',
            [
                'orderHistoryDetails' => $orderHistoryDetails,
                'currentOrderStatus' => $currentOrderStatus
            ]
        );
    }

    /**
     * 注文データを削除する
     */
    public function deleteOrder(Request $request)
    {
        // 初期値
        $termFlg = false;
        $orderHistoryData = [];
        $showAllBtn = false;
        // 画面から渡される値
        $orderBaseNumber = $request->input('base_number');
        $orderDetailNumber = $request->input('detail_number');

        // 画面に返却するメッセージ
        $resultMessage = '';
        // ログインユーザーを取得する
        $user = Auth::user();
        if ($user->id && !empty($orderBaseNumber) && !empty($orderDetailNumber)) {
            // 削除
            $deleteResult = $this->model->deleteOrder($user->id, $orderBaseNumber, $orderDetailNumber);
            // $deleteResult = true;

            if ($deleteResult) {
                $resultMessage = '注文データの削除に成功しました';
            } else {
                $resultMessage = '注文データの削除に失敗しました';
            }
        }

        return redirect()->route('o_history', ["deleteResult" => $resultMessage]);
    }
}
