@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Valgomat</div>

				<div class="panel-body">

                    <div class="text-center start-wrapper">
                        <h2>Velkommen til valgomaten</h2>
                        <p>Nå skal vi se hvilke parti du bør stemme på ved neste valg.</p>
                        <p>Kun ved hjelp av noe tilfeldig genererte setninger som ikke betyr noen ting!</p>
                        <button id="start" class="btn btn-primary text-center">Start</button>
                    </div>

                    @include('app.steps.personalia')
                    @include('app.steps.opinions')
                    @include('app.steps.results')

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

    <script src="{{ asset('/js/all.js') }}"></script>

@endsection