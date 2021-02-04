@extends('layouts.app')

@section('content')
<main>

	<div class="container-fluid py-3">
		<div class="row col-12 justify-content-center m-0">
			<div class="col-12">
				<!-- お届け先 -->
				<div class="col-12 py-3 px-3 border border-dark rounded">
					<h5 class="mb-0">
                            お届け先
                        </h5>
					<div class="px-3 py-1">
						<div class="col-12 row px-3">
							<div class="col-2">
								<span id="postal_code">
									@if(Auth::check())
									{!! Auth::user()->zipcode !!}
									@endif
								</span>
							</div>
							<div class="col-8" id="address">
								@if(Auth::check())
								{!! Auth::user()->prefecture !!}
								{!! Auth::user()->municipality !!}
								{!! Auth::user()->address !!}
								{!! Auth::user()->apartments !!}
								@endif
							</div>
						</div>
						<div class="col-12 row px-3">
							<div class="col-2"></div>
							<div class="col-8" id="name">
								@if(Auth::check())
								{!! Auth::user()->last_name !!}
								{!! Auth::user()->first_name !!}
								@endif
								<span class="ml-1">様</span>
							</div>
						</div>
					</div>
				</div>
				<!-- カート内商品 -->
				<div class="mx-auto">
					<h2>カートに商品はありません</h2>
				</div>
			</div>
		</div>
	</div>

</main>
@endsection