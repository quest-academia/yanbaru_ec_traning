@extends('layouts.app')

@section('content')
  <main style="padding-bottom: 100px;">
    <h2 class="text-center">ユーザ情報</h2>
    <div class="container" style="width: 50%;">
    <table class="table table-borderless">
        <tbody>
          <tr>
            <th class="text-center" scope="row">ユーザID</th>
            <td>{{ $user->id }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">氏名</th>
            <td>{{ $user->last_name }}　{{ $user->first_name }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">住所</th>
            <td>〒{{ $user->zipcode }}<br>{{ $user->prefecture }}{{ $user->municipality }}{{ $user->address }}　{{ $user->apartments }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">電話番号</th>
            <td>{{ $user->phone_number }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">メールアドレス</th>
            <td>{{ $user->email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">修正/退会する</button>
    </div>
</main>
@endsection
