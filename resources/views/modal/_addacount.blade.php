<!-- Sign up modal -->
<div class="modal fade" id="bank-account-modal" tabindex="-1" role="dialog" aria-labelledby="signupLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header text-center">

                <h4 class="modal-title text-center">Add Bank Account</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" name="button"><span style="color:white" aria-hidden="true">&times;</span></button>

            </div>

            <form class="form" action="{{route('save.bank.account')}}" method="post" id="account-form">

            @csrf

             @if (Auth::user())
             <div class="modal-body">

                  <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" id="feature-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" id="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" id="feature-label">Account Name</label>
                            <input type="text" name="account_name" class="form-control" id="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" id="feature-label">Account Number</label>
                            <input type="text" name="account_number" class="form-control" id="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" id="feature-label">Account Type</label>
                            <select class="form-control" name="account_type" id="account-type">
                                <option value="savings">Savings</option>
                                <option value="current">Current</option>
                            </select>
                        </div>
                    </div>

                  </div>

                  <button type="submit" class="btn btn-primary btn-block review-modal-close" name="submit-review" id="submit-review" style="font-weight:600;">Submit</button>

             </div>

            @else

            

             @endif


           </form>

           <p id="review-success-message" class="success-message"></p>

        </div>

    </div>

</div><!-- Sign up modal ends-->
