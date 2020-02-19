<!-- Sign up modal -->
<div class="modal fade" id="invest-modal" tabindex="-1" role="dialog" aria-labelledby="signupLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header text-center">

                <h4 class="modal-title text-center">Invest Now</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" name="button"><span style="color:white" aria-hidden="true">&times;</span></button>

            </div>

            <form class="form" action="{{route('invest.bank.view')}}" method="get" id="reviewform">
              @csrf
             @if (Auth::user())
             <div class="modal-body">

                  <div class="row">

                    <div class="col-md-12" style="display:none;">
                      <div class="form-group">
                        <input type="text" name="review-user-id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                        <input type="text" name="review-user-email" id="user_email" class="form-control" value="{{ Auth::user()->email }}">
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" id="feature-label">Choose Investment Plan <small> <a href="">see plans here >></a> </small> </label>
                            <select class="form-control" name="plan_amount" id="plan_amount">
                                @foreach ($plans as $plan)
                                <option data-id={{$plan->interest}} value="{{$plan->id}}">{{$plan->amount}}</option>
                                @endforeach
                            </select>
    
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" id="feature-label">Choose Investment Duration </label>
                            <select class="form-control" name="plan_duration" id="plan_duration">
                                <option value="92">3 Months</option>
                                <option value="182">6 Months</option>
                                <option value="366">12 Months</option>
                            </select>
    
                        </div>
                    </div>

                    <div class="col-md-6">
                      <h5 class="invest-capital">Capital: <span class="capital-val"></span> </h5>
                    </div>

                    <div class="col-md-6">
                      <h5 class="invest-interest">Interest: <span class="capital-interest"></span> </h5>
                    </div>

                    <div class="col-md-6">
                      <h5 class="invest-duration">Duration: <span class="capital-duration"></span> </h5>
                    </div>

                    <div class="col-md-6">
                      <h5 class="invest-roi">ROI: <span class="capital-roi"></span> </h5>
                    </div>
                    

                  </div>

                  <div class="form-check">
                    <label class="form-check-label" for="exampleCheck1"><input type="checkbox" class="form-check-input" id="agree-checkbox"> I accept to the terms and conditions</label>
                  </div>

                  
                  {{-- <button type="button" onclick="investNowViaTransfer()" class="btn btn-primary btn-block review-modal-close" name="submit-review" id="submit-via-bank" style="font-weight:600;">Pay Via Bank Transfer</button> --}}
                  <button type="submit" class="btn btn-primary btn-block review-modal-close" disabled name="submit-review" id="submit-via-bank" style="font-weight:600;">Pay Via Bank Transfer</a>

                  {{-- <script src="https://js.paystack.co/v1/inline.js"></script>
                  <button type="button" onclick="investNow()" disabled class="btn btn-primary btn-block review-modal-close" name="submit-review" id="submit-review" style="font-weight:600;">Pay Online</button> --}}

             </div>

            @else

            <div class="modal-body notloggedin">
               <p>You have to be logged in to add a review</p>
            </div>

            <div class="modal-footer">

              <a href="/login" class="btn btn-primary btn-block modal-login-button">Login</a>

            </div>

             @endif


           </form>

           <p id="review-success-message" class="success-message"></p>

        </div>

    </div>

</div><!-- Sign up modal ends-->
