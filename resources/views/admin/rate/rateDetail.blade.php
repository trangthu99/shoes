@extends('admin.mainadmin')
<link rel="stylesheet" href="/css/app.css">
@section('content')
<table id="comment" class="table table-bordered table-striped mb-0">
	@if($countrate==0)
	<section class="alert alert-danger">
		Chưa có phản hồi nào về sản phẩm này
	</section>
	@else
	@foreach($productComments as $productComment)

	<tr>
		<td scope="row"><h5>{{$productComment->user->fullname}}</h5></td>
		<td scope="row">
			<a href="{{asset('admin/delete/rate/'.$productComment->id)}}" class="btn btn-danger" onclick="return confirm('Bình luận này không phù hợp? Bạn muốn xóa nó?')" ><i class="fa fa-close" aria-hidden="true"></i></a>
		</td>
	</tr>
	<tr>
		<td scope="row"><small><i class="fa fa-commenting-o"></i>&nbsp;{{$productComment->comment}}</small></td>
		<td scope="row">Voted:{{$productComment->rate}}&nbsp;<span class="fa fa-star checked"></span></td>
	</tr>
	@endforeach
	@endif

</table>
@stop