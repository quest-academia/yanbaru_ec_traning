@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid py-3">
            <div class="row col-12 justify-content-center m-0">
                <div class="col-12">
                    <!-- 直近3ヶ月表示ボタン -->
                    <div class="col-12 ">
                    @if ($term_flg)
                        <a class="btn btn-secondary btn-sm" href="{{ route('order.history', ['term_flg' => 'false']) }}" role="button" name="term">直近3ヶ月の注文を表示</a>
                    @else
                        <a class="btn btn-secondary btn-sm" href="{{ route('order.history', ['term_flg' => 'true']) }}" role="button" name="term">全件を表示</a>
                    @endif
                    </div>
                    @if ($orders_details->isEmpty())
                        <h1 class="text-center py-5">注文履歴は存在しません</h1>
                    @else
                        <div class="mt-2">
                            <table class="table">
                                <thead>
                                    <tr class="d-flex">
                                        <th scope="col" class="col-1 px-0 py-1 text-center">No</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">注文番号</th>
                                        <th scope="col" class="col-4 px-2 py-1">お届け先</th>
                                        <th scope="col" class="col-3 px-0 py-1">備考</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody class="" style="overflow-y:auto;max-height:400px;display:block">
                                @foreach ($orders_details as $order_info)
                                    <tr class="d-flex">
                                        <th scope="row" class="col-1 px-0 text-center">{{ $loop->iteration }}</th>
                                        <td class="col-2 px-0 text-center" id="order_number_1">{{ $order_info->id }}</td>
                                        <td class="col-4 px-2">
                                            <div>〒<span id="postal_code_1"></span>{{ $order_info->users->zipcode }}</div>
                                            <div id="address_1">
                                                {{ $order_info->users->prefecture }}
                                                {{ $order_info->users->municipality }}
                                                {{ $order_info->users->address }}
                                            </div>
                                            <div id="order_name_1">
                                                {{ $order_info->users->last_name }}
                                                {{ $order_info->users->first_name }}
                                                <span class="px-1">様</span>
                                            </div>
                                        </td>
                                        <td class="col-3 px-0">
                                            <div>注文日時：<span id="order_date_2">{{ $order_info->order_date->format('Y-m-d') }}</span></div>
                                            @if ($shipment_status_flg)
                                                <div>注文状態：<span id="order_status_2">準備中</span></div>
                                            @else
                                                <div>注文状態：<span id="order_status_2">発送済</span></div>
                                            @endif
                                        </td>
                                        <td class="col-2 px-0 text-center"><button class="btn btn-primary btn-sm">詳細</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $orders_details->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
