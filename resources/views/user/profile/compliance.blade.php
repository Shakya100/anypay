@extends('loginlayout')

@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="header py-5 pt-7">
      <div class="container">
        <div class="header-body text-center mb-7">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5 mb-0">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-7">
          <div class="card border-0 mb-5">
            <div class="card-body pt-7 px-5">
              <div class="text-center text-dark mb-5">
                <h3 class="text-dark font-weight-bolder">{{__('Compliance') }}</h3>
                <span class="text-gray text-xs">{{__('Verify your business')}}</span>
              </div>
              <form action="{{route('submit.compliance')}}" method="post" enctype="multipart/form-data">
                <div class="">
                  <div class="">
                      @csrf
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Business Name')}}</label>
                        <div class="col-lg-10">
                          <input type="text" name="trading_name"  class="form-control" value="{{$usersData->business_name}}" required>    
                        </div>
                      </div>                
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Description')}}</label>
                        <div class="col-lg-10">
                          <textarea type="text" name="trading_desc" @if($ver->status==1 || $user->business_level==3) disabled @endif class="form-control" required>{{$ver->description}}
							{{ old('trading_desc') }}
							</textarea>  
                        </div>
                      </div>   
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Staff Size')}}</label>
                        <div class="col-lg-10">
                            <select class="form-control select" name="staff_size" @if($ver->status==1 || $user->business_level==3) disabled @endif required>
                                <option value="1-5" @if($ver->staff_size=="1-5") selected @endif>1-5 people</option> 
                                <option value="5-50" @if($ver->staff_size=="5-50") selected @endif>5-50 people</option> 
                                <option value="50+" @if($ver->staff_size=="50+") selected @endif>50+ people</option> 
                            </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Industry')}}</label>
                        <div class="col-lg-10">
                            <select class="form-control select" name="industry" @if($ver->status==1 || $user->business_level==3) disabled @endif id="industry" requiredvalue="{{$ver->industry}}">
                            </select>
                            
                        </div>
                      </div>                    
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Category')}}</label>
                        <div class="col-lg-10">
                            <select class="form-control select" name="category" @if($ver->status==1 || $user->business_level==3) disabled @endif id="category" value="{{$ver->category}}">
                            </select>
                            
                        </div>
                      </div> 
                      <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Address')}}</label>
                            <div class="col-lg-10">
                                <input type="text" name="address" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif value="{{$ver->address}}">
                            </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Mobile - +63')}}</label>
                          <div class="col-lg-10">
                              <input type="text" name="mobile" class="form-control"  value="{{$usersData->phone}}">
                          </div>
                      </div>                      
                      <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Email')}}</label>
                          <div class="col-lg-10">
                              <input type="email" name="email" class="form-control"  value="{{$usersData->email}}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Website')}}</label>
                          <div class="col-lg-10">
                              <input type="url" name="website" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif value="{{$ver->website}}">
                          </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Account Type')}}</label>
                        <div class="col-lg-10">
                            <select class="form-control select" name="business_type" @if($ver->status==1 || $user->business_level==3) disabled @endif id="seeAnotherField" required>
                                <option value="Starter Business" @if($ver->business_type=="PF") selected @endif>PF</option> 
                                <option value="Registered Business" @if($ver->business_type=="TPP") selected @endif>TPP</option> 
                            </select>
                            
                        </div>
                      </div>     
                      <div class="form-group row" id="otherFieldDiv">
                        <label class="col-form-label col-lg-2">{{__('Legal Business Name')}}</label>
                        <div class="col-lg-10">
                          <input type="text" name="legal_name" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif value="{{$ver->legal_name}}" id="otherField">    
                        </div>
                      </div>  
					   
                      <div class="form-group row" id="6xxotherFieldDiv">
                          <label class="col-form-label col-lg-2">{{__('Tax ID')}}</label>
                          <div class="col-lg-10">
                              <input type="text" name="tax_id" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif value="{{$ver->tax_id}}"  id="6xxotherField">
                          </div>
                      </div>                          
                      <div class="form-group row" id="fFieldDiv">
                          <label class="col-form-label col-lg-2">{{__('Vat ID')}}</label>
                          <div class="col-lg-10">
                              <input type="text" name="vat_id" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif value="{{$ver->vat_id}}"  id="fField">
                          </div>
                      </div>                        
                      <div class="form-group row" id="ffFieldDiv">
                          <label class="col-form-label col-lg-2">{{__('Registration No')}}</label>
                          <div class="col-lg-10">
                              <input type="text" name="reg_no" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif value="{{$ver->reg_no}}"  id="ffField">
                          </div>
                      </div>     
                      <div class="form-group row" id="otherFieldDiv1">
                        <label class="col-form-label col-lg-2">{{__('Registration Type')}}</label>
                        <div class="col-lg-10">
                            <select class="form-control select" name="registration_type" @if($ver->status==1 || $user->business_level==3) disabled @endif id="otherField1">
                                <option value="government_instrumentality" @if($ver->registration_type=="government_instrumentality") selected @endif>government instrumentality</option> 
                                <option value="governmental_unit" @if($ver->registration_type=="governmental_unit") selected @endif>governmental unit</option> 
                                <option value="incorporated_non_profit" @if($ver->registration_type=="incorporated_non_profit") selected @endif>incorporated non profit</option> 
                                <option value="limited_liability_partnership" @if($ver->registration_type=="limited_liability_partnership") selected @endif>limited liability partnership</option> 
                                <option value="multi_member_llc" @if($ver->registration_type=="multi_member_llc") selected @endif>multi member llc</option> 
                                <option value="private_company" @if($ver->registration_type=="private_company") selected @endif>private company</option> 
                                <option value="private_corporation" @if($ver->registration_type=="private_corporation") selected @endif>private corporation</option> 
                                <option value="private_partnership" @if($ver->registration_type=="private_partnership") selected @endif>private partnership</option> 
                                <option value="public_company" @if($ver->registration_type=="public_company") selected @endif>public company</option> 
                                <option value="public_corporation" @if($ver->registration_type=="public_corporation") selected @endif>public corporation</option> 
                                <option value="public_partnership" @if($ver->registration_type=="public_partnership") selected @endif>public partnership</option> 
                                <option value="single_member_llc" @if($ver->registration_type=="single_member_llc") selected @endif>single member llc</option> 
                                <option value="sole_proprietorship" @if($ver->registration_type=="sole_proprietorship") selected @endif>sole proprietorship</option> 
                                <option value="tax_exempt_government_instrumentality" @if($ver->registration_type=="tax_exempt_government_instrumentality") selected @endif>tax exempt government instrumentality</option> 
                                <option value="unincorporated_association" @if($ver->registration_type=="unincorporated_association") selected @endif>unincorporated association</option> 
                                <option value="unincorporated_non_profit" @if($ver->registration_type=="unincorporated_non_profit") selected @endif>unincorporated non profit</option> 
                            </select>
                        </div>
                      </div>    
                      @if($ver->status==0 || $user->business_level==2)                   
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Proof of Registration')}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFileLangx" @if($ver->status==1 || $user->business_level==3) disabled @endif name="proof" accept="image/*">
                            <label class="custom-file-label" for="customFileLangx">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div> 
					  
                      @else
                        <a href="{{url('/')}}/asset/profile/{{$ver->proof}}">{{__('View Proof of Registration [Select Document]')}}</a><br>
                        @endif                      
                      @if($ver->status==0 || $user->business_level==2)                   
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Proof of Address')}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx" id="customFileLang2" @if($ver->status==1 || $user->business_level==3) disabled @endif name="paddress" accept="image/*" required>
                            <label class="custom-file-label sdsx" for="customFileLang2">{{__('Select document')}}</label>
                          </div> 
                        </div>
                      </div> 
					   <div class="form-group row" id="Corporate_Registration_Document_Div">
                        <label class="col-form-label col-lg-2">{{__('Corporate Registration Document')}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx1" id="Corporate_Registration_Document"  name="DOC_CRD" >
                            <label class="custom-file-label sdsx1" id="Corporate_Registration_Document1" for="Corporate_Registration_Document">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div>
					  <div class="form-group row" id="Resolution_of_Directors_authorizing_Application_Div">
                        <label class="col-form-label col-lg-2">{{__('Resolution of Directors authorizing Application')}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx2" id="Resolution_of_Directors_authorizing_Application"  name="DOC_RDAA" >
                            <label class="custom-file-label sdsx2" id="Resolution_of_Directors_authorizing_Application1" for="Resolution_of_Directors_authorizing_Application">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div>
					   <div class="form-group row" id="Corporate_ID_Div">
                        <label class="col-form-label col-lg-2">{{__("Corporate ID (2 pieces gov't issued) of Directors or officers of the company")}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx3" id="Corporate_ID"  name="DOC_CID" >
                            <label class="custom-file-label sdsx3" id="Corporate_ID1" for="Corporate_ID">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div>
					  <div class="form-group row" id="invoices_from_suppliers_div">
                        <label class="col-form-label col-lg-2">{{__('2 invoices from suppliers less than 3 months old')}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx4" id="invoices_from_suppliers"  name="DOC_IS" >
                            <label class="custom-file-label sdsx4" id="invoices_from_suppliers1" for="invoices_from_suppliers">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div>
					  <div class="form-group row" id="Bank_void_check_Div">
                        <label class="col-form-label col-lg-2">{{__('A Bank void check with the cancelled written across
')}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx5" id="Bank_void_check"  name="DOC_BVC" >
                            <label class="custom-file-label sdsx5" id="Bank_void_check1" for="Bank_void_check">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div>
					   <div class="form-group row" id="statements_up_to_6_months_Div">
                        <label class="col-form-label col-lg-2">{{__("Most recent processing statements up to 6 months")}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx6" id="statements_up_to_6_months"  name="DOC_MRP" >
                            <label class="custom-file-label sdsx6" id="statements_up_to_6_months1" for="statements_up_to_6_months">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div>
					   <div class="form-group row" id="acquiring_Bank_for_fraud_Div">
                        <label class="col-form-label col-lg-2">{{__("A resolution of the Company stating that the Co is in good standing and has no claims against it from the major card carriers by an issuing or acquiring Bank for fraud.")}}</label>
                        <div class="col-lg-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sdsx7" id="acquiring_Bank_for_fraud"  name="DOC_ABF" >
                            <label class="custom-file-label sdsx7" id="acquiring_Bank_for_fraud1" for="acquiring_Bank_for_fraud">{{__('Select Document')}}</label>
                          </div> 
                        </div>
                        </div>
                      @else
                        <a href="{{url('/')}}/asset/profile/{{$ver->paddress}}">{{__('View Proof of Address')}}</a><br>
                      @endif 
                      <div id="otherFieldDiv3">
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Full Name')}}</label>
                          <div class="col-lg-10">
                            <div class="row">
                                <div class="col-6">
                                  <input type="text" name="first_name" class="form-control" value="{{$usersData->first_name}}" placeholder="First Name" id="1otherField">
                                </div>      
                                <div class="col-6">
                                  <input type="text" name="last_name" class="form-control"  value="{{$usersData->last_name}}" placeholder="Last Name" id="2otherField">
                                </div>
                            </div>
                          </div>
                        </div>  
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Date of Birth')}}</label>
                          <div class="col-lg-10">
                            <div class="row">
                                <div class="col-4">
                                  <select class="form-control select" name="b_month" @if($ver->status==1 || $user->business_level==3) disabled @endif id="3otherField">
                                    <option value="1" @if($ver->month=="1") selected @endif>Jan</option>
                                    <option value="2" @if($ver->month=="2") selected @endif>Feb</option>
                                    <option value="3" @if($ver->month=="3") selected @endif>Mar</option>
                                    <option value="4" @if($ver->month=="4") selected @endif>Apr</option>
                                    <option value="5" @if($ver->month=="5") selected @endif>May</option>
                                    <option value="6" @if($ver->month=="6") selected @endif>Jun</option>
                                    <option value="7" @if($ver->month=="7") selected @endif>Jul</option>
                                    <option value="8" @if($ver->month=="8") selected @endif>Aug</option>
                                    <option value="9" @if($ver->month=="9") selected @endif>Sep</option>
                                    <option value="10" @if($ver->month=="10") selected @endif>Oct</option>
                                    <option value="11" @if($ver->month=="11") selected @endif>Nov</option>
                                    <option value="12" @if($ver->month=="12") selected @endif>Dec</option> 
                                  </select>
                                </div>      
                                <div class="col-4">
                                  <input type="number" name="b_day" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif placeholder="Day" value="{{$ver->day}}" min="1" max="30" value="{{$user->last_name}}" id="4otherField">
                                </div>                            
                                <div class="col-4">
                                  <input type="number" name="b_year" class="form-control" @if($ver->status==1 || $user->business_level==3) disabled @endif placeholder="Year" value="{{$ver->year}}" min="1950" max="{{date('Y')}}" id="5otherField">
                                </div>
                            </div>
                          </div>
                        </div>  
                        <div class="form-group row"> 
                          <label class="col-form-label col-lg-2">{{__('Nationality')}}</label>                          
                          <div class="col-lg-10">
                              <select class="form-control custom-select" name="nationality" @if($ver->status==1 || $user->business_level==3) disabled @endif id="country" id="7otherField">
                              </select>
                              <span class="text-xs text-gray">Current Nationality: {{$usersData->country}}</span>
                          </div>
                        </div>  
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Title')}}</label>                          
                          <div class="col-lg-10">
                            <select class="form-control select" name="gender" @if($ver->status==1 || $user->business_level==3) disabled @endif id="70otherField">
                              <option value="male" @if($ver->gender=="Mr") selected @endif>{{__('Mr')}}</option>
                              <option value="female" @if($ver->gender=="Ms") selected @endif>{{__('Ms')}}</option>
								<option value="female" @if($ver->gender=="Mrs") selected @endif>{{__('Mrs')}}</option>
								<option value="female" @if($ver->gender=="Mx") selected @endif>{{__('Mx')}}</option>
                            </select>
                          </div>                            
                        </div>                        
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('ID Document')}}</label>                          
                          <div class="col-lg-10">
                            <select class="form-control select" name="id_type" @if($ver->status==1 || $user->business_level==3) disabled @endif id="7otherField">
                              <option value="National ID" @if($ver->id_type=="National ID") selected @endif>{{__('National ID')}}</option>
                              <option value="International Passport" @if($ver->id_type=="International Passport") selected @endif>{{__('International Passport')}}</option>
                              <option value="Voters Card" @if($ver->id_type=="Voters Card") selected @endif>{{__('Voters Card')}}</option>
                              <option value="Driver License" @if($ver->id_type=="Driver License") selected @endif>{{__('Driver License')}}</option>
                            </select>
                          </div>                            
                        </div>
                        @if($ver->status==0 || $user->business_level==2) 
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" @if($ver->status==1 || $user->business_level==3) disabled @endif id="customFileLang1" name="idcard" accept="image/*">
                              <label class="custom-file-label sdsd" for="customFileLang1">{{__('Front')}}</label>
                            </div> 
                          </div>
                        </div>                        
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" @if($ver->status==1 || $user->business_level==3) disabled @endif id="customFileLang3" name="idcard_back" accept="image/*">
                              <label class="custom-file-label tests" for="customFileLang3">{{__('Back')}}</label>
                            </div> 
                          </div>
                        </div>
                        @else
                        <a href="{{url('/')}}/asset/profile/{{$ver->idcard}}">{{__('View Identity Document [Front]')}}</a><br>
                        <a href="{{url('/')}}/asset/profile/{{$ver->idcard_back}}">{{__('View Identity Document [Back]')}}</a><br>
                        @endif                           
                      </div>                                             
                  </div>
				  <p>Please review all information before submitting</p>
                  <div class="text-center">
                      @if($ver->status==0 || $ver->status==3)    
                        <button type="submit" class="btn btn-neutral btn-block">{{__('Submit Compliance For Review')}}</button>
                      @elseif($ver->status==1)
                        <span class="badge badge-pill badge-primary"><i class="fad fa-check"></i> {{__('Thank you! Your account is being reviewed. We will notify you once account is approved')}}</span>                  
                      @elseif($ver->status==2 && $user->business_level==2)
                        <button type="submit" class="btn btn-neutral btn-block mb-5">{{__('Update Compliance')}}</button>
                        <span class="badge badge-pill badge-success"><i class="fad fa-check"></i> {{__('Approved')}}</span>                  
                      @elseif($ver->status==2 && $user->business_level==3)
                        <span class="badge badge-pill badge-success"><i class="fad fa-check"></i> {{__('Approved')}}</span>
                      @endif
                  </div> 
                </div>                           
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	<script>
									
		// Function to handle file input change event
function handleFileInputChange(inputElement, labelElement) {
  inputElement.addEventListener('change', (event) => {
    // Get the selected file name
    const fileName = event.target.files[0].name;

    // Update the label content with the selected file name
    labelElement.textContent = fileName;
  });
}

// Get the file input and label elements for Corporate Registration Document
const acquiring_Bank_for_fraud = document.getElementById('acquiring_Bank_for_fraud');
const acquiring_Bank_for_fraud1 = document.getElementById('acquiring_Bank_for_fraud1');
const statements_up_to_6_months = document.getElementById('statements_up_to_6_months');
const statements_up_to_6_months1 = document.getElementById('statements_up_to_6_months1');
const Bank_void_check = document.getElementById('Bank_void_check');
const Bank_void_check1 = document.getElementById('Bank_void_check1');
const invoices_from_suppliers = document.getElementById('invoices_from_suppliers');
const invoices_from_suppliers1 = document.getElementById('invoices_from_suppliers1');
const Corporate_ID = document.getElementById('Corporate_ID');
const Corporate_ID1 = document.getElementById('Corporate_ID1');
const Resolution_of_Directors_authorizing_Application = document.getElementById('Resolution_of_Directors_authorizing_Application');
const Resolution_of_Directors_authorizing_Application1 = document.getElementById('Resolution_of_Directors_authorizing_Application1');
const Corporate_Registration_Document = document.getElementById('Corporate_Registration_Document');
const Corporate_Registration_Document1 = document.getElementById('Corporate_Registration_Document1');
// Call the function to handle file input change event for Corporate Registration Document
handleFileInputChange(acquiring_Bank_for_fraud, acquiring_Bank_for_fraud1);
handleFileInputChange(statements_up_to_6_months, statements_up_to_6_months1);
handleFileInputChange(Bank_void_check, Bank_void_check1);
handleFileInputChange(invoices_from_suppliers, invoices_from_suppliers1);
handleFileInputChange(Corporate_ID, Corporate_ID1);
handleFileInputChange(Resolution_of_Directors_authorizing_Application, Resolution_of_Directors_authorizing_Application1);
handleFileInputChange(Corporate_Registration_Document, Corporate_Registration_Document1);

	</script>
@stop