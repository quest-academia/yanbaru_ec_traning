@extends('layouts.app')

@section('content')

    <main>
        <div class="page-header mt-5 text-center">
            <h4>ユーザ情報修正</h4>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-sm-6 mx-auto">
                <form>
                    <div class="form-group-sm">
                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">氏名</label>
                            </div>
                            <p class="title-name-text">姓</p>
                        </div>
                        <div class="edit-content-text">
                                <input type="text" class="form-control-sm d-inline col-sm-4" placeholder="〇〇">
                            <p class="d-inline ml-1">名</p>
                                <input type="text" class="form-control-sm d-inline col-sm-4" placeholder="××">
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">住所</label>
                            </div>
                            <p class="title-name-text">〒</p>
                        </div>
                        <div class="edit-content-text">
                                <input type="text" class="form-control-sm d-inline col-sm-6" placeholder="〇〇〇〇〇〇〇">
                        </div>
                    </div>

                    <div class="form-group-sm mb-2">
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput">都道府県</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                                <input type="text" class="form-control-sm d-inline col-sm-9" placeholder="沖縄県">
                        </div>
                    </div>

                    <div class="form-group-sm mb-2">
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput">市町村区</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                                <input type="text" class="form-control-sm d-inline col-sm-9" placeholder="那覇市">
                        </div>
                    </div>

                    <div class="form-group-sm mb-2">
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput">番地</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                                <input type="text" class="form-control-sm d-inline col-sm-9" placeholder="○○  ○-○-○">
                        </div>
                    </div>

                    <div class="form-group-sm mb-2">
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput" id="address-text">マンション<br>部屋番号</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                                <input type="text" class="form-control-sm d-inline col-sm-9">
                        </div>
                    </div>
                    <div class="form-group-sm mt-3">
                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">メールアドレス</label>
                            </div>
                            <p class="title-name-text"></p>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" class="form-control-sm d-inline col-sm-12" placeholder="User@example.com">
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">電話番号</label>
                            </div>
                            <p class="title-name-text"></p>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" class="form-control-sm d-inline col-sm-12" placeholder="〇〇〇〇〇〇〇〇〇〇〇">
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary w-25 mr-5">修正</button>
                        <button type="submit" class="btn btn-danger w-25 ml-5">退会</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
