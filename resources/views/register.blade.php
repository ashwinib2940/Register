@extends('layouts.master')
@section('content')

<div class="container-fluid p-lr-none">
    <div class="panel panel-default col-sm-12 p-lr-none">
        <div class="panel-heading col-sm-12 text-center my-3">
            <h4>Register</h4>
        </div>
        <div class="panel-body col-sm-12 p-lr-none">
            <div class="col-sm-12 p-lr-none">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form action="/addcustomer" method="post" class="" > 
                    {{ csrf_field() }}
                        <div class="col-sm-12">    
                            <div class="form-group col-sm-6 div_mr">
                                <label>Name<span class="required-astrick">*</span></label>
                                <input class="form-control" name="name" id="name" type="text" value="" placeholder="Enter Name" pattern="[a-zA-Z]+" maxlength="50" required tabindex="1">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 div_mr">
                                <label>Email<span class="required-astrick">*</span></label>
                                <input class="form-control" name="email" id="email" value="" type="email" placeholder="Enter Email ID"  required tabindex="3">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        
                            <div class="form-group col-sm-6 div_mr">
                                <label>Phone<span class="required-astrick">*</span></label>
                                <input class="form-control" name="phone" id="phone" value="" type="text" placeholder="Enter Phone no."  required tabindex="3">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 div_mr">
                                <label>Address<span class="required-astrick">*</span></label>
                                <input class="form-control" name="address" id="address" type="text" value="" placeholder="Enter Address" required>
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 div_mr">
                                <label>City<span class="required-astrick">*</span></label>
                                <input class="form-control" name="city" id="city" type="text" value="" placeholder="Enter City" maxlength="15" required tabindex="4">
                                @if ($errors->has('city'))
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 div_mr">
                                <label>State<span class="required-astrick">*</span></label>
                                <input class="form-control" name="state" id="state" type="text" value="" placeholder="Enter State" maxlength="15" required tabindex="4">
                                @if ($errors->has('state'))
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 div_mr">
                                <label>Zipcode<span class="required-astrick">*</span></label>
                                <input class="form-control" name="zip" id="zip" type="text" value="" placeholder="Enter Zipcode" maxlength="15" required tabindex="4">
                                @if ($errors->has('zip'))
                                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                                @endif
                            </div>
                        
                            <div class="col-sm-6 div_mr ">
                                <div class=" form-group fubo_p_btn">
                                    <input type="submit" class="btn btn-info fubo_btn form-control" id="" value="Submit" tabindex="6">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection