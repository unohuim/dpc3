<form method="POST" action="/init">

		@csrf


		<div class="form-group">
          <label for="firstName">First Name</label>
          <input type="text" class="form-control" id="firstName" name="first_name" placeholder="first name">
        </div>

        <div class="form-group">
          <label for="lastName">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="last_name" placeholder="last name">
        </div>

        <div class="form-group">
          <label for="companyName">Company Name</label>
          <input type="text" class="form-control" id="companyName" name="company_name" placeholder="My Great Dog Walking Co.">
        </div>


        <input type="hidden" name="request_path" value="{{$requestPath}}">
        

        <button type="submit" class="btn btn-primary">Initialize</button>

       


      </form>