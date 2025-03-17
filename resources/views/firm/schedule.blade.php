
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border p-4 shadow-lg">
                <div class="bg-success text-white p-3 mb-3">
                    <h4 class="mb-0 text-center">Create Schedule for "{{ $firm['firm_name'] }}"</h4>
                </div>
                <div>
    
                        <div class="mb-3">
                            <label class="form-label fw-bold">Select Day(s) <span class="text-danger">*</span><small class="text-muted">(Press ctrl for multiple selection of same schedule)</small></label>
                            <select class="form-select" style="min-height:180px" wire:model.live="week[]" multiple required>
                                {{-- <option value="">-- Select Day --</option> --}}
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Shift Timing</label>
                            <select class="form-select" wire:model.live="shift">
                                <option value="">-- Select Shift --</option>
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                                <option value="Full Day">Full Day</option>
                            </select>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Start Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" wire:model.live="start_from" required>
                           

                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">End Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" wire:model.live="end_from" required>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Max Appointments <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" wire:model.live="max_appointment" placeholder="Enter max appointments" required>
                            
                        </div>

                        <div class="mb-3 text-center">
                            {{-- <button class="btn btn-success">submit</button> --}}
                            <button wire:click="store" class="bg-green-500 text-white px-4 py-2">Save</button>
                            <button wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2">Cancel</button>
                        </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>


