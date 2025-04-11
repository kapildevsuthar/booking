<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                 <div class="p-4 border rounded shadow-lg bg-light ">
                    <div class="bg-primary text-white text-center p-2 rounded">
                        <h3 class="mb-1">Edit  Your Firm</h3>
                    </div>
                    <div class="mt-3">                
                        <form action="/firm/{{$firm['id']}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <!-- Firm Name -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Firm Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value= {{$firm['firm_name']}} name="firm_name" placeholder="--Firm Name--" required>
                            </div>
    
                            <!-- Mobile Number -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" value= {{$firm['firm_mobile']}} name="firm_mobile" placeholder="--Mobile Number--" required>
                            </div>
    
                             <!-- since -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Since</label>
                                <input type="date" class="form-control"value= {{$firm['since']}} name="since" placeholder="Select Date">
                            </div>
    
                            <!-- Pincode -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pincode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"value= {{$firm['pincode']}} name="pincode" placeholder="Enter Pincode" required>
                            </div>
    
                            <!-- Street -->
                            <div class="mb-3">
                                 <label class="form-label fw-bold">Street<span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" value= {{$firm['street']}} name="street" placeholder="Enter Street">
                            </div>
    
                            <!-- Landmark -->
                            <div class="mb-3">
                                 <label class="form-label fw-bold">Landmark<span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" value={{$firm['landmark']}} name="landmark" placeholder="Enter Landmark">
                            </div>
                            
                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address"   rows="2" placeholder="Enter Address" required>{{$firm['address']}}</textarea>
                            
                            </div>
    
                            <!-- City & State -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value= {{$firm['city']}} name="city" placeholder="Enter City" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">State <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value= {{$firm['state']}} name="state" placeholder="Enter State" required>
                                    
                                    </div>
                                </div>
                            </div>
    
                            <!-- Country -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"value= {{$firm['country']}} name="country" placeholder="Enter Country" required>
                            </div>
    
                            <!-- PAN Number & GST -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">PAN Number</label>
                                        <input type="text" class="form-control" value= {{$firm['pan_no']}} name="pan_no" placeholder="Enter PAN No.">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">GST Number</label>
                                        <input type="text" class="form-control" value= {{$firm['gst_no']}} name="gst_no" placeholder="Enter GST No.">
                                    </div>
                                </div>
                            </div>
    
                            <!-- Register No -->
                             <div class="mb-3">
                                  <label class="form-label fw-bold">Register No</label>
                                  <input type="text" class="form-control" value= {{$firm['register_no']}} name="register_no" placeholder="Enter Registration Number">
                             </div>
   
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-50">Update firm</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    </x-app-layout>