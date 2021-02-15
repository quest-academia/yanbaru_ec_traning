@extends('layouts.app')

@section('content')

<div class="container-fluid pt-3">
        
        <div class="container">
          <div class="address">
            お届け先<br>
            〒◯◯◯-◯◯◯◯ 沖縄県那覇市◯◯ ◯-◯-◯<br>
                                    ◯◯ ×× 様
          </div>
          <div class="main mt-5">
            <table>
              <thead>
                <tr>
                  <th>No</th>
                  <th>商品名</th>
                  <th>商品カテゴリ</th>
                  <th>値段</th>
                  <th>個数</th>
                  <th>小計</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>商品1</td>
                  <td>食料品</td>
                  <td>1000円</td>
                  <td><input type="text" class="quantity text-center" size="10" name="quantity" value="5" style="width:40px;">個</td>
                  <td>5000円</td>
                  <td><button class="btn btn-danger">削除</button></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>商品2</td>
                  <td>食料品</td>
                  <td>2000円</td>
                  <td><input type="text" class="quantity text-center" size="10" name="quantity" value="2" style="width:40px;">個</td>
                  <td>4000円</td>
                  <td><button class="btn btn-danger">削除</button></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td>合計</td>
                  <td>9000円</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="button text-center">
            <button class="btn btn-info mx-5">買い物を続ける</button>
            <button class="btn btn-primary mx-5">注文を確定する</button>
          </div>
        </div>
</div>

@endsection