<x-web-layout>
    <div class="contactbanner innerbanner">
        <div class="inner-breadcrumb">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12 ">
                        <h2 class="breadcrumb-title">Verification</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Verification</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="work-section listing-section">
        <div class="container">
            <div class="work-heading">
                <h4>Steps to Verify Services on Our Platform</h4>
                <p class="description">Follow these steps to verify vendors, staff, hotels, and other activities on our
                    verification page</p>
            </div>
            <div class="row">
                <!-- Step 1: Input Details -->
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="work-info card">
                        <h5>01</h5>
                        <h6>Input Details</h6>
                        <p>Select category you want to verify and Enter system number to proceed.</p>
                    </div>
                </div>
                <!-- Step 2: Verification in progress -->
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="work-info card">
                        <h5>02</h5>
                        <h6>Verification in progress</h6>
                        <p>The system will verify it from the database data.</p>
                    </div>
                </div>
                <!-- Step 3: Get Results -->
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="work-info card">
                        <h5>03</h5>
                        <h6>Get Results</h6>
                        <p>Instantly get comprehensive details of the including name, status and validity</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    
    @push('styles')
    <style>
  .card {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #64bd4f;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s; /* Add transition effect */
        }
        .btn:hover {
            background-color: #64bd4f;
        }
        .btn:active {
            background-color: #fff;
            color: #64bd4f;
        }
        .id-card {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
           
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            font-family: Arial, sans-serif;
        }
        .id-card-header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }
        .id-card-body {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .id-card-body .image-placeholder {
            width: 100px;
            height: 100px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            color: #666;
        }
        .id-card-details {
            flex: 1;
            font-size: 18px;
            color: #555;
        }
        .id-card-details .label {
            font-weight: bold;
            color: #333;
            margin-right: 10px;
        }
        .id-card-details div {
            margin-bottom: 10px;
        }
    </style>
    @endpush


     <div class="card">
        <div class="form-header">Vendor Verification Form</div>
        <form id="verificationForm" enctype="multipart/form-data">
            <div class="form-card">
                <div class="form-group">
                    <label class="form-label required" for="verification_type">Select Verification Type</label>
                    <select class="form-control" name="verification_type" id="verification_type" required>
                        <option value="">Choose type</option>
                        <option value="Vendor Verification">Vendor Verification</option>
                        <option value="Staff Verification">Staff Verification</option>
                        <option value="Company Verification">Company Verification</option>
                        <option value="Hotel Verification">Hotel Verification</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label required" for="system_number">Enter System Number</label>
                    <input type="text" class="form-control" id="system_number" name="system_number" placeholder="Enter System Number" required>
                </div>
            </div>
            <button type="button" name="verify" class="btn" onclick="verifyForm()">Verify</button>
        </form>
    </div>
   
<div class="id-card">
    <div class="id-card-header">Vendor Information</div>
    <div class="id-card-body">
        <div class="image-placeholder">
            <img src="" alt="Vendor image">
        </div>
        <div class="id-card-details">
            <div><span class="label">Name:</span> Godfrey</div>
            <div><span class="label">Company:</span> QIGroup</div>
            <div><span class="label">System Number</span> 23456</div>
            <div><span class="label">Verification Type</span> Company Verification</div>

        </div>
    </div>
</div>


</x-web-layout>
