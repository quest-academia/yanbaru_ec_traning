@php
    $id_attr = 'modal-delete-' . $controller . '-' . Auth::id();
@endphp

<div class="main">
    <div class="d-flex flex-row-reverse">
        <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#{{ $id_attr }}">注文をキャンセルする</button>
    </div>
    <div class="modal fade" id="{{ $id_attr }}" tabindex="-1"
        role="dialog" aria-labelledby="{{ $id_attr }}-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-body">
                本当にキャンセルしてよろしいですか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">中止</button>
                <form method="post" action="{{ route('cancel.order') }}">
                    @csrf
                        <input type="hidden" name="orderId" value="{{ $orderId }}">
                        <input type="hidden" name="userId" value="{{ (int)$userId }}">
                        <button type="submit" class="btn btn-danger">注文を削除</button>
                    </form>
                </form>
            </div>
            </div>
        </div>
    </div>