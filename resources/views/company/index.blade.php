@extends('layouts.app')

@section('content')
<div class="container" id="app">
	<router-view name="companyIndex"></router-view>
	<router-view>

	</router-view>



</div>
@endsection
