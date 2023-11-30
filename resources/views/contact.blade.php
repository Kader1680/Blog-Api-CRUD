


@extends("layout.master")

@section("content")



<div class="container">





	<div style="margin: 5rem auto" class="form-wrap ">
		<form action="setclient" method="POST" id="survey-form">
            @csrf
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label id="name-label" for="name">Name</label>
						<input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label id="email-label" for="email">Email</label>
						<input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" >
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label id="number-label" for="number">Age <small>(optional)</small></label>
						<input type="number" name="age" id="number" min="10" max="99" class="form-control" placeholder="Age" >
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-12">
					<div class="form-group">
						<label id="name-label" for="name">Is usefull</label>
						<input type="text" name="usefull" id="name" placeholder="type Yes or No" class="form-control">
					</div>
				</div>


			</div>

			{{-- <div class="row">


				<div class="col-md-6">
					<div class="form-group">
						<label>This survey useful yes or no?</label>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="yes" value="yes" id="yes">
							<label class="custom-control-label" for="yes">Yes</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="no" value="no" id="no">
							<label class="custom-control-label" for="no">No</label>
						</div>
					</div>
				</div>
			</div> --}}


			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Leave Message</label>
						<textarea  id="comments" class="form-control" name="message" placeholder="Enter your comment here..."></textarea>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<input type="submit" id="submit" class="btn btn-primary btn-block" placeholder="Submit Survey" />
				</div>
			</div>

		</form>




	</div>
</div>
@endsection
